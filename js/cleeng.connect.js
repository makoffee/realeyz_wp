// Extends Cleeng API 3.0 and postaffiliatepro.com
window.onload = function() {

    // Define Cleeng vars

    SubscribeMonthlyId = "S479758275_DE";
    SubscribeYearlyId = "S696050413_DE";
    SubscribeSwissPromoId = "P466233560_DE";
    SubscribeInterfilmPromoId = "P176372767_DE";
    CleengPublisherID = "502422900";
    CleengApi.setAuthOption('publisherId', CleengPublisherID);
    
    // Define URLs
    //CleengLoginURL = CleengApi.getLoginUrl("https://subscribe.cleeng.com/realeyz/connect");
    CleengLoginURL = "https://stream.realeyz.de/user/login/";
    KalturaLogoutURL = "https://stream.realeyz.de/user/logout/";
    
    // Build redirect signup URLs
    CleengSubscribeMonthlyURL = CleengApi.getPurchaseUrl(SubscribeMonthlyId, "https://subscribe.cleeng.com/realeyz/connect/offerId/" + SubscribeMonthlyId);
    CleengSubscribeYearlyURL = CleengApi.getPurchaseUrl(SubscribeYearlyId, "https://subscribe.cleeng.com/realeyz/connect/offerId/" + SubscribeYearlyId);
    CleengSwissPromoURL = CleengApi.getPurchaseUrl(SubscribeSwissPromoId, "https://subscribe.cleeng.com/realeyz/connect/offerId/" + SubscribeSwissPromoId);
    
    setLanguage = languageCookie();
    
    // get that cookie

    function languageCookie() {
        if (getCookie("qtrans_front_language") == "en") {
            return "en_US";
        } else {
            return "de_DE";
        }
    }

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    // check if user has failed cleeng varification
    accessCheck = getURLParameter('access');
    MonthlySubscriptionGranted = false;
    YearlySubscriptionGranted = false;

    // Check to see if session is still available 
    // auto loggout users who do not have access or failed to complete signup

    if (accessCheck == "not-granted") {
        //CleengApi.logout();
    }
    
    // display nav UI based on cleeng login status
    //CleengApi.getAccessStatus(offerId, function(result) {
    CleengApi.autologin(function(result) {
//&& (accessCheck != "not-granted")
        if (result.success) {
            
            if (accessCheck != "not-granted"){
                ga('send', 'event', 'member', 'status', 'online', 1);
                jQuery("#menu-item-22732, #menu-item-1261").show();
                console.log("access success: " + accessCheck);
            } else {
                ga('send', 'event', 'member', 'status', 'offline', 1);
                jQuery("#menu-item-1261").show();
                console.log("access fail: " + accessCheck);
            }
        } else {
            ga('send', 'event', 'member', 'status', 'offline', 1);
            jQuery("#menu-item-460, #menu-item-459, #menu-item-458, #menu-item-23376").show();
            console.log("access fail: " + accessCheck);
        }

    });
    
    
    // Overly and aJax spinner - it's back baby.
    function showOverlay() {
        // Adds the fullscreen overlay
        var oDiv = jQuery("<div></div>");
        oDiv.attr("id", "lt_overlay");
        oDiv.css("display", "block");
        jQuery("body").append(oDiv);

        // Adds the spinner
        var lDiv = jQuery("<div></div>");
        lDiv.attr("id", "lt_loading");
        lDiv.addClass("rotating");
        lDiv.css("display", "block");
        jQuery("body").append(lDiv);
    }

    // Hides the spinner

    function stopThinking() {
        jQuery("#lt_loading").remove();
        jQuery("#lt_overlay").remove();
    }

    // get url paramiter - thanks internet you da best!

    function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
    }

    // cleeng callback code gets run after checkout

    function cleengCallbackHandler(result, subscriptionID) {
        showOverlay();
        // set cookie for signup attempt.  To be checked on stream.realeyz.de
        document.cookie = "realeyzLoginTry=1; domain=realeyz.de";
        if ((result.authorizationSuccessful)) {
            var trackOffer = result.offerId;
            // Affiliate tracker pro call
            trackAffiliate(result.offerId, result.id);
            // don't forget to add twitter conversion code back in.
            // twttr.conversion.trackPid('nwdyu', { tw_sale_amount: 0, tw_order_quantity: 0 });

            // move step indicator to complete
            try {
                var d = document.getElementById("checkout-step3");
                d.className += " step-select";
            } catch (e) {
                console.log("UI: no step indicator found");
            }

            // blast that google tracking - don't look back! 
            try {
                ga('send', 'event', 'acquisition', 'success', trackOffer, {
                    'transport': 'beacon',
                    'hitCallback': function() {
                        window.location = CleengLoginURL;
                        // window.location = "https://stream.realeyz.de/?signUp=" + subscriptionID;
                    }
                });
            } catch (e) {
                // ok that didn't work - maybe they don't like being tracked, I can respect that.
                console.log("Success event tracking failed.");
                window.location = CleengLoginURL;
                //window.location = "https://stream.realeyz.de/?signUp=" + subscriptionID;
            }
        } else {
            console.log("Something didn't work with cleeng, try to fix it with a hack.");
            try {
                CleengApi.autologin(function(result) {
                    if ((result.success) && (accessCheck != "not-granted")) {
                        console.log("access: " + accessCheck);
                        // blast that google tracking - don't look back! (duplicated code sorry)
                        try {
                            ga('send', 'event', 'acquisition', 'success', trackOffer, {
                            'transport': 'beacon',
                            'hitCallback': function() {
                                window.location = CleengLoginURL;
                                //window.location = "https://stream.realeyz.de/?signUp=" + subscriptionID;
                                }
                            });    
                        } catch (e) {
                            // ok that didn't work - maybe they don't like being tracked, I can respect that. (duplicated code sorry)
                            console.log("Success event tracking failed.");
                            window.location = CleengLoginURL;
                            //window.location = "https://stream.realeyz.de/?signUp=" + subscriptionID;
                        } 
                    } else {
                        // If the user failed payment / cancled / or closed window
                        stopThinking();
                        console.log("access: " + accessCheck);
                        console.log("Access not granted, user declined offer.");
                        try {
                            document.getElementById("checkout-step2").classList.remove("step-select");
                        } catch (e) {
                         console.log("no step indicator found");
                    }
                    }
                });
            } 
            catch (e) {}
            return (false);
        }
    }

    // fire tracking to affiliate program - requires postaffiliatepro.com

    function trackAffiliate(productID, orderID) {
        PostAffTracker.setAccountId('default1');
        if (productID == SubscribeMonthlyId) {
            sale = PostAffTracker.createAction('month');
            sale.setTotalCost('5.50');
            sale.setOrderID(orderID);
            sale.setProductID(SubscribeMonthlyId);
        }
        if (productID == SubscribeYearlyId) {
            sale = PostAffTracker.createAction('year');
            sale.setTotalCost('49.50');
            sale.setOrderID(orderID);
            sale.setProductID(SubscribeYearlyId);
        }
        PostAffTracker.register();
        return (true);
    }
    

    // UI Click Events

    // new monthly subscription

    jQuery(".monthly-plan").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'monthly-plan', 0, true);
        CleengApi.checkout({
            displayType: "overlay",
            locale: setLanguage,
            offerId: SubscribeMonthlyId,
            completed: function(result) {
                cleengCallbackHandler(result, SubscribeMonthlyId);
            }
        });

        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
            jQuery(".cleeng-checkout-loader").remove();
        } catch (e) {
            console.log("UI: no step indicator found");
        }
        return (false);
    });


    // new monthly subscription inline

    jQuery(".monthly-plan-inline").click(function() {
        jQuery("#checkout-offer").remove();
        ga('send', 'event', 'acquisition', 'signup', 'monthly-plan', 0, true);
        CleengApi.checkout({
            displayType: "inline",
            containerId: "checkout",
            locale: setLanguage,
            offerId: SubscribeMonthlyId,
            completed: function(result) {
                cleengCallbackHandler(result, SubscribeMonthlyId);
            }
        });

        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
            jQuery(".cleeng-checkout-loader").remove();
        } catch (e) {
            console.log("no step indicator found");
        }
        return (false);
    });
    
    // new yearly subscription inline

    jQuery(".yearly-plan-inline").click(function() {
        jQuery("#checkout-offer").remove();
        ga('send', 'event', 'acquisition', 'signup', 'yearly-plan', 0, true);
        CleengApi.checkout({
            displayType: "inline",
            containerId: "checkout",
            locale: setLanguage,
            offerId: SubscribeYearlyId,
            completed: function(result) {
                cleengCallbackHandler(result, SubscribeYearlyId);
            }
        });

        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
            jQuery(".cleeng-checkout-loader").remove();
        } catch (e) {
            console.log("no step indicator found");
        }
        return (false);
    });

    // new yearly subscription

    jQuery(".yearly-plan").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'yearly-plan', 0, true);
        CleengApi.checkout({
            displayType: "overlay",
            locale: setLanguage,
            offerId: SubscribeYearlyId,
            completed: function(result) {
                cleengCallbackHandler(result, SubscribeYearlyId);
            }
        });
        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
            jQuery(".cleeng-checkout-loader").remove();
        } catch (e) {
            console.log("no step indicator found");
        }
        return (false);
    });
    
    // swiss promo subscription

    jQuery(".swiss-promo").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'swiss-promo', 0, true);
        CleengApi.checkout({
            displayType: "overlay",
            locale: setLanguage,
            offerId: SubscribeSwissPromoId,
            completed: function(result) {
                cleengCallbackHandler(result);
            }
        });

        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
        } catch (e) {
            console.log("no step indicator found");
        }
        return (false);
    });
    
    // interfilm promo subscription

    jQuery(".interfilm-promo").click(function() {
        ga('send', 'event', 'acquisition', 'signup', 'interfilm-promo', 0, true);
        CleengApi.checkout({
            displayType: "overlay",
            locale: setLanguage,
            offerId: SubscribeInterfilmPromoId,
            completed: function(result) {
                cleengCallbackHandler(result);
            }
        });
        
        // try to reset step indicators for checkout pages
        try {
            var d = document.getElementById("checkout-step2");
            d.className += " step-select";
        } catch (e) {
            console.log("UI: Skipping step indicators");
        }
        return (false);
    });



    // New Modal login
    // removed because IE fails too many redirects
    
    //jQuery(".login, #menu-item-23376 a").click(function() {
    //    document.cookie = "realeyzLoginTry=1; domain=realeyz.de";
    //    ga('send', 'event', 'member', 'login', 'wp', 0);
    //    //showOverlay();
    //    CleengApi.loginOnly({
    //        displayType: "overlay",
    //        publisherId: CleengPublisherID,
    //        locale: setLanguage,
    //        completed: function(result) {
    //            if ((result.authorizationSuccessful)) {
    //                window.location = KalturaLoginURL;
    //            } else {
    //                console.log("Access was not granted.");
    //                return (false);
    //            }
    //        }
    //    });
    //    return (false);
    //});

    // Login click event
    jQuery(".login, #menu-item-23376 a").click(function() {
        CleengApi.logout();
        document.cookie = "realeyzLoginTry=1; domain=realeyz.de";
        ga('send', 'event', 'member', 'login', 'wp', 0);
        window.location = CleengLoginURL;
    });

    // Logout click event
    jQuery(".logout, #menu-item-1261 a").click(function() {
        ga('send', 'event', 'member', 'logout', 'wp', 1);
        showOverlay();
        CleengApi.logout(function(result) {
            if (result.success) {
                window.location = KalturaLogoutURL;
            }
        });
        return (false);
    });

};
