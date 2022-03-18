$(() => {
    let searchParams = new URLSearchParams(window.location.search)
    // get and print all query parameters
    for (let p of searchParams) {
        console.log(p);
    }

    if (searchParams.has('ordered')) {
        $('#containerCart').hide()
        $('#contCompOrder').show()
    }

    if (searchParams.has('auth_error')) {
        $('#loginModalLabel').text('Connexion requise!')
        $('#loginModalLabel').addClass('text-danger')
        $('#loginModal').modal('show');
    }
    //  $(".formRemoveProductClass").hide();
    // $('#btn-checkout').on('click', () => {
    //     $('#containerCart').hide()
    //     $('#contCompOrder').show()
    // })

    // $( "#changeQ" ).change(function() {
    //     location.reload();
    //   });


    $('#btnTrain').on('click', () => {
        let href = this.href
        !href ? $('#loginModalLabel').text('Connexion requise!') : null
        $('#loginModalLabel').addClass('text-danger')
        // setTimeout(() => {
        //     $('#loginModalLabel').removeClass('text-danger')
        // },1000)

    })

    $('#btnAddCart').on('click', () => {
        // let href = this.href
        $('#loginModalLabel').text('Connexion requise!')
        $('#loginModalLabel').addClass('text-danger')
        // setTimeout(() => {
        //     $('#loginModalLabel').removeClass('text-danger')
        // },1000)
    })

    $('#btnNavLogin').on('click', () => {
        $('#loginModalLabel').text('Se connecter')
        $('#loginModalLabel').removeClass('text-danger')
    })

    // sign up functions
    $('#passInsc').on('keyup', function () {
        var pattern = /^[A-Za-z\d_-]{8,25}$/;
        if (pattern.test($('#passInsc').val()) == true) {
            $('#message1').html('Valide').css('color', 'green');
        } else
            $('#message1').html('Non valide').css('color', 'red');
    });


    $('#passConf').on('keyup', function () {
        if ($('#passInsc').val() == $('#passConf').val()) {
            $('#message2').html('Matching').css('color', 'green');
        } else
            $('#message2').html('Not Matching').css('color', 'red');
    });

});

checkout = () => {
    $('#containerCart').hide()
    $('#contCompOrder').show()
}


// sign up functions 
addProductForm = (e, info) => {
    let idProduct = info.value;
    let quantite = 1;
    e.preventDefault()
    jQuery.ajax({
        type: "POST",
        url: 'add_product_to_cart.php',
        dataType: 'json',
        data: { arguments: [idProduct, quantite] },

        success: function (obj, textstatus) {
            addProductSucess(obj, idProduct);
        }, error: function () {
            alert('Connectez vs pour ajouter au panier');
        }
    });
    return true;
}
test = (idArticle, quantite) => {
    alert(quantite);
}
updateQuantityCartForm = (idArticle, quantite) => {

    jQuery.ajax({
        type: "POST",
        url: 'update_quantity_of_product_in_cart.php',
        dataType: 'json',
        data: { arguments: [idArticle, quantite] },

        success: function (obj, textstatus) {
            updateProductQuantitySucess(obj, idArticle);
          location.reload()
        }, error: function () {
            alert('failure');
        }
    });
    return true;
}

removeProductForm = (e, info) => {
    let idProduct = info.value;

    e.preventDefault()
    jQuery.ajax({
        type: "POST",
        url: 'remove_product_to_cart.php',
        dataType: 'json',
        data: { arguments: idProduct },

        success: function (obj, textstatus) {
            removeProductSucess(obj, idProduct);
        }, error: function () {
            alert('failure');
        }
    });
    return true;
}
updateProductQuantitySucess = (obj, idArticle) => {
    // add difference entre premimium et gratuit
    let prix = obj['articleUpdated']["prixArticle"];
    let prixRabais = obj['articleUpdated']["prixRabaisArticle"];  

    if(obj['isPremium']){
        $("#CartProductPrice" + idArticle).html("<del>" + prix + "</del>$ " + prixRabais + "$");
    }else{
        $("#CartProductPrice" + idArticle).html(prix +"$");
    }

        $('#cartDiscountPrice').html(obj['rabaisTotal']);
        $('#cartSousTotalPrice').html(obj['sousTotal']);
        $('#cartTotalPrice').html(obj['PrixTotal']);
   



}
addProductSucess = (val, idProduct) => {

    $("#cartCount").html(val);
    // window.location.href = "shop_cart.php";
    $("#sucessBtnContainer01"+idProduct).replaceWith(`
         
           <div class="dummy-positioning ">
  
              <div class="success-icon">
                <div class="success-icon__tip"></div>
                <div class="success-icon__long"></div>
              </div>

            </div>`
            );

    //$("#formRemoveProduct" + idProduct).show();
}
removeProductSucess = (val, idProduct) => {

    $("#cartCount").html(val);
    // $("#formAddProduct" + idProduct).show();
    // $("#formRemoveProduct" + idProduct).hide();
}

