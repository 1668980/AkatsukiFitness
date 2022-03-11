
var exercicesVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		case "lister" :
			lister(reponse.listeExercices);
		break;
		case "listerParGenre" :
			lister(reponse.listeParGenre);
		break;
		case "rechercher":
			lister(reponse.listeRechercher);
		break;
	}
}

function lister(listFilms){
	var rep='<div class="card-group container-fluid"><div class="row">';

	listFilms.forEach(element => {
		$md = "";
		$link = element.posterUrl.substring(0,8);
		if ($link == "https://") {
			
		} else {
		  $md = "./Serveur/pochettes/";
		}
		rep+='<div class="col-sm-3 flip-card" > <div class="card bg-warning flip-card-inner"><div class="flip-card-front">';
		rep+='<img class="" src="'+ $md + element.posterUrl +'"alt="Image Not Found" onerror="this.src=\'/Labo01BD/Client/Utilitaire/img/covers/cover2.jpg\'"> </img>';
		rep+='<h5 class="card-title">'+ element.titre +'</h5>';
		rep+='<p class="card-text">Parution: '+ element.parution +'</p>';
		rep+='<p class="card-text">Duree: '+ element.duree +' Minutes</p>';
		rep+='<img id="card-img" src="/Labo01BD/Client/Public/icon/flip.png" > </img></div>';
		rep+='<div class="card-body flip-card-back">';
		rep+='<p class="card-text">'+ element.desc+'</p>';
		rep+='<p class="card-text">'+ element.genres +'</p>';
		rep+='<p class="card-text">'+ element.directeur +'</p>';
		rep+="<form id=formEnlever"+element.id_film+">"+"<input name='numE' type=\"text\" value='" + element.id_film + "' style='display:none' readonly></input><input type='button' value='Supprimer' onclick='enlever("+element.id_film +")'></input><br>"+"</form>";
		rep+='</div>';
		rep+='</div>';
		rep+='</div>';
	});
	rep+='</div>';
	$('#cards').html(rep);
	$('#cards').show();
}