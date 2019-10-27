<?PHP

namespace Trackime\Utils;

class ZippyShare {

	public static function video($ip, $id)
	{

		$web = "https://www$ip.zippyshare.com/v/$id/file.html";

		$codeHTML = null;
		try{
		foreach(file($web) as $line)
			$codeHTML .= htmlspecialchars($line);
		}catch(\Exception $e){
			return false;
		}

		try{
			$temp	= explode ($id, $codeHTML);
			$temp2	= explode ('%', $temp[4]);
			$random = explode ("(", $temp2[0])[1];
		}catch(\Exception $e){
			return false;
		}
		$secret = (int)$random % 51245 + (int)$random % 913;

		return "https://www$ip.zippyshare.com/d/$id/$secret/download";

	}

}

class AnimeFLV {

	const URI_ALL = "https://animeflv.net/anime";
	const URI_CHAPTER = "https://animeflv.net/ver";

	private $codeHTML = null;
	private $anime = null;
	private $id = null;
	private $chapter = null;

	public function __construct($id, $anime){
		$this->ctx = self::URI_ALL;
		$this->id = $id;
		$this->anime = $anime;
		$this->generateHTML();
	}

	public function generateURI(){
		switch($this->ctx){
			case self::URI_ALL:
				return self::URI_ALL . "/" . $this->id . "/" . $this->anime;
				break;
			case self::URI_CHAPTER:
				return self::URI_CHAPTER . "/" . $this->id . "/" . $this->anime . "-" . $this->chapter;
				break;
		}
	}

	public function generateHTML(){
		$uri = $this->generateURI();
		try{
		foreach(file($uri) as $line)
			$this->codeHTML .= htmlspecialchars($line);
		}catch(\Exception $e){
			$this->codeHTML = null;
			return false;
		}
		return $this->codeHTML;
	}

	public function streamium(){
		$return = [];
		try{
			$streamium = explode("streamium.xyz\\/embed.php?hash=", $this->codeHTML)[1];
			$this->codeHTML = null;
			$return['hash'] = explode("&quot", $streamium)[0];
		}catch(\Exception $e){
			$return['error'] = $e->getMessage();
		}

		return $return;
	}

	public function streamiumFullChapter(){
		$episodes = explode("episodes", $this->codeHTML)[1];
		$episodes = explode(";", $episodes)[0];
		$episodes = explode("= [", $episodes)[1];
		$episodes = explode("]]", $episodes)[0]. "]";
		$episodes = str_replace("[", "", $episodes);
		$episodes = str_replace("]", "", $episodes);
		$episodes = explode(",", $episodes);

		$total = count($episodes);
		$send = 0;
		$this->ctx = self::URI_CHAPTER;
		while($send < $total){
			$this->chapter = $episodes[$send];
			$this->id = $episodes[++$send];
			$this->generateHTML();
			$hash[$this->chapter] = $this->streamium();
			$send++;
		}
		return $hash;
	}

	public static function videoRapiVideo($anime, $capitulo)
	{
		$arrayUtil = explode ("server=rv&amp;value=", $this->codeHTML);
		$test = explode ("&quot;", $arrayUtil[1]);
		return isset($arrayUtil[1]) ? explode ('&quot;', $arrayUtil[1])[0] : false;
	}

	public static function download($anime){

		$chapters = [];

		$uri = "https://animeflv.net/ver/48450/$anime[anime]-$anime[chapter]";

		$codeHTML = null;
		try{
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);
		}catch(\Exception $e){
			return false;
		}

		try{
			$arrayUtil	= explode ("http://ouo.io/s/y0d65LCP?s=http", $codeHTML);
			$auxIP		= explode ("www", $arrayUtil[1]);
			$ip			= explode (".", $auxIP[1])[0];
			$auxID		= explode ("2F", $auxIP[1]);
			$id			= explode ("%", $auxID[2])[0];
		}catch(\Exception $e){
			return false;
		}

		return ZippyShare::video($ip, $id);

	}

}

//Debug
if(isset($argv[1]) && isset($argv[2])){

$debug = new AnimeFLV($argv[1], $argv[2]);
echo "\n";
$debug =  $debug->streamiumFullChapter();
print("<pre>");
print_r($debug);
echo "\n";

}



?>
