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

	public static function videoRapiVideo($anime, $capitulo)
	{	
		$uri = "https://animeflv.net/ver/48459/$anime-$capitulo";
		$codeHTML = null;

		try{
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);
		}catch(\Exception $e){
			return false;
		}

		$arrayUtil = explode ("https://www.rapidvideo.com/e/", $codeHTML);

		return isset($arrayUtil[1]) ? explode ('&', $arrayUtil[1])[0] : false;

	}

	public static function download($anime){
		
		$chapters = [];
	
		$uri = "https://animeflv.net/ver/48459/$anime[anime]-$anime[chapter]";
		
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

?>
