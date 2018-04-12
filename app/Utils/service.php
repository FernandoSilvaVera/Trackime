<?PHP

define ("HOST","localhost");
define ("USUARIO","root");
define ("CONTRA","1996");
define ("NOMBRE","ANIME");
$time = date("Y/m/d h:i:s");

function emission()
{
	return mysqli_query(mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE), "select animes.anime as anime, animeFLV from dates join animes on dates.anime = animes.anime where state='currently'");
}

function lastChapter($anime)
{
	return mysqli_query(mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE), "select chapter from videos where anime='$anime'")->num_rows+1;
}

function video($anime, $capitulo)
{
	$uri = "https://animeflv.net/ver/48459/$anime-$capitulo";
	$codeHTML = null;
	foreach(file($uri) as $line)
		$codeHTML .= htmlspecialchars($line);

	$arrayUtil = explode ("https://www.rapidvideo.com/e/", $codeHTML);

	return isset($arrayUtil[1]) ? explode ('&', $arrayUtil[1])[0] : "0";
}

$a = emission();
$emission = [];

foreach($a as $b){
	$chapter = lastChapter($b[anime]);
	$video = video($b[animeFLV], $chapter);
	if($video)
		mysqli_query(mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE), "insert into videos values('$b[anime]', '$chapter', '$video', '$time')");
}

?>

