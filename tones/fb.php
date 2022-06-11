<?php
  $url = 'ringo://tone?'.htmlspecialchars($_SERVER['QUERY_STRING']);
  
  if (preg_match('/iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']))
    header('Refresh: 1; url='.$url);
  
  parse_str($_SERVER['QUERY_STRING']);
  
  $desc = str_replace(' ', '+', $t.' - '.$a);
  $json = file_get_contents('https://itunes.apple.com/search?term='.$desc.'&media=music&entity=song');
  $data = json_decode($json)->results[0];
  
  if (!empty($data->trackName))
    $t = $data->trackName;
  if (!empty($data->artistName) && !empty($data->collectionName))
    $a = $data->artistName.' - '.$data->collectionName;
  
  $artwork = empty($data->artworkUrl100) ? './ringtonic.jpg' : str_replace('100x100', '200x200', $data->artworkUrl100);
  
  // <a href="https://geo.itunes.apple.com/kz/app/ringo-sozdaj-svoj-rington!/id979630381?mt=8" style="display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg) no-repeat;width:165px;height:40px;"></a>
?>
<html>
  <head>
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <meta name="apple-itunes-app" content="app-id=979630381, affiliate-data=1l3voBu, app-argument=<?php echo($url); ?>" />
    
    <meta property="fb:app_id" content="1450627788594669" />
    
    <meta property="og:type" content="music.song" />
    <meta property="og:title" content="<?php echo($t) ?>" />
    <meta property="og:description" content="<?php echo($a) ?>" />
    <meta property="og:image" content="<?php echo($artwork) ?>" />
    <meta property="og:url" content="<?php echo('https://ringtonic.net'.$_SERVER['REQUEST_URI']) ?>" />
    
    <meta property="al:ios:url" content="<?php echo($url); ?>" />
    <meta property="al:ios:app_store_id" content="979630381" />
    <meta property="al:ios:app_name" content="Ringtonic" />
    
    <meta property="og:site_name" content="Ringtonic" />
    <meta property="og:audio:type" content="audio/vnd.facebook.bridge" />
    <meta property="og:audio" content="<?php echo($data->previewUrl) ?>" />
    
    <meta property="music:album" content="<?php echo($data->collectionViewUrl) ?>" />
    <meta property="music:duration" content="<?php echo($data->trackTimeMillis) ?>" />
    <meta property="music:preview_url" content="<?php echo($data->previewUrl) ?>" />
    
    <title><?php echo($data->artistName.' - '.$data->trackName); ?></title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Lobster%7CRaleway&subset=cyrillic" rel="stylesheet">
      
    <style>
      body {
        font-family: Helvetica Neue, Helvetica, Arial;
        font-weight: lighter;
      }
      .font-lobster {
        font-family: 'Lobster', cursive;
      }
      .font-raleway {
        font-family: 'Raleway', sans-serif;
      }
      h1, h2 {font-weight: lighter;}
      a {font-family: Helvetica Neue, Helvetica, Arial; font-weight: lighter; color:Black}
      a:link {text-decoration:none;}
      a:visited {text-decoration:none;}
      a:hover {text-decoration:underline;}
      a:active {text-decoration:underline;}
    </style>
  </head>
  <body>
    <?php include_once("analyticstracking.php") ?>
    
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand hidden-xs" href="https://ringtonic.net/">
            <img alt="Brand" src="./bs-nb-rt-20x20.png">
          </a>
          <a class="navbar-brand visible-xs font-raleway" href="https://ringtonic.net/">
            Ringtonic
          </a>
          <p class="navbar-text hidden-xs font-raleway">Ringtonic</p>
          <h4 class="navbar-text navbar-left hidden-xs font-lobster"><?php echo($data->artistName.' - '.$data->trackName); ?></h4>
          <a class="btn btn-success navbar-btn visible-xs pull-right" style="margin-right: 6px" href="https://itunes.apple.com/app/apple-store/id979630381?at=1l3voBu&ct=ringtonic.net&pt=10603809&mt=8">
            <i class="fa fa-cloud-download" style="margin-right: 8px"></i>
            Загрузить в App Store
          </a>
        </div>
        <a class="btn btn-success navbar-btn hidden-xs navbar-right" style="margin-right: -6px" href="https://itunes.apple.com/app/apple-store/id979630381?at=1l3voBu&ct=ringtonic.net&pt=10603809&mt=8">
          <i class="fa fa-cloud-download" style="margin-right: 8px"></i>
          Загрузить в App Store
        </a>
      </div>
    </nav>
    
    <div class="container-fluid">
      
    <div class="row">
      
      <div class="col-md-1" />
      </div>
      
      <div class="col-md-4">
      <center>
        <br />
        <br />
        <br />
        <br />
        <a href="<?php echo($url) ?>">
          <image src="<?php echo($artwork) ?>" />
          <h1><?php echo($t); ?></h1>
          <h2><?php echo($a); ?></h2>
          <br />
          <p>Открыть в Ringtonic</p>
        </a>
        <br />
        <br />
        <br class="hidden-xs" />
        <br class="hidden-xs" />
        <a href="https://itunes.apple.com/us/album/spiders/id<?php echo($data->collectionId) ?>?i=<?php echo($data->trackId) ?>&app=itunes&at=1l3voBu&ct=ringtonic.net&pt=10603809" style="display:inline-block;overflow:hidden;background:url(//linkmaker.itunes.apple.com/assets/shared/badges/ru-ru/itunes-lrg.svg) no-repeat;width:110px;height:40px;background-size:contain;"></a>
      </center>
      </div>
      
      <div class="col-md-2">
      </div>
    
      <div class="col-md-4">
      <br />
      <br />
      <br class="hidden-xs" />
      <br class="hidden-xs" />
      <iframe src="//tools.applemusic.com/embed/v1/album/<?php echo($data->collectionId) ?>?country=us&at=1l3voBu&ct=ringtonic.net&pt=10603809" height="500px" width="100%" frameborder="0"></iframe>
      <br /><p />
      </div>
    
      <div class="col-md-1" />
      </div>
      
    </div>
    
    </div>
    
  </body>
</html>