<?PHP

namespace Trackime\Utils;

class AnimeFLV{

	/**
	* Get the code of the page and remove the special characters
	*
	* @param string $anime
	* @return last chapter of the anime
	*/

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
}

//AnimeFLV::videoRapiVideo("dragon-ball-z","291");

?>
