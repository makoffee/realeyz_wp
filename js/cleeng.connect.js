// Overly and aJax spinner 
function showOverlay() {
    // Adds the fullscreen overlay
    var oDiv = jQuery("<div></div>");
    oDiv.attr("id", "lt_overlay");
    oDiv.css("display", "block");
    jQuery("body").append(oDiv);

// Adds the spinner
    var lDiv = jQuery("<i></i>");
    lDiv.attr("id", "lt_loading");
    lDiv.addClass("fa fa-refresh fa-spin fa-3x");
    lDiv.css("display", "block");
    jQuery("body").append(lDiv);
}

// Hides the spinner

function hideOverlay() {
    jQuery("#lt_loading").remove();
    jQuery("#lt_overlay").remove();
}

window.onload = function() {

// Define Cleeng vars

SubscribeMonthlyId = "S479758275_DE";
SubscribeYearlyId = "S696050413_DE";
CleengApi.setAuthOption('publisherId', "502422900");
CleengLoginURL = CleengApi.getLoginUrl("https://subscribe.cleeng.com/realeyz/connect");
CleengSubscribeMonthlyURL = CleengApi.getPurchaseUrl(SubscribeMonthlyId, "https://subscribe.cleeng.com/realeyz/connect/offerId/" + SubscribeMonthlyId);
CleengSubscribeYearlyURL = CleengApi.getPurchaseUrl(SubscribeYearlyId, "https://subscribe.cleeng.com/realeyz/connect/offerId/" + SubscribeYearlyId);
CleenglogoutURL = "https://stream.realeyz.de/user/logout/";


// auto logout - not sure if this one works yet

//function autologout() {
//        CleengApi.logout(function(result) {
//        if (result.success) {
//        return(true);
//        } else {
//        window.location = "https://realeyz.de/";
//        }
//        });
//}

// Check to see if session is still available 

CleengApi.autologin(function(result) {

    if (result.success) {
        ga('send', 'event', 'member', 'status', 'online', 1, true);
        jQuery("#menu-item-22732, #menu-item-1261").show();
    } else {
        ga('send', 'event', 'member', 'status', 'offline', 1, true);
        jQuery("#menu-item-460, #menu-item-459, #menu-item-458, #menu-item-23376").show();
    }

});



// subscription

    jQuery(".monthly-plan").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'monthly-plan', 0, true);
        showOverlay();
        window.location = CleengSubscribeMonthlyURL;
        return (false);
    });


// yearly subscription
    jQuery(".yearly-plan").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'yearly-plan', 0, true);
        showOverlay();
        window.location = CleengSubscribeYearlyURL;
        return (false);
    });
    
// login
    jQuery(".login, #menu-item-458 a").click(function() {
        ga('send', 'event', 'member', 'login', 'wp', 0, true);
        showOverlay();
        document.cookie="realeyzLoginTry=1; domain=realeyz.de";
        window.location = CleengLoginURL;
        return (false);
    });

    // Logout click event
    jQuery(".logout, #menu-item-1261 a").click(function() {
        ga('send', 'event', 'member', 'logout', 'wp', 1, true);
        showOverlay();
        CleengApi.logout(function(result) {
            if (result.success) {
                window.location = "https://realeyz.de/signout";
            }
        });
        return (false);
    });

};

