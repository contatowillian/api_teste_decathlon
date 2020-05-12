/**** Chama o mapa ao iniciar */
$(document).ready(function () {
	pega_latitude_longitude();

});

/**** Faz a chamada ajax da API */
function pega_latitude_longitude() {

	$("#map_canvas").html("<i class='fa fa-circle-o-notch fa-spin fa_carregando carregando_mapa_home'> </i>Carregando Mapa ...");

	var variaveis_busca = '?latitude=&longitude=&search_city=&search_name=';

	fetch('../sistema/Gera_json_api_CityBike' + variaveis_busca).then(
		function (response) {
			if (response.status !== 200) {
				alert('Erro ao acessar api Google Maps')
				return false;
			}
			response.text().then(function (data) {

				/******************** Trata o retorno json da API ***********************/
				var obj = JSON.parse(data);
				var length = Object.keys(obj).length;
				var contador = 0;
				var pontos_do_mapa = [];


				$.each(obj.dados, function () {


					if (this.name === undefined) {
						var nome_empresa = '';
					} else {
						var nome_empresa = this.name;
					}

					$.each(this.stations, function () {

						if (this.free_bikes === undefined) {
							var bikes = '';
						} else {
							var bikes = this.free_bikes;
						}

						if (this.extra.address === undefined) {
							var endereco = '';
						} else {
							var endereco = this.extra.address;
						}

						if (this.distancia_em_km === undefined) {
							var distancia_em_km = '';
						} else {
							var distancia_em_km = this.distancia_em_km;
						}
						var titulo = nome_empresa + " - " + "Endereço:" + endereco + " - " + bikes + " Bike(s) Disponívei(s)";
						pontos_do_mapa.push([titulo, this.latitude, this.longitude])


						contador++;
					});

				});
				inicia_google_maps(pontos_do_mapa);

			});
			/******************** Trata o retorno json da API ***********************/
		})
}


/******* INICIA A API DO  Google ******** */
var map;
var markers = [];

function inicia_google_maps(locations) {
	map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: 4,
		center: new google.maps.LatLng('-15.7801', '-47.9292'),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var num_markers = locations.length;
	for (var i = 0; i < num_markers; i++) { // alert(locations[i][1]+'===='+locations[i][2]+'=='+locations[i][0]);
		markers[i] = new google.maps.Marker({
			position: {
				lat: locations[i][1],
				lng: locations[i][2]
			},
			map: map,
			html: locations[i][0],
			id: i,
		});

		google.maps.event.addListener(markers[i], 'click', function () {
			var infowindow = new google.maps.InfoWindow({
				id: this.id,
				content: this.html,
				position: this.getPosition()
			});
			google.maps.event.addListenerOnce(infowindow, 'closeclick', function () {
				markers[this.id].setVisible(true);
			});
			this.setVisible(false);
			infowindow.open(map);
		});
	}

}