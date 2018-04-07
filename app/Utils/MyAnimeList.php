<?PHP

namespace Trackime\Utils;

class MyAnimeList{

	/**
	* Get the url of the videos
	*
	* @param string $anime
	* @param int $chapter
	* @return url video
	*/

	public static function information($id)
	{	
		$uri = "https://myanimelist.net/anime/$id";

		$codeHTML = null;
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);
		
		$arrayUtil = explode ('Episodes:', $codeHTML);
		$information = explode ('&lt;/span&gt;', explode ('Broadcast', $arrayUtil[1])[0]);

		return [
			"chapters"	=> explode ('&', $information[1])[0],
			"state" 	=> explode (' ', explode ('&', $information[2])[0])[2],
		    "date"		=> explode ('&', $information[3])[0],
		    "season"    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[0],
		    "year"	    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[1]
		];

	}
}

?>
