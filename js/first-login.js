
if (document.cookie.indexOf('realeyzLoginSuccess')<0 && document.cookie.indexOf('realeyzLoginTry')>=0){
        var style = document.createElement("style");// Create the <style> tag
        style.appendChild(document.createTextNode(""));// WebKit hack :(
        document.head.appendChild(style);// Add the <style> element to the page
        style.sheet.insertRule("#notification {height:0; overflow: hidden; text-align: center; line-height: 47px; position:fixed; z-index:100; background: #fff; width: 100%}", 0);
        style.sheet.insertRule("#notification font{line-height: 47px;}", 1);
        style.sheet.insertRule("#notification.pop { height:5vh;}", 2);
        style.sheet.insertRule("#notification, .navbar-fixed-top, body{ -webkit-transition: all .5s ease-in-out; -moz-transition: all .5s ease-in-out; -o-transition: all .5s ease-in-out; transition: all .5s ease-in-out; }", 3);
        style.sheet.insertRule(".navbar-fixed-top.pop, body.pop{top:5vh;}", 4);

        var notification = '<div id="notification">Trouble accessing your realeyzPLUS account? Click <a href="//realeyz.de/welcome/">here</a><span class="pull-right"><a href="#" onclick="document.cookie=\'realeyzLoginSuccess=1;domain=realeyz.de\'; document.querySelector(\'#notification\').className=document.querySelector(\'#notification\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'.navbar-fixed-top\').className=document.querySelector(\'.navbar-fixed-top\').className.replace(\/\\bpop\\b\/,\'\'); document.querySelector(\'body\').style.top=\'0vh\'; "><i class="fa fa-times-circle" aria-hidden="true" style="color:666666; padding-right:15px;"></i></a></span></div>', parser = new DOMParser(), doc = parser.parseFromString(notification, "text/html");
          document.body.insertBefore(doc.firstChild.childNodes[1].firstChild, document.body.childNodes[0]);

          setTimeout(function(){
              document.querySelector('#notification').className = "pop";
              document.querySelector(".navbar-fixed-top").className+=" pop";
              document.querySelector("body").style.top="5vh";
          },500);
     }