// grab the language by document tag

var language = document.getElementsByTagName("html")[0].getAttribute("lang");
console.log(language);

// default language set to german
// add more as required 

var siteBannerTxt = 'Dein Nutzerkonto ist noch nicht vollständig. Bitte <a href="https://realeyz.de/signup/">wähle hier einen Plan</a>.';

var accessCheck = getURLParameter('access');
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

if (language == "en-US") {
    siteBannerTxt = 'Your user account is not yet complete. Please <a href="https://realeyz.de/signup/">select a plan</a>.';
} else if(language == "de-DE") {
    siteBannerTxt = 'Dein Nutzerkonto ist noch nicht vollständig. Bitte <a href="https://realeyz.de/signup/">wähle hier einen Plan</a>.';
}
// call me simple.  popup should only come up from the 'access not granted' not all this nonsese.
// nevermind lets make it as complicated as fuck.
if ((accessCheck == "not-granted") && (document.cookie.indexOf('realeyzLoginSuccess') && document.cookie.indexOf('realeyzLoginTry')>=0)){
//if (document.cookie.indexOf('realeyzLoginSuccess')<0 && document.cookie.indexOf('realeyzLoginTry')>=0){
        ga('send', 'event', 'member', 'alert', 'failed-login', 1, true);
        var style = document.createElement("style");// Create the <style> tag
        style.appendChild(document.createTextNode(""));// WebKit hack :(
        document.head.appendChild(style);// Add the <style> element to the page
        style.sheet.insertRule("#notification {height: 0px; overflow:hidden; text-align: center; line-height:6vh; position:fixed; z-index:9000; background: #fff; width: 100%}", 0);
        style.sheet.insertRule("#notification font{size-size:.8em !important;}", 1);
        style.sheet.insertRule("#notification.pop { height:6vh;}", 2);
        style.sheet.insertRule("#notification, .navbar-fixed-top, body{ -webkit-transition: all .5s ease-in-out; -moz-transition: all .5s ease-in-out; -o-transition: all .5s ease-in-out; transition: all .5s ease-in-out; }", 3);
        style.sheet.insertRule(".navbar-fixed-top.pop, body.pop{top:6vh;}", 4);

        var notification = '<div id="notification" class="fadein-quick">' + siteBannerTxt + '<span class="pull-right"><a href="#" onclick="document.cookie=\'realeyzLoginSuccess=1;domain=realeyz.de\'; document.querySelector(\'#notification\').className=document.querySelector(\'#notification\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'.navbar-fixed-top\').className=document.querySelector(\'.navbar-fixed-top\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'body\').style.top=\'0vh\'; "><i class="fa fa-times-circle" aria-hidden="true" style="color:666666; padding-right:15px;"></i></a></span></div>', parser = new DOMParser(), doc = parser.parseFromString(notification, "text/html");
          document.body.insertBefore(doc.firstChild.childNodes[1].firstChild, document.body.childNodes[0]);

          setTimeout(function(){
              document.querySelector('#notification').className = "pop";
              document.querySelector(".navbar-fixed-top").className+=" pop";
              document.querySelector("body").style.top="5vh";
          },500);
     }