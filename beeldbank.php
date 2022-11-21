<!DOCTYPE html>
<html>
<head>
  
  <title>Stratenregister 's-Hertogenbosch</title>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.1.0/dist/leaflet.css" integrity="sha512-wcw6ts8Anuw10Mzh9Ytw4pylW8+NAD4ch3lqm9lzAsTxg0GFeJgoAtxuCLREZSC5lUXdVyo/7yfsqFjQ4S+aKw==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.1.0/dist/leaflet.js" integrity="sha512-mNqn2Wg7tSToJhvHcqfzLMU6J4mkOImSPTxVZAdo+lcPlk+GhZmYgACEe0x35K7YzW1zJ7XyJV/TT1MrdXvMcA==" crossorigin=""></script>
  <link rel="stylesheet" href="styles.css" />

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>

  <link rel="stylesheet" href="scroller.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<div id="bigmap"></div>

<div id="sidebar">
  <h2 id="plaats">Straten in de beeldbank van Erfgoed 's-Hertogenbosch</h2>
  <div id="plaatsinfo">
  </div>

  <p class="intro">Dit kaartje toont de aantallen afbeeldingen in de beeldbank die met een straat zijn verbonden.</p>

  <p class="intro">We tonen de 44804 afbeeldingen met een open licentie (meest CC-BY-SA). Daarvan zijn er 31296 waarbij een straatnaam wordt vermeld. Op een enkele na hebben we die allemaal met een Wikidata straat kunnen verbinden (en daarmee onder andere ook aan de coördinaten die we nodig hadden om deze kaart te maken).</p>

  <div id="bag">
  </div>

  <div id="wd">
  </div>

  <div id="images">
  </div>

  

  <div class="container"></div>

  

</div>

<a href="index.php"><div id="btnBack">&lt;</div></a>

<!-- .photo-item template HTML -->
<script type="text/html" id="photo-item-template">
  <div class="photo-item" id="{{isShownAt}}">
    <a data-fancybox="gallery" data-caption="<h2>{{description}}</h2>Datum: {{datum}}<br/>Licentie: {{rights}}<br/><a target='_blank' href='https://hetutrechtsarchief.nl/collectie/beeldmateriaal/catalogusnummer/{{catalogusnummer}}'>https://hetutrechtsarchief.nl/collectie/beeldmateriaal/catalogusnummer/{{catalogusnummer}}</a>" 
        href="{{isShownAt}}">
      <img class="photo-item__image" title="{{description}}" src="{{isShownBy}}"/>
    </a>
  </div>
</script>



<script>
  $(document).ready(function() {
    createMap();
    refreshMap();
    window.apiBase = 'images.php?wikidataID=';
  });

  function createMap(){
    center = [51.69215,5.30367];
    zoomlevel = 14;
    
    map = L.map('bigmap', {
          center: center,
          zoom: zoomlevel,
          minZoom: 1,
          maxZoom: 20,
          scrollWheelZoom: true,
          zoomControl: false
      });

    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_nolabels/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
      subdomains: 'abcd',
      maxZoom: 19
    }).addTo(map);
  }

  function refreshMap(){
    $.ajax({
          type: 'GET',
          url: 'beeldbank.geojson',
          dataType: 'json',
          success: function(jsonData) {
            if (typeof herkomsten !== 'undefined') {
              map.removeLayer(herkomsten);
            }

            herkomsten = L.geoJson(null, {
              pointToLayer: function (feature, latlng) {                    
                  return new L.CircleMarker(latlng, {
                      color: "#FC3272",
                      radius:8,
                      weight: 1,
                      opacity: 0.8,
                      fillOpacity: 0.8,
                      title: feature.properties.nm
                  });
              },
              style: function(feature) {
                return {
                    color: getColor(feature.properties.cnt),
                    radius: getSize(feature.properties.cnt),
                    clickable: true
                };
              },
              onEachFeature: function(feature, layer) {
                layer.on({
                    mouseover: rollover,
                    click: whenClicked
                  });
                }
              }).addTo(map);

              herkomsten.addData(jsonData).bringToFront();
          
              //map.fitBounds(herkomsten.getBounds());
              //$('#straatinfo').html('');
          },
          error: function() {
              console.log('Error loading data');
          }
      });
  }

  function getSize(d) {
    return d > 1000 ? 16 :
             d > 600 ? 14 :
             d > 400  ? 12 :
             d > 200  ? 10 :
             d > 75 ? 8 :
             d > 35  ? 6 :
             d > 10  ? 4 :
             d > 5  ? 4 : //3
                      4 ; //2
  }

  function getColor(d) {
    return d > 700 ? '#a50026' :
             d > 500 ? '#f46d43' :
             d > 300  ? '#fdae61' :
             d > 100  ? '#fee090' :
             d > 50  ? '#ffffbf' :
             d > 20  ? '#abd9e9' :
             d > 5   ? '#74add1' :
                       '#4575b4';
  }

  function rollover() {
    var props = $(this)[0].feature.properties;
    this.bindPopup($(this)[0].options.title)
    this.openPopup();
    var self = this;
    setTimeout(function() {
      self.closePopup();
    },1500);
  }

  function whenClicked(){
    $(".container").empty();
    $(".intro").hide();

    var props = $(this)[0].feature.properties;
    console.log(props);
    var naam = decodeURIComponent(props['nm']);

    if(props['wd'].length){
      window.wikidataID = props['wd'];
      var kopje = '<a target="_blank" href="http://www.wikidata.org/entity/' + props['wd'] + '">' + naam + '</a>';
    }else{
      var kopje = naam;
    }

    
    if(props['wd'].length){
      $('#images').load('images.php?wikidataID=' + props['wd']);
    }

    if(props.cnt>1){
      kopje += ', ' + props['cnt'] + ' recs';
    }else{
      kopje += ', ' + props['cnt'] + ' rec';
    }
    $('#plaats').html(kopje);

    

    
    
  }

</script>

<script src="scroller.js"></script>


</body>
</html>
