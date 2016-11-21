
$(document).on('click','#add-field-data-btn',function(){
    $.ajax({
        method: "GET",
        url: 'index.php?r=field-list-data/create-ajax',
        dataType: "json",
        data:  $(" #login-form #login-button").parents("form").serialize()
    }).done(function( msg ) {
        if (msg) {
           alert(msg);
        } else {
            alert(msg);

        }
    });
});
