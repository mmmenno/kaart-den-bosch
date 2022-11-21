<?php
header("Content-type: text/json");

$wikidataID = $_GET["wikidataID"];

$url = "beeldbankdata/" . $wikidataID . ".json";
$response = file_get_contents($url);

$data = json_decode($response, true);

$count = count($data['beelden']);

foreach($data['beelden'] as $beeld) { 
  
    if($count<10){
      $thumb = $beeld['isShownBy'];
      //$thumb = str_replace("https://zoeken.erfgoedshertogenbosch.nl/detail.php?id=", "https://denbosch.hosting.deventit.net/HttpHandler/icoon.ico?icoonfromxmlbeschr=", $beeld['isShownAt']);
      
      $class = "largepic";
    }elseif($count<70){
      $thumb = str_replace("https://zoeken.erfgoedshertogenbosch.nl/detail.php?id=", "https://denbosch.hosting.deventit.net/HttpHandler/icoon.ico?icoonfromxmlbeschr=", $beeld['isShownAt']);
      $class = "mediumpic";
    }else{
      $thumb = str_replace("https://zoeken.erfgoedshertogenbosch.nl/detail.php?id=", "https://denbosch.hosting.deventit.net/HttpHandler/icoon.ico?icoonfromxmlbeschr=", $beeld['isShownAt']);
      $class = "smallpic";
    }
    

    echo '<div class="' . $class . '">';
    echo '<a target="_blank" href="' . $beeld['isShownAt'] . '">';
    echo '<img class="photo-item__image" title="' . $beeld['title'] . '" src="' . $thumb . '"/>';
    echo '</a>';
    echo '</div>';
    
    
  
}


?>
