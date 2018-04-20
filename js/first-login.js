// grab the language by document tag

var language = document.getElementsByTagName("html")[0].getAttribute("lang");
console.log(language);

var errorTxt = '<i class="fa fa-exclamation-triangle"></i>&nbsp; Access denied';
var errorTxtEN = '<i class="fa fa-exclamation-triangle"></i>&nbsp; <strong>Access unavailable</strong><span class="visible-sm-inline visible-md-inline visible-lg-inline"> - Please select monthly or annual subscription and update your account details.</span>';
var errorTxtDE = '<i class="fa fa-exclamation-triangle"></i>&nbsp; <strong>Noch kein Zugang möglich</strong><span class="visible-sm-inline visible-md-inline visible-lg-inline"> - Wähle bitte Monats- oder Jahresabo aus und aktualisiere deine Zahldaten.</span>';

var accessCheck = getURLParameter('access');
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

// set the alert language

if (language == "en-US") {
    errorTxt = errorTxtEN;
} else if(language == "de-DE") {
    errorTxt = errorTxtDE;
}

// launch alert for access not granted 

if (accessCheck == "not-granted") {
    
    if ((document.cookie.indexOf('realeyzLoginSuccess') && document.cookie.indexOf('realeyzLoginTry')>=0)){
        console.log('Login attempt from WP');
        console.log('Access not granted: invalid payment details or missing product ID');
     } else {
        console.log('Access not granted: invalid payment details or missing product ID'); 
    }
     ga('send', 'event', 'member', 'alert', 'failed-login', 1, true);
        // update this later [ todo ]
        var style = document.createElement("style");// Create the <style> tag
        style.appendChild(document.createTextNode(""));// WebKit
        document.head.appendChild(style);// Add the <style> element to the page
        style.sheet.insertRule("#notification {height: 0px; top:0; overflow:hidden; text-align: center; line-height:72px; position:fixed; z-index:1; background: #fff; width: 100%}", 0);
        style.sheet.insertRule("#notification font{size-size:.8em !important;}", 1);
        style.sheet.insertRule("#notification.pop { height:72px;}", 2);
        style.sheet.insertRule("#notification, .navbar-fixed-top, body{ -webkit-transition: all .5s ease-in-out; -moz-transition: all .5s ease-in-out; -o-transition: all .5s ease-in-out; transition: all .5s ease-in-out; }", 3);
        style.sheet.insertRule(".navbar-fixed-top.pop, body.pop{top: 72px;}", 4);

        var notification = '<div id="notification" class="fadein-quick">' + errorTxt + '<span class="pull-right"><a href="#" onclick="document.cookie=\'realeyzLoginSuccess=1;domain=realeyz.de\'; document.querySelector(\'#notification\').className=document.querySelector(\'#notification\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'.navbar-fixed-top\').className=document.querySelector(\'.navbar-fixed-top\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'body\').style.top=\'0vh\'; "><i class="fa fa-times-circle" aria-hidden="true" style="color:666666; padding-right:15px;"></i></a></span></div>', parser = new DOMParser(), doc = parser.parseFromString(notification, "text/html");
          document.body.insertBefore(doc.firstChild.childNodes[1].firstChild, document.body.childNodes[0]);

          setTimeout(function(){
              document.querySelector('#notification').className = "pop";
              document.querySelector(".navbar-fixed-top").className+=" pop";
              document.querySelector("body").style.top="72px";
          },500);
}