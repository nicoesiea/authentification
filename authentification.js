jQuery(document).ready(function() {
    $('#form').submit(function(e) { // On désactive le comportement par défaut du navigateur
        // (qui consiste à appeler la page action du formulaire)
        e.preventDefault();

        $.getJSON("authentification.php", {
                user: $('#user').val(),
                pwd: $('#pwd').val()
            })
            .done(function(json) {
                $('#redirect').attr('action', 'cible.php');
                $('#redirect').get(0).setAttribute('action', 'cible.php'); //this works

                $('#token').attr('value', '' + json[0].token); //this fails silently
                $('#token').get(0).setAttribute('value', '' + json[0].token); //this works

                $('#id').attr('value', '' + json[0].id); //this fails silently
                $('#id').get(0).setAttribute('value', '' + json[0].id); //this works

                $('#redirect').submit();
            })
            .fail(function(jqxhr, textStatus, error) {
                console.log("Request error : " + error);
                $('#exampleModal').css('color', 'red');
            });
    });
});
