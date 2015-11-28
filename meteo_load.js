function reloadMeteo() {
        var richiesta = $.ajax({
                            url: "http://olivetti.altervista.org/script/meteo.php",
                          });
 
        richiesta.done(function(data) {
            $("#meteo").html(data);
        });
        richiesta.fail(function(jqXHR, textStatus) {
            alert( "Richiesta fallita: " + textStatus );
        });
        }
window.setTimeout("reloadMeteo()", 600000);
jQuery(document).ready(reloadMeteo());