validatePassword1 = () => {
    let passwd = $('#passInsc').val();
    let passwdConf = $('#passConf').val();
    // tester votre regex sur https://regex101.com/

    var pattern = /^[A-Za-z\d_-]{8,10}$/;

    // alert("mdp= " + passwd + " conf= " + passwdConf);
    if (pattern.test(passwd) == true) {
        // alert("mdp ok");
        $('#message1').html('Valide').css('color', 'green');
        if (passwd == passwdConf) {
            $('#message2').html('Valide').css('color', 'green');
            return true;
        } else
            $('#message2').html('Non valide').css('color', 'red');
        return false;
    } else
        $('#message1').html('Non valide').css('color', 'red');
    return false;
}

function workoutInProgress(idEntrainement) {
    window.location.href = "workout_in_progress.php?id_training=" + idEntrainement;
}

function workoutPause(){
    window.location.href = "workouts.php";
}

f1 = () => {
    let checkbox = $('#invalidCheck1');
    if (checkbox.prop("checked") == true) {
        alert("checkbox is checked");
        return true;
    } else if (checkbox.prop("checked") == false) {
        alert("checkbox is not checked");
        return false;
    }
}


var toastTrainingOptions = document.getElementById('toastTrainingOptions')
function showTrainingOptions(idEntrainement) {
    var toast = new bootstrap.Toast(toastTrainingOptions)
    toast.show()
}

function triggerToast($idTraining) {
    var toastTrigger = document.getElementById('TCard' + $idTraining)
    var toastTrainingOptions = document.getElementById('toastTrainingOptions')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', function () {
            var toast = new bootstrap.Toast(toastTrainingOptions)
            toast.show()
        })
    }
}

function afficherBtnconf() {
    var tName = document.getElementById('trainingName'); 
    if (tName.value.length != 0){
        document.getElementById('btnSignup1').disabled = false; 
        document.getElementById('trainingName').disabled = true; 
        lister();
    }
    else {
        alert("Veuillez svp entrer un nom d'entrainement");
    }
}

function addExo(idExo,nom,idCat) {
    var rep = '<input type="text" id="idExo" name="exo['+idExo+'][id]" value="'+idExo+'">';
        rep += '<input type="text" id="nomExo" name="exo['+idExo+'][nom]" value="'+nom+'">';
        rep += '<input type="text" id="idcat" name="exo['+idExo+'][idcat]" value="'+idCat+'">';
    $('#donneesExo').append(rep);
    $("#confirm_workout_creation_notice").hide();
    $("#btnAjoutEx"+idExo).addClass('disabled');
}

function creerTraining($){
    document.getElementById('div_trainingName').style = "display:none"; 
    lister();
    document.getElementById('div_exercices').style = "display:block"; 
}

function afficherListeExo(){
    let titreF = document.getElementById('titreF'); 
    let tName = document.getElementById('trainingName'); 
    if (tName.value.length != 0){
        titreF.innerHTML = "Ajoutez des exercices";
        document.getElementById('div_trainingName').style = "display:none"; 
        lister();
    }
    else {
        alert("Veuillez svp entrer un nom d'entrainement");
    }
}

function validateExo(){
    let exo = document.getElementById('donneesExo');
    if (exo.innerHTML == ""){
        alert("Veuillez svp ajouter au moins 1 exercice");
        return false;
    }
    else {
        return true;
    }
}

