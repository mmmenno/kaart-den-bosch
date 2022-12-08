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

	
	
</head>
<body>


<div id="hellothere" class="container">

	<h1>Stratenregister 's-Hertogenbosch</h1>



	<div class="row">
		<div class="col-md-6">
			<p>Om de beeldbank en andere gegevens (ook bij andere instellingen) op een eenduidige manier met straten te verbinden, is een stratenregister van 's-Hertogenbosch onontbeerlijk. </p>

			<p>De <a href="https://w.wiki/93C">Bossche Encyclopedie</a> biedt al een schat aan informatie, maar niet de coördinaten die we nodig hebben om bronnen ook geografisch te ontsluiten.</p>

			
		</div>
		<div class="col-md-6">

			<p>Wikidata wel, biedt zelf goede identifiers, en kan bovendien als hub fungeren - je kan er links naar o.a. de Bossche Encyclopedie en <abbr title="Basisadministratie Adressen en Gebouwen">BAG</abbr> in kwijt.</p>

			<p>Bovendien kan je Wikidata ook vragen kunt stellen, zoals '<a href="https://w.wiki/5sJZ">geef straten die verdwenen zijn</a>' of '<a href="https://w.wiki/5vVq">geef straten die naar vrouwen vernoemd zijn</a>'. Die gegevens kun je altijd downloaden, bijvoorbeeld als csv-bestand.</p>

		</div>
	</div>

	<div class="row">
		<div class="col-md-4">

			<h2>Straten in de beeldbank</h2>

			<a href="beeldbank.php"><img src="assets/beeldbank.jpg" /></a>
			<p>In de beeldbank zijn 44.804 afbeeldingen met een open licentie (meest CC-BY-SA) opgenomen. Daarvan zijn er 31.296 waarbij een straatnaam wordt vermeld. Op een enkeling na konden we die met een Wikidata straat  verbinden en op de kaart tonen.</p>

		</div>
		<div class="col-md-4">

			<h2>Wikidata als stratenregister</h2>

			<a href="https://w.wiki/5vUz"><img src="assets/wikidata.jpg" /></a>
			<p>Met <a href="https://w.wiki/5vUz">deze query</a> kan je alle Bossche straten, pleinen en hofjes opvragen uit Wikidata. De resultaten kan je als tabel bekijken, of op de kaart, of downloaden.</p>

		</div>
		<div class="col-md-4">

			<h2>Bestaansperiode en vernoemingen</h2>

			<a href="https://hicsuntleones.nl/straten/?gemeente=Q9807"><img src="assets/periodisering.jpg" /></a>
			<p>Op <a href="https://hicsuntleones.nl/straten/?gemeente=Q9807">hicsuntleones.nl/straten</a> is te zien in welke periode straten zijn aangelegd, en naar wie of wat een straat vernoemd is. Ook deze informatie komt van Wikidata en daar kan je ontbrekende informatie dus aanvullen.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">

			<h2>Naamvarianten en schrijfwijzes</h2>

			<p>Op Wikidata kunnen naast het geprefereerde label ook alternatieve namen opgegeven worden. Het is zelfs mogelijk meerdere officiële namen op te geven en daarbij te vermelden van wanneer tot wanneer ze in gebruik waren. Zo is aangegeven dat het <a href="https://www.wikidata.org/wiki/Q114795242">Wilheminapark</a> van 23 februari 1942 tot 31 oktober 1944 Jeroen Boschpark heette (de Duitse bezetters stonden vernoemingen naar levende leden van het koninklijk huis niet toe).</p>

			<p>Wil je data verbinden met Wikidatastraten, dan is het handig om zoveel mogelijk naamvarianten te kennen. In (historische) bronnen kunnen spellingen afwijken (Koorstraat / Choorstraat), afkortingen gebruikt worden (K. Kerkstraat), typefouten gemaakt zijn (Cicerostraaat), lidwoorden gebruikt zijn of verbindings-s'en zijn weggevallen of toegevoegd (Bleekerstraatje / Het Bleekers Straatje).</p>

			<p>Alle schrijfwijzes die we tegenkwamen en waar we Wikidata niet mee lastig wilden vallen hebben we verzameld in een <a href="https://github.com/mmmenno/stratenregister-den-bosch/blob/main/schrijfwijzes/naamvarianten.csv">apart bestand</a>. Steeds als we een dataset proberen te verbinden voegen we eerst alle namen van Wikidata samen met dit bestand. Daar houden we de te verbinden dataset dan tegenaan.</p>

			<p>Komen we daarbij een schrijfwijze tegen die we nog niet kennen, dan voegen we die toe. Komen we eens straat tegen die nog niet op Wikidata staat, dan voegen we hem daar toe.</p>

			
		</div>
		<div class="col-md-6">

			<h2>Meer lezen</h2>

			<p>De <a href="https://www.bossche-encyclopedie.nl">Bossche Encyclopedie</a> bevat heel veel informatie straten, de panden die er staan of stonden en hun bewoners.</p>

			<p>Wil je meer weten over het benoemen van straten in collecties in het algemeen, dan is de blog <a href="https://www.bossche-encyclopedie.nl">Van Oude Nieuwstraat tot Onbekendegracht - straatnamen in collectiedata</a> een goed startpunt.</p>

		</div>
	</div>


</div>

	
<div id="footer" class="container-fluid">
	<div class="container">
		De data op het Wikidata 'Stratenregister' is in eerste instantie ingevoerd door Wikidata vrijwilligers. Arian Sarwary en Menno den Engelse hebben gegevens aangevuld in opdracht van Erfgoed 's-Hertogenbosch. Daarbij is dankbaar gebruik gemaakt van de data die Ton Wetzer verzamelde voor de Bossche Encyclopedie.
	</div>
</div>


</body>
</html>
