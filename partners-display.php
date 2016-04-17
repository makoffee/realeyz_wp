<?php
/*
 * Template Name: Partner display
 */
get_header(); 

?>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
        $image = $image[0]; ?>
        <div id="hero" style="background-image: url('<?php echo $image; ?>');" >
            <div class="clearfix title-wrap white container">
                <h1 class="entry-title"><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    <?php endif; ?>
    
    <section id="" class="clearfix" style="background:#000000;">
        <div id="page" class="">
            <div id="content" class="site-content" role="main">
                <?php /* The loop */ ?>
                <?php while ( have_posts() ): the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail() == null ) : ?>
                    <div class="clearfix title-wrap container">
                    <h2 class="entry-title theline"><span><?php the_title(); ?></span></h2>
            </div>
        </div>
    <?php endif; ?>

<?php
//if (is_category('partners')) 
//{
//$args = array( 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
//$header_thumbs = get_posts( $args ); 
//}
$header_thumbs = get_posts('category_name=partners&posts_per_page=-1&order=DESC&orderby=date&suppress_filters=false');
if( $header_thumbs ) :
  foreach( $header_thumbs as $header_thumb ) {
  setup_postdata($header_thumb);
  echo '<div class="col-xs-6 col-sm-4 no-padding fadein-quick"><a href="' . get_permalink($header_thumb->ID) . '"><img src="' . get_the_post_thumbnail_url($header_thumb->ID)  . '" class="img-responsive"></div>';
  }
endif;
?>

                    </article>

                    <?php // comment_template(); ?>
                
                <?php endwhile; ?>
            </div> <!--/#content-->

            <!-- End of Sidebar -->

        </div>
    </section> <!--/#page-->

<?php get_footer();