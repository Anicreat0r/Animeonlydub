<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="RocketCake">
<!DOCTYPE html>
<html>
<head>
<title>AnimeOnlyDub Search</title>
</head>
<body>
<h1>AnimeOnlyDub Search</h1>

<form action="https://amazing-raindrop-c47cf9.netlify.app/" role="search" method="get">
  <input type="search" name="s" placeholder="Search Animes/Cartoons!" required="" autocomplete="off">
  <button type="submit">Search</button>
</form>

<div id="search-results"></div>

<script>
function displaySearchResults(results) {
  // Clear the previous search results.
  document.getElementById('search-results').innerHTML = '';

  // Loop through the search results and add them to the page.
  for (var i = 0; i < results.length; i++) {
    var result = results[i];

    var link = document.createElement('a');
    link.href = result.link;
    link.textContent = result.title;

    var resultElement = document.createElement('div');
    resultElement.appendChild(link);

    document.getElementById('search-results').appendChild(resultElement);
  }
}

// Perform a search when the user submits the form.
document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the search query from the form.
  var query = document.querySelector('input[name="s"]').value;

  // Perform a search using the AnimeOnlyDub API.
  fetch('https://amazing-raindrop-c47cf9.netlify.app/search?q=' + query)
    .then(function(response) {
      return response.json();
    })
    .then(function(results) {
      // Display the search results on the page.
      displaySearchResults(results);
    });
});
</script>
</body>
</html>	<title></title>
	<link rel="stylesheet" type="text/css" href="search_php.css">
</head>
<body>
<div class="textstyle1">
<div id="elem_da88888"  style="vertical-align: top; position:relative; display: inline-block; width:98%; height:341px; min-width:350px; background:none; " ><form action="search.php" enctype="application/x-www-form-urlencoded" method="POST">  <div id="text_8f690e6">
    <div class="textstyle2">
<span class="textstyle3"><br/><br/></span><input type="text" value="" title="" name="query" required="required"  id="edit_225cef73" >
<input name="Button1" type="submit" value="Search" title=""  id="button_2d11eb3f" >
<span class="textstyle3"><br/><br/><br/></span><div id="container_1c86b4e8"><div id="container_1c86b4e8_padding" ><div class="textstyle1">      <span class="textstyle3">The search result will be displayed in here.</span>
</div>
</div></div><span class="textstyle3"><br/></span>      </div>
    </div>
</form>
<?PHP
function stripTagsWithContent($str, $tagbegin, $tagend)
{    while (($pos = stripos ($str, $tagbegin)) !== false) 
	{
            $part = substr ($str, $pos + strlen($tagbegin));
            $str = substr ($str, 0, $pos);
            if (($pos2 = stripos ($part, $tagend)) !== false) 
                $str .= substr ($part, $pos2 + strlen($tagend));
        }

        return $str;
}
// returns string fragment found or false
function searchHTMLFile($filename, $tosearch)
{
    $filecontent = file_get_contents($filename);
    if ($filecontent === false)
        return false;
    
    $bodybegin = strpos($filecontent, '<body');
    if ($bodybegin === false)
        return false;
    
    $bodybegin = strpos($filecontent, '>', $bodybegin);
    if ($bodybegin === false)
        return false;
    $bodybegin += 1;    
    $bodyend = strpos($filecontent, '</body>');
    if ($bodyend === false)
        return false;
    
    $bodycontent = substr($filecontent, $bodybegin, $bodyend-$bodybegin);
        
    $contentstripped = $bodycontent;
    $contentstripped = stripTagsWithContent($contentstripped, '<script', '</script>');
    $contentstripped = strip_tags($contentstripped);
                
    $posfound = strpos($contentstripped, $tosearch);
    if ($posfound === false)
        return false;
    
    $fragmentSizeToReturn = 200;
    $fragmentStartPos = max(0, $posfound - ($fragmentSizeToReturn / 2));
        
    return substr($contentstripped, $fragmentStartPos, $posfound - $fragmentStartPos) .
            '<b>' 
            . substr($contentstripped, $posfound, strlen($tosearch)) 
            . '</b>' 
            . substr($contentstripped, $posfound + strlen($tosearch), $fragmentSizeToReturn - ($posfound - $fragmentStartPos))
            . '...';
}

