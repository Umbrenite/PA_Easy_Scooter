// On initialise la latitude et la longitude de Lyon (centre de la carte)
var lat = 45.75;
var lon = 4.8533;

var macarte = null;

var scooters = {
	"T1": { "lat": 45.75, "lon": 4.8533 },
	"T2": { "lat": 45.76, "lon": 4.86 },
	"T3": { "lat": 45.73, "lon": 4.8511 },
	"T4": { "lat": 45.75, "lon": 4.82 }
	// mettre ici les vrais scooters venant de la base de données à la place des exemples
};

var customPopup = {
    'color':'white'
}


function initMap() { // initialisation de la carte

	// Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
	macarte = L.map('map').setView([lat, lon], 11);

	// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		// Il est toujours bien de laisser le lien vers la source des données
		// attribution: 'données © OpenStreetMap/ODbL - rendu OSM France',
		// minZoom: 1,
		// maxZoom: 20
	}).addTo(macarte);

	// Nous parcourons la liste des villes
	for (scooter in scooters) {
		var marker = L.marker([scooters[scooter].lat, scooters[scooter].lon]).addTo(macarte);
        marker.bindPopup(scooter).openPopup();
        // var popup = L.popup().setLatLng([scooters[scooter].lat, scooters[scooter].lon]).setContent("I am a standalone popup.").openOn(map);
	}               	
}

window.onload = function(){
initMap(); // Initialisation s'éxécutant lorsque le DOM est chargé
};