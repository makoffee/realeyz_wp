    <?php global $themeum; ?>

    <footer id="footer">
        <div class="container-wide">
            <div class="row" style="padding-bottom:20px;">
                <div class="col-xs-6">
                <img src="http://realeyz.de/wp-content/uploads/realeyz_logo_darker.svg" class="footer-brand">
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
                <div id="footer-links1" class="col-lg-2 col-md-3 col-sm-2 col-xs-4 footer-block">
                <?php
                if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
                }
                ?>
                </div>
                <div id="footer-links2" class="col-lg-2 col-md-3 col-sm-2 col-xs-4 footer-block">
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
            <p class="text-right"><img src="http://realeyz.de/wp-content/uploads/CreativeEuropeMedia.png"></p>
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