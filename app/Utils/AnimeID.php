<?PHP

namespace Trackime\Utils;

class AnimeID {

	public static function videoRapiVideo($anime, $capitulo)
	{
		$uri = "https://www.animeid.tv/v/$anime-$capitulo";
		$codeHTML = null;
		try{
			foreach(file($uri) as $line)
				$codeHTML .= htmlspecialchars($line);
		}catch(\Exception $e){
			return false;
		}

		try{
			$codigo = explode ("rapidvideo.com\\/e\\/", $codeHTML)[1];
			$codigo = explode("\\u", $codigo)[0];
		}catch(\Exception $e){
			return false;
		}

		return $codigo;

	}

}
?>
