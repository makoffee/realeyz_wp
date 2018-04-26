<?php get_header(); ?>

<?php
global $themeum;

$sidebar = 'right';
$content_class = 'col-xs-12 col-sm-12 col-md-8 col-lg-8';
$sidebar_class = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';

if ( isset($themeum['blog_extend']) && ($themeum['blog_extend'] == 1) ) {
    if ($themeum['sidebar_pos'] == 'left') {
        $content_class = 'col-md-9 col-sm-push-3';
        $sidebar_class = 'col-md-3 col-sm-pull-9';
    } else if($themeum['sidebar_pos'] == 'none') {
        $content_class = 'col-md-12';
        $sidebar_class = 'no-display';
    }
}
?>

    <section id="main" class="clearfix">
        <div id="page" class="container">
        <div id="content" class="site-content <?php echo $content_class; ?> no-padding" role="main">
                <?php /* The loop */ ?>
                <?php while ( have_posts() ): the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <h2 class="entry-title"><?php the_title(); ?></h2>
                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>

                    </article>

                    <?php // comment_template(); ?>

                <?php endwhile; ?>
            </div> <!--/#content-->

        <div id="sidebar" class="<?php echo $sidebar_class; ?>" role="complementary">
            <div class="sidebar-inner">
                <aside class="widget-area">
                    <?php dynamic_sidebar('sidebar');?>
                </aside>
            </div>
        </div> <!-- #sidebar -->

        </div>
    </section> <!--/#page-->

<?php get_footer();