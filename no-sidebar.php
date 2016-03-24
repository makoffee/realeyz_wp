<?php
/*
 * Template Name: Single Page - No sidebar
 */
get_header(); 

?>

    <section id="main" class="clearfix">
        <div id="page" class="container">
            <div id="content" class="site-content col-md-12" role="main">
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

            <!-- End of Sidebar -->

        </div>
    </section> <!--/#page-->

<?php get_footer();