$resulttext = '';

class searchEntry
{
    public $name;
    public $url;
}

$allPages = array();
$searchquery = '';

if (isset($_POST['query']))
{
    $searchquery = $_POST['query'];
    $resulttext = 'Results for: ' . htmlentities($searchquery) . '<br/><br/>';
    
    // build database

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'index.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'search.php';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/home.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/animelist.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/movielist.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/dmca.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/msater.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/detective_conan.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/dailylifeofimmortelking.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/datingsim_in_another_world.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/mashle__magic_and_muscles.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/jujutsu_kaisen_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/my_hwro_academia.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/re-life_s1_info.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/dragon_ball.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/dragon_ball_z_kai.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/akuma_kun_seaon_1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'v/anime info/my_daemon_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/detective_conan_episodes.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/dailylifeofimmortlekingepisodes.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/dating_sim_in_anotherworld.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/mashle_magic_episode_s.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/jujutsu_kaisen_episode_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = 'Re-Life s1 Episodes.html';
   $x->url = 'animelist/re-life_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = 'Re-Life s1 Episodes.html';
   $x->url = 'animelist/my_hero_academia_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = 'Re-Life s1 Episodes.html';
   $x->url = 'animelist/my_hero_academia_s2.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = 'Re-Life s1 Episodes.html';
   $x->url = 'animelist/my_hero_academia_s3.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/dragon_ball_super.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/dragon_ball_z_kai.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'animelist/akuma_kun.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = 'Re-Life s1 Episodes.html';
   $x->url = 'animelist/my_daemon_s1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'movies/detective_conan_movie_1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'movies/detective_conan_movie_6.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'movies/black_clover_movie_1.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'movies/detective_conan_movie_18.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'movies/my_hero_academia__movie_1_.html';
   array_push($allPages, $x);

   $x = new searchEntry();
   $x->name = '';
   $x->url = 'iframe_playlist.html';
   array_push($allPages, $x);

// now search database
   
   $resultsFound = 0;
   
   foreach ($allPages as $pageEntry) 
   {      
      $found = false;
      $fragmentToShow = '';
      
      if (!(stripos($pageEntry->name, $searchquery) === false))
      {
         $found = true;
         $fragmentToShow = $pageEntry->name;
      }
      else            
      {
         $fragmentToShow = searchHTMLFile($pageEntry->url, $searchquery);
         if ($fragmentToShow !== false)
            $found = true;         
      }
      
      if ($found)
      {
         // add as found
         $ptitle = $pageEntry->name == '' ? $pageEntry->url : $pageEntry->name;
         $resulttext .= '<a style="font-size: 130%;" href="' . $pageEntry->url . '">' . $ptitle . '</a><br/>' . $fragmentToShow . '<br/><br/>';
         $resultsFound += 1;
      }
   }
   
   if ($resultsFound == 0)
      $resulttext = '0 results found';
}

// display result or nothing

$lnbr = "\n";
$jsresult = json_encode($resulttext, JSON_UNESCAPED_UNICODE);

echo '<script type="text/javascript">' . $lnbr;
echo 'var rootform = document.getElementById("elem_da88888");' .$lnbr;
echo 'var resultelem = rootform.querySelectorAll(\'[id^="container_"]\');';
echo 'resultelem[1].innerHTML = ' . $jsresult . ';' . $lnbr;
echo 'var queryform = document.getElementsByName(\'query\');' . $lnbr;
echo 'queryform[0].value = ' . json_encode($searchquery) . ';' . $lnbr;
echo '</script>' . $lnbr;   
    ?>
</div>  </div>
</body>
</html>