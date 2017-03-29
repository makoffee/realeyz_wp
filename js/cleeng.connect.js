// Extends Cleeng API 3.0 and postaffiliatepro.com

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

// get url paramiter - thanks internet

function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

// cleeng callback code gets run after checkout

function cleengCallbackHandler(result) {
if ((result.authorizationSuccessful)){
    trackAffiliate(result.offerId, result.id);
    window.location = "https://subscribe.cleeng.com/realeyz/connect/offerId/" + result.offerId + '?result=' + encodeURIComponent(JSON.stringify(result));
    } else { return(false); }
}

// cleeng callback code gets run after login

//function loginCallbackHandler(result) {
//if ((result.authorizationSuccessful)){
//    document.cookie="realeyzLoginTry=1; domain=realeyz.de";
//    window.location = CleengLoginURL;
//    } else { return(false) }
//}

// fire tracking to affiliate program - requires postaffiliatepro.com

function trackAffiliate(productID, orderID){
    PostAffTracker.setAccountId('default1');
    if (productID == SubscribeMonthlyId){
        sale = PostAffTracker.createAction('month');
        sale.setTotalCost('5.50');
        sale.setOrderID(orderID);
        sale.setProductID(SubscribeMonthlyId);
        }
    if (productID == SubscribeYearlyId){
        sale = PostAffTracker.createAction('year');
        sale.setTotalCost('49.50');
        sale.setOrderID(orderID);
        sale.setProductID(SubscribeYearlyId);
        }
    PostAffTracker.register();
    return (true);
    }

CleengApi.autologin(function(result) {

    if ((result.success)&&(accessCheck != "not-granted")) {   
        ga('send', 'event', 'member', 'status', 'online', 1, true);
        jQuery("#menu-item-22732, #menu-item-1261").show();
    } else {
        ga('send', 'event', 'member', 'status', 'offline', 1, true);
        jQuery("#menu-item-460, #menu-item-459, #menu-item-458, #menu-item-23376").show();
    }

});

// get that cookie

languageCookie = function(){
    if (getLanguageCookie("qtrans_front_language") == "en"){
        return "en_US";
        } else {
            return "de_DE";
            }
    };

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
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


// check if user has failed cleeng varification
accessCheck = getURLParameter('access');
MonthlySubscriptionGranted = false;
YearlySubscriptionGranted = false;

// Check to see if session is still available 


// auto loggout users who do not have access or failed to complete signup

if (accessCheck == "not-granted") {
    CleengApi.logout();
}


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
    jQuery(".login, #menu-item-23376 a").click(function() {
        ga('send', 'event', 'member', 'login', 'wp', 0, true);
        showOverlay();
        document.cookie="realeyzLoginTry=1; domain=realeyz.de";
        window.location = CleengLoginURL;
        return (false);
    });
    

// dev-login
    jQuery(".login-dev").click(function() {
        ga('send', 'event', 'member', 'login', 'wp', 0, true);
        //showOverlay();
        CleengApi.loginOnly({
            displayType: "overlay",
            publisherId: "502422900",
            locale: "de_DE",
            completed : function(result){
                if ((result.authorizationSuccessful)){
                    document.cookie="realeyzLoginTry=1; domain=realeyz.de";
                    window.location = CleengLoginURL;
                } else { return(false); }
            }
        });
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

