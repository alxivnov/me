<?php
  $locale = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    
  if (preg_match("/de/i", $locale))
    $locale = "de";
  else if (preg_match("/ru/i", $locale))
    $locale = "ru";
  else if (preg_match("/tr/i", $locale))
    $locale = "tr";
  
  if (file_exists($locale))
    header('Refresh: 0; url='.$locale);
  else
    header('Refresh: 0; url=en');
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta charset="utf-8">
    <meta name="Description" CONTENT="How to set a song as your iPhone ringtone? Find out here!"> 
    <meta name="keywords" content="Ringtonic, Apple, iPhone, iPad, iOS, iTunes, ringtone, melody, sound, call, set, install, setup">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <meta name="apple-itunes-app" content="app-id=979630381, app-argument=https://apptag.me/tones/share.php, affiliate-data=1l3voBu">
    
    <link rel="shortcut icon" href="./favicon.ico?v=140215">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="./apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="./apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="./apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="./favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="./favicon-32x32.png" sizes="32x32">
    
    <meta property="fb:app_id" content="1450627788594669">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="Ringtonic">
    <meta property="og:description" content="Set your ringtone on an iPhone">
    <meta property="og:image" content="https://apptag.me/tones/ringtonic.jpg">
    <meta property="og:url" content="https://apptag.me/tones/">
    
    <meta property="og:site_name" content="Ringtonic">
    
    <meta property="al:ios:url" content="ringtonic:" >
    <meta property="al:ios:app_store_id" content="979630381" >
    <meta property="al:ios:app_name" content="Ringtonic" >
    
    <title>Ringtonic</title>
  </head>
</html>
