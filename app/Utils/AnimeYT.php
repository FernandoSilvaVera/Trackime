<?PHP

namespace Trackime\Utils;



class AnimeYT{

	/**
	* Get the code of the page and remove the special characters
	*
	* @param string $anime
	* @return last chapter of the anime
	*/

	public function chapter($anime)
	{
		$codeHTML = null;
		foreach(file("http://www.animeyt.tv/".$anime) as $line)
			$codeHTML .= htmlspecialchars($line);

		$arrayUtil = explode ("http://www.animeyt.tv/ver/".$anime."-", $codeHTML);

		return isset($arrayUtil[1]) ? explode ("-", $arrayUtil[1])[0] : "fallo";

	}

	public static function videoAmazon($anime, $capitulo)
	{	
		$uri = "http://www.animeyt.tv/ver/$anime-$capitulo-sub-espanol";

		$codeHTML = null;
		$html = null;
		try{
			$html = file($uri);
		}catch(\Symfony\Component\Debug\Exception\FatalErrorException $e){
			return "fallo";
		}
		foreach($html as $line)
			$codeHTML .= htmlspecialchars($line);

		$arrayUtil = explode ("http://s3.animeyt.tv/amz.php?v=", $codeHTML);

		return isset($arrayUtil[1]) ? explode ('&', $arrayUtil[1])[0] : "fallo";

	}
}

?>
