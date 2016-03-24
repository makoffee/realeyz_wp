    <section id="bottom" class="footer-wiget-area">
        <div class="container">
            <div class="row">
               <?php dynamic_sidebar('bottom'); ?>
            </div>
        </div>
    </section>
    <?php global $themeum; ?>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <div id="footer-links" class="secondary row">
                <div id="footer-links1" class="col-sm-4">
                <?php
                if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
                }
                ?>
                </div>
                <div id="footer-links2" class="col-sm-4">
                <?php
                if(is_active_sidebar('footer-sidebar-2')){
                dynamic_sidebar('footer-sidebar-2');
                }
                ?>
                </div>
                <div id="footer-links3" class="col-sm-4">
                <?php
                if(is_active_sidebar('footer-sidebar-3')){
                dynamic_sidebar('footer-sidebar-3');
                }
                ?>
                </div>
                </div>
                   <p><?php if(isset($themeum['footer_text_1'])) echo $themeum['footer_text_1']; ?></p>
                </div>
                <div class="col-sm-6 pull-right">
                <div class="style="clear:both;"><?php
                if(is_active_sidebar('footer-right')){
                dynamic_sidebar('footer-right');
                }
                ?></div>
                <div style="clear:both;">
                <?php if(isset($themeum['footer_text_2'])) echo $themeum['footer_text_2']; ?>
                </div>
                </div>
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