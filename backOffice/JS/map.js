// On initialise la latitude et la longitude de Lyon (centre de la carte)
const lyon = { lat: 45.75, lon: 4.8533 }


const doGet = async (url) => { // asynchrone = fait les choses de manière parrallele
	try {
		return axios.get(url, {
			headers: {
				apikey: "Leblancmesnil93"
			}
		}); // on renvoie le contenu de la page spécifiée
	} catch (error) {
		if (axios.isAxiosError(error)) {
			console.log(error);
		}
		return false; // erreur
	}
};


function initMap(scooters) { // initialisation de la carte

	// Créer l'objet "macarte" et l'insère dans l'élément HTML qui a l'ID "map"
	const macarte = L.map('map').setView([lyon.lat, lyon.lon], 11);

	// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png').addTo(macarte);

	// Nous parcourons la liste des villes
	console.log(scooters);
	for (scooter of scooters) {
		console.log(scooter);
		let marker = L.marker([scooter.latitude, scooter.longitude]).addTo(macarte);
		marker.bindPopup(scooter);
	}
	return macarte;
}


(async () => {
	const res = await doGet("/scooters.php"); // on attend la promise
	if (!res) {
		return
	}
	const scooters = res.data;
	initMap(scooters);
})();