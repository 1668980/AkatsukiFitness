
function lister() {
	var formexercice = new FormData();
	formexercice.append('action', 'lister'); 
	$.ajax({
		type: 'POST',
		url: 'exercices/exercicesControleur.php',
		data: formexercice,//{action:'lister'}
		contentType: false,
		processData: false,
		dataType: 'json', //text pour le voir en format de string
		success: function (reponse) {//alert(reponse);
			exercicesVue(reponse);
		},
		fail: function (err) {
			alert('Failure');
		}
	});
}

function listerParGenre(genre) {
	var formexercice = new FormData();
	formexercice.append('action', 'listerParGenre');//alert(formexercice.get("action"));
	formexercice.append('genre', genre);
	$.ajax({
		type: 'POST',
		url: 'exercices/exercicesControleur.php',
		data: formexercice,//{action:'lister'}
		contentType: false,
		processData: false,
		dataType: 'json', //text pour le voir en format de string
		success: function (reponse) {
			exercicesVue(reponse);
			//alert('success');
		},
		fail: function (err) {
			alert('Failure : ' + reponse.erreur + ' err : ' + err);
		}
	});

}

function getGenres() {
	var formexercice = new FormData();
	formexercice.append('action', 'getGenres');//alert(formexercice.get("action"));
	$.ajax({
		type: 'POST',
		url: 'exercices/exercicesControleur.php',
		data: formexercice,//{action:'lister'}
		contentType: false,
		processData: false,
		dataType: 'json', //text pour le voir en format de string
		success: function (reponse) {//alert(reponse);
			exercicesVue(reponse);
		},
		fail: function (err) {
			alert('Failure');
		}
	});
}


function rechercher() {
	var leForm = document.getElementById('formRechercher');
	var formexercice = new FormData(leForm);
	formexercice.append('action', 'rechercher');
	$.ajax({
		type: 'POST',
		url: 'exercices/exercicesControleur.php',
		data: formexercice,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (reponse) {//alert(reponse);
			exercicesVue(reponse);
		},
		fail: function (err) {
			alert('Failure');
		}
	});
}