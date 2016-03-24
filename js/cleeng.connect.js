/* test to see if user is still logged in and forward to logged in app */
window.onload = function() {

    jQuery(".signup, #menu-item-459").click(function() {
        CleengApi.authentication({
            displayType: "overlay",
            publisherId: "S479758275_DE",
            completed: function(result) {
                        CleengApi.autologin(function(result) {

        if (result.success) {
            window.location = "https://2031841.mediaspace.kaltura.com/user/login";
        } else { return(false);}

    });
            }
        });
        return (false);
    });

    jQuery(".login, #menu-item-458").click(function() {
        CleengApi.authentication({
            displayType: "overlay",
            publisherId: "S479758275_DE",
            completed: function(result) {
                        CleengApi.autologin(function(result) {

        if (result.success) {
            window.location = "https://2031841.mediaspace.kaltura.com/user/login";
        } else { return(false);}

    });
            }
        });
        return (false);
    });

    CleengApi.autologin(function(result) {

        if (result.success) {
            window.location = "https://2031841.mediaspace.kaltura.com/user/login";
        } else { return(false);}

    });

}