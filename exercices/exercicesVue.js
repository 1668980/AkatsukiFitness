
var exercicesVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		case "lister" :
			listerVue(reponse.listeExercices);
		break;
		case "listerParGenre" :
			listerVue(reponse.listeParGenre);
		break;
		case "rechercher":
			lister(reponse.listeRechercher);
		break;
	}
}

function listerVue(listeExercices){
	
	var rep='<table class="table text-white" id="listeExercice"> <thead><tr><th scope="col">Nom</th> ' +
			'<th scope="col">Catégorie</th><th scope="col">Image</th><th scope="col"></th> </tr></thead><tbody>' ;

	listeExercices.forEach(element => {
		rep+= '<tr>';
		rep+= '<td>' + element.nom + '</td>';
		rep+='<td>' + element.idcategorie +'</td> ';
		rep+='<td> <img src="' + element.image + '" alt="..." class="img-thumbnail"> </img> </td>';
		rep+='<td><button type="button" id="btnAjoutEx" class="btn btn-success" onclick="addExo(\''+element.idexercicecatalogue +'\',\''+element.nom +'\',\''+element.idcategorie +'\');" >Ajouter</button></td>';
		rep+='</tr>';
	});
	rep+='</tbody></table>';
	$('#div_exercices').html(rep);
	$('#div_exercices').show();
	//$('#divTriage').show();
	alert("done");
}