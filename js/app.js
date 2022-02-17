// sign up functions

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

$('#passInsc').on('keyup', function () {
    var pattern = /^[A-Za-z\d_-]{8,25}$/;
    if (pattern.test($('#passInsc').val()) == true) {
        $('#message1').html('Valide').css('color', 'green');
    } else
        $('#message1').html('Non valide').css('color', 'red');
});


$('#passConf').on('keyup', function() {
    if ($('#passInsc').val() == $('#passConf').val()) {
        $('#message2').html('Matching').css('color', 'green');
    } else
        $('#message2').html('Not Matching').css('color', 'red');
});