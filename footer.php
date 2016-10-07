    <?php global $themeum; ?>

    <footer id="footer">
        <div class="container-wide">
            <div class="row" style="padding-bottom:20px;">
                <div class="col-xs-6">
                <img src="https://realeyz.de/wp-content/uploads/realeyz_logo_darker.svg" class="footer-brand">
                </div>
                <div class="col-xs-6">
                <div class="col-xs-6 col-md-8 col-sm-8 col-lg-9 text-right hidden-xs"><i class="fa fa-globe dark-icon"></i>
                </div>
                <div class="col-xs-10 col-md-4 col-sm-4 col-lg-3 pull-right no-margin no-padding">
                <?php
                if(is_active_sidebar('footer-right')){
                dynamic_sidebar('footer-right');
                }
                ?>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                <div id="footer-links" class="secondary row">
                <div id="footer-links1" class="col-lg-3 col-md-3 col-sm-2 col-xs-4 footer-block">
                <?php
                if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
                }
                ?>
                </div>
                <div id="footer-links2" class="col-lg-3 col-md-3 col-sm-2 col-xs-4 footer-block">
                <?php
                if(is_active_sidebar('footer-sidebar-2')){
                dynamic_sidebar('footer-sidebar-2');
                }
                ?>
                </div>
                <div id="footer-links3" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 footer-block">
                <?php
                if(is_active_sidebar('footer-sidebar-3')){
                dynamic_sidebar('footer-sidebar-3');
                }
                ?>
                </div>
                </div>
                   <p><?php if(isset($themeum['footer_text_1'])) echo $themeum['footer_text_1']; ?></p>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                
                <?php if(isset($themeum['footer_text_2'])) echo $themeum['footer_text_2']; ?>
                </div>
            </div>
            <div class="row">
            <hr>
            <p class="text-right"><img src="https://realeyz.de/wp-content/uploads/CreativeEuropeMedia.png"></p>
            </div>
        </div>
    </footer>
</div>
<?php if(isset($themeum['before_body']))  echo $themeum['before_body']; ?>
<?php if(isset($themeum['google_analytics'])) echo $themeum['google_analytics'];?>

    <?php if(isset($themeum['custom_css'])): ?>
        <?php if(!empty($themeum['custom_css'])): ?>
            <style>
                <?php echo $themeum['custom_css']; ?>
            </style>
        <?php endif; ?>
    <?php endif; ?>
<?php wp_footer(); ?>

<!-- Google Tag Manager -->

<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5SBNPN"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-5SBNPN');</script>

<!-- End Google Tag Manager -->

<!-- Google Code für ein Remarketing-Tag -->
<!--------------------------------------------------
Remarketing-Tags dürfen nicht mit personenbezogenen Daten verknüpft oder auf Seiten platziert werden, die sensiblen Kategorien angehören. Weitere Informationen und Anleitungen zur Einrichtung des Tags erhalten Sie unter: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1014986050;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1014986050/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script>
            sr.reveal('.scale-first', { delay: 500, scale: 0.9 });
            sr.reveal('.scale-second', { delay: 700, scale: 0.9 });
            sr.reveal('.scale-third', { delay: 800, scale: 0.9 });
            
            sr.reveal('.fadein-quick', { delay: 500, opacity: 0, scale: 1,distance: 0 });
            sr.reveal('.fadein', { delay: 800, opacity: 0, scale: 1,distance: 0 });
            sr.reveal('.fadein-slow', { delay: 1000, opacity: 0, scale: 1, distance: 0 });
    </script>
</body>
</html>