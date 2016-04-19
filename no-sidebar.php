<?php
/*
 * Template Name: Single Page - No sidebar
 */
get_header(); 

?>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
        $image = $image[0]; ?>
        <div id="hero" class="page-wrapper" style="background-image: url('<?php echo $image; ?>');" >
            <div class="clearfix title-wrap white container">
                <h1 class="entry-title theline"><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    <?php endif; ?>
    
    <section id="main" class="clearfix">
        <div id="page" class="container">
            <div id="content" class="site-content col-md-12" role="main">
                <?php /* The loop */ ?>
                <?php while ( have_posts() ): the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail() == null ) : ?>
                    <div class="clearfix title-wrap container">
                    <h2 class="entry-title"><span><?php the_title(); ?></span></h2>
            </div>
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


        </div>
    </section> <!--/#page-->

<?php get_footer();