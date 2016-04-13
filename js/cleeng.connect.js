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
CleenglogoutURL = "http://stream.realeyz.de/user/logout/";

// test if user is logged

CleengApi.autologin(function(result) {

    if (result.success) {
        jQuery("#menu-item-22732, #menu-item-1261").show();
    } else {
        jQuery("#menu-item-460, #menu-item-459, #menu-item-458").show();
    }

});

// subscription

    jQuery(".monthly-plan").click(function() {
        showOverlay();
        window.location = CleengSubscribeMonthlyURL;
        return (false);
    });


// yearly subscription
    jQuery(".yearly-plan").click(function() {
        showOverlay();
        window.location = CleengSubscribeYearlyURL;
        return (false);
    });
    
// login
    jQuery(".login, #menu-item-458 a").click(function() {
        showOverlay();
        window.location = CleengLoginURL;
        return (false);
    });

    // Logout click event
    jQuery(".logout, #menu-item-1261 a").click(function() {
        showOverlay();
        CleengApi.logout(function(result) {
            if (result.success) {
                showOverlay();
                window.location = "http://www.realeyz.de/signout";
            }
        });
        return (false);
    });

}

