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
		$information = explode ('&lt;/span&gt;', explode ('Duration', $arrayUtil[1])[0]);

		$genres = [];
		foreach(explode ('&lt;a href=&quot;/anime/genre/', $information[10]) as $genre)
			array_push($genres, explode ('&gt;', explode('&lt;/', $genre)[0])[1]);
		unset($genres[0]);

		return [
			"chapters"	=> explode ('&', $information[1])[0],
			"state" 	=> explode (' ', explode ('&', $information[2])[0])[2],
		    "date"		=> explode ('&', $information[3])[0],
		    "season"    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[0],
		    "year"	    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[1],
			"genres"	=> $genres
		];
	}
}

?>
