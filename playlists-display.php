<?php
/*
 * Template Name: Playlist display
 */
get_header(); 

?>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
        $image = $image[0]; ?>
        <div id="hero" class="page-wrapper" style="background-image: url('<?php echo $image; ?>');" >
            <div class="clearfix title-wrap white container">
                <h1 class="entry-title"><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    <?php endif; ?>
    
    <section id="" class="clearfix" style="background:#000000;">
        <div id="page" class="">
            <div id="content" class="site-content" role="main">
                <?php /* The loop */ ?>
                
                <?php while ( have_posts() ): the_post();?>
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
$header_thumbs = get_posts('category_name=playlists&posts_per_page=-1&order=DESC&orderby=date&suppress_filters=false');
if( $header_thumbs ) :
  foreach( $header_thumbs as $header_thumb ) {
  setup_postdata($header_thumb);
  $no_title = get_post_meta($header_thumb->ID, 'thm_no_title', true );
  if( $no_title != 1 ){
  echo '<div class="col-xs-6 col-sm-4 no-padding zoomin category-display"><a href="' . get_permalink($header_thumb->ID) . '"><div class="img-overlay-dark"><h3 class="entry-title white text-center"><span class="over-under">'. get_the_title($header_thumb->ID) . '</span></h3></div><img src="' . get_the_post_thumbnail_url($header_thumb->ID)  . '" class="img-responsive img-category"></div>';
  } else {echo '<div class="col-xs-6 col-sm-4 no-padding zoomin category-display"><a href="' . get_permalink($header_thumb->ID) . '"><div class="img-overlay"></div><img src="' . get_the_post_thumbnail_url($header_thumb->ID)  . '" class="img-responsive img-category"></div>';}
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