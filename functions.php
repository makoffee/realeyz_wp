<?php

define('THEMEUMNAME', wp_get_theme()->get( 'Name' ));

define('THMCSS', get_template_directory_uri().'/css/');

define('THMJS', get_template_directory_uri().'/js/');

// Re-define meta box path and URL

define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/lib/meta-box' ) );
define( 'RWMB_DIR', trailingslashit(  get_stylesheet_directory() . '/lib/meta-box' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

require_once (get_template_directory().'/lib/metabox.php');



/*-------------------------------------------------------
 *				SMOF Theme Options Added
 *-------------------------------------------------------*/

require_once( get_template_directory()  . '/admin/index.php');

/*-------------------------------------------*
 *				Register Navigation
 *------------------------------------------*/

register_nav_menu( 'primary','Primary Menu' );
register_nav_menu( 'secondary','Secondary Menu' );
register_nav_menu( 'swissfilms','SWISS FILMS Menu' );
register_nav_menu( 'critic.de','critic.de Menu' );
register_nav_menu( 'exberliner','Exberliner Menu' );


/*-------------------------------------------*
 *				Themeum setup
 *------------------------------------------*/

if(!function_exists('thmtheme_setup')):

	function thmtheme_setup()
	{
		// load textdomain
    	load_theme_textdomain('themeum', get_template_directory() . '/languages');

		add_theme_support( 'post-thumbnails' );

// blog-large is used in several layouts, and should be considered in relation to the blog image size issues.

		add_image_size( 'blog-large', 1920, 1080, true );
//		add_image_size( 'blog-mid', 943, 493, true );
//		add_image_size( 'blog-thumb', 199, 128, true );
//		add_image_size( 'team', 435, 393, true );
//		add_image_size( 'portfolio', 435, 330, true );

// consider removing unused post formats 

		add_theme_support( 'post-formats', array( 'aside','audio','chat','gallery','image','link','quote','status','video' ) );

		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

		add_theme_support( 'automatic-feed-links' );

		add_editor_style('');

		if ( ! isset( $content_width ) )
			$content_width = 660;
	}

	add_action('after_setup_theme','thmtheme_setup');

endif;


/*-------------------------------------------*
 *		Themeum Widget Registration
 *------------------------------------------*/

if(!function_exists('thmtheme_widdget_init')):

	function thmtheme_widdget_init()
	{

		register_sidebar(array( 'name' 			=> __( 'Sidebar', 'themeum' ),
							  	'id' 			=> 'sidebar',
							  	'description' 	=> __( 'Widgets in this area will be shown on Sidebar.', 'themeum' ),
							  	'before_title' 	=> '<h3  class="widget_title">',
							  	'after_title' 	=> '</h3>',
							  	'before_widget' => '<div id="%1$s" class="widget %2$s" >',
							  	'after_widget' 	=> '</div>'
					)
		);
		
// some shit i found on the internet (sorry baby jesus, I didn't mean to make you cry).

register_sidebar( array(
'name' => 'Press Sidebar',
'id' => 'press-sidebar',
'description' => 'Appears on the press page',
'before_title' 	=> '<h3  class="widget_title">',
'after_title' 	=> '</h3>',
'before_widget' => '<div id="%1$s" class="widget %2$s" >',
'after_widget' 	=> '</div>'
) );
register_sidebar( array(
'name' => 'Video Post Sidebar',
'id' => 'video-sidebar',
'description' => 'Appears on video posts',
'before_title' 	=> '<h3  class="widget_title">',
'after_title' 	=> '</h3>',
'before_widget' => '<div id="%1$s" class="widget %2$s" >',
'after_widget' 	=> '</div>'
) );
register_sidebar( array(
'name' => 'Green-Film Sidebar',
'id' => 'green-film-sidebar',
'description' => 'Appears on Green Film category posts',
'before_title' 	=> '<h3  class="widget_title">',
'after_title' 	=> '</h3>',
'before_widget' => '<div id="%1$s" class="widget %2$s" >',
'after_widget' 	=> '</div>'
) );
register_sidebar( array(
'name' => 'Confrontations Sidebar',
'id' => 'confrontations-sidebar',
'description' => 'Appears on Confrontations Film category posts',
'before_title' 	=> '<h3  class="widget_title">',
'after_title' 	=> '</h3>',
'before_widget' => '<div id="%1$s" class="widget %2$s" >',
'after_widget' 	=> '</div>'
) );

register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Right',
'id' => 'footer-right',
'description' => 'Appears in the right side of the footer',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Login Widget',
'id' => 'login-widget',
'description' => 'appears in the nav bar',
'before_widget' => '<aside id="login-widget" class="widget %2$s">',
'after_widget' => '</aside>',
) );
	}
	
	add_action('widgets_init','thmtheme_widdget_init');

endif;


/*-------------------------------------------*
 *		Themeum Style
 *------------------------------------------*/

if(!function_exists('themeum_style')):

    function themeum_style(){
        wp_enqueue_style('thm-style',get_stylesheet_uri());
        wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
        wp_enqueue_style('resonsive',THMCSS.'responsive.css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap',THMJS.'bootstrap.min.js',array(),false,true);
        wp_enqueue_script('flexslider',THMJS.'jquery.flexslider.js',array(),false,true);
        /* wp_enqueue_script('SmoothScroll',THMJS.'SmoothScroll.js',array(),false,true); */
        wp_enqueue_script('scrollTo',THMJS.'jquery.scrollTo.js',array(),false,true);
        wp_enqueue_script('parallax',THMJS.'jquery.parallax.js',array(),false,true);
        wp_enqueue_script('nav',THMJS.'jquery.nav.js',array(),false,true);
        wp_enqueue_script('easing.min',THMJS.'jquery.easing.min.js',array(),false,true);
        wp_enqueue_script('isotope.min',THMJS.'jquery.isotope.min.js',array(),false,true);
        /* wp_enqueue_script('maps.google','https://maps.googleapis.com/maps/api/js?v=3.14&sensor=false',array(),'',true); */
        /* wp_enqueue_script('gmaps',THMJS.'gmaps.js',array(),false,true); */
        wp_enqueue_script('main',THMJS.'main.js',array(),false,true);
        wp_enqueue_script('cleeng.connect',THMJS.'cleeng.connect.js',array(),false,true);
        wp_enqueue_script('first-login',THMJS.'first-login.js',array(),false,true);
        
        
		global $themeum;

		if(isset($themeum['head_font'])):
			//wp_enqueue_style(themeum_slug($themeum['head_font']).'_one','https://fonts.googleapis.com/css?family='.$themeum['head_font'].':300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',array(),false,'all');
		endif;

		if(isset($themeum['g_select'])):
			//wp_enqueue_style(themeum_slug($themeum['g_select']).'_two','https://fonts.googleapis.com/css?family='.$themeum['g_select'].':300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',array(),false,'all');
		endif;

		if(isset($themeum['menu_font'])):
			//wp_enqueue_style(themeum_slug($themeum['menu_font']).'_three','https://fonts.googleapis.com/css?family='.$themeum['menu_font'].':300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'.$themeum['menu_font_style']['style'],array(),false,'all');
		endif;

		if(isset($themeum['preset'])):
			if(!empty($themeum['preset'])):
				$style_name = $themeum['preset'];
			else:
				$style_name = 'preset1';
			endif;
		else:
			$style_name 	= 'preset1';
		endif;

		if ( isset($themeum['skin'] ) && ($themeum['skin'] == 'skin2')) {
			wp_enqueue_style('enter_'.$themeum['skin'],get_template_directory_uri().'/css/skin/'.$themeum['skin'].'.css');
		}

		wp_enqueue_style('enter_'.$style_name,get_template_directory_uri().'/css/presets/'.$style_name.'.css');
		
		wp_enqueue_style('quick-style',get_template_directory_uri().'/quick-style.php',array(),false,'all');

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply','/wp-iclude/js/comment-reply.js',array(), null, true );

    }

    add_action('wp_enqueue_scripts','themeum_style');

endif;

if(!function_exists('themeum_slug')):

	function themeum_slug($text)
{
	return preg_replace('/[^a-z0-9_]/i','-', strtolower($text));
}

endif;


if(!function_exists('themeum_admin_style')):

	function themeum_admin_style()
	{
		if(is_admin())
		{
			wp_register_script('thmpostmeta', get_template_directory_uri() .'/js/admin/zee-post-meta.js');
			wp_enqueue_script('thmpostmeta');
		}
	}

	add_action('admin_enqueue_scripts','themeum_admin_style');

endif;

/*-------------------------------------------*
 *				Excerpt Length
 *------------------------------------------*/

if(!function_exists('new_excerpt_more')):

	function new_excerpt_more( $more )
	{
		return '&nbsp;<br /><br /><a class="btn btn-primary btn-sm" href="'. get_permalink( get_the_ID() ) . '">'.__('<!--:de-->Weiter lesen<!--:--><!--:en-->Read more<!--:-->','themeum').' <i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );

endif;



/*-------------------------------------------------------
*			Include the TGM Plugin Activation class
*-------------------------------------------------------*/

require_once( get_template_directory()  . '/lib/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'themeum_plugins_include');

if(!function_exists('themeum_plugins_include')):

	function themeum_plugins_include()
	{
		$plugins = array(

				array(
					'name'                  => 'Enter Slider', // The plugin name
					'slug'                  => 'enter-slider', // The plugin slug (typically the folder name)
					'source'                => get_stylesheet_directory() . '/lib/plugins/enter-slider.zip', // The plugin source
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => '', // If set, overrides default API URL and points to an external URL
				),

				array(
					'name'                  => 'Enter Team', // The plugin name
					'slug'                  => 'enter-team', // The plugin slug (typically the folder name)
					'source'                => get_stylesheet_directory() . '/lib/plugins/enter-team.zip', // The plugin source
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => '', // If set, overrides default API URL and points to an external URL
				),



				array(
					'name'                  => 'Themeum Project', // The plugin name
					'slug'                  => 'themeum-project', // The plugin slug (typically the folder name)
					'source'                => get_stylesheet_directory() . '/lib/plugins/themeum-project.zip', // The plugin source
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => '', // If set, overrides default API URL and points to an external URL
				),
				array(
					'name'                  => 'Enter Shortcodes', // The plugin name
					'slug'                  => 'themeum-enter-shortcodes', // The plugin slug (typically the folder name)
					'source'                => get_stylesheet_directory() . '/lib/plugins/themeum-enter-shortcodes.zip', // The plugin source
					'required'              => true, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => '', // If set, overrides default API URL and points to an external URL
				),
				array(
					'name'                  => 'Contact Form 7', // The plugin name
					'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
					// 'source'                => 'http://downloads.wordpress.org/plugin/contact-form-7.3.8.1.zip', // The plugin source
					'required'              => true, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => 'http://downloads.wordpress.org/plugin/contact-form-7.3.8.1.zip', // If set, overrides default API URL and points to an external URL
				),
			);

	$theme_text_domain = 'themeum';

	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
			'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
			'default_path'      => '',                           // Default absolute path to pre-packaged plugins
			'parent_menu_slug'  => 'themes.php',         		 // Default parent menu slug
			'parent_url_slug'   => 'themes.php',         		 // Default parent URL slug
			'menu'              => 'install-required-plugins',   // Menu slug
			'has_notices'       => true,                         // Show admin notices or not
			'is_automatic'      => false,            			 // Automatically activate plugins after installation or not
			'message'           => '',               			 // Message to output right before the plugins table
			'strings'           => array(
						'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
						'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
						'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
						'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
						'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
						'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
						'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
						'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
						'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
						'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
						'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
						'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
				)
	);

	tgmpa( $plugins, $config );

	}

endif;



/*-------------------------------------------------------
 *			Themeum Pagination
 *-------------------------------------------------------*/

if(!function_exists('themeum_pagination')):

	function themeum_pagination($pages = '', $range = 2)
	{  
	     $showitems = ($range * 1)+1;  

	     global $paged;

	     if(empty($paged)) $paged = 1;

	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;

	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }   

	     if(1 != $pages)
	     {
	     	echo '<div class="row">';
			echo '<div class="col-sm-10 col-sm-offset-2">';
			echo "<ul class='pagination pagination-lg'>";

			if($paged > 2 && $paged > $range+1 && $showitems < $pages){
				echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>";
			}

			if($paged > 1 && $showitems < $pages){ 
				echo '<li>';
				previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>');
				echo '</li>';
			}

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i)? "<li class='active'><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
				}
			}

			if ($paged < $pages && $showitems < $pages){
				echo '<li>';
				next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>');
				echo '</li>';
			}

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
				echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
			}
			
			echo "</ul>";
			echo "</div>";
			echo "</div>";
	     }
	}

endif;


/*-------------------------------------------------------
 *				Themeum Comment
 *-------------------------------------------------------*/

if(!function_exists('themeum_comment')):

	function themeum_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themeum' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body media">
				
					<div class="comment-avartar pull-left">
						<?php
							echo get_avatar( $comment, $args['avatar_size'] );
						?>
					</div>
					<div class="comment-context media-body">
						<div class="comment-head">
							<?php
								printf( '<span class="comment-author">%1$s</span>',
									get_comment_author_link());
							?>
							<span class="comment-date"><?php echo get_comment_date() ?></span><span class="comment-time"> at <?php echo get_comment_time()?></span>
						</div>

						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themeum' ); ?></p>
						<?php endif; ?>

						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
						<?php edit_comment_link( __( 'Edit', 'themeum' ), '<span class="edit-link btn btn-reply">', '</span>' ); ?>
						<span class="btn btn-reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'themeum' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span>
					</div>
				
			</div>
		<?php
			break;
		endswitch; 
	}

endif;


/*--------------------------------------------------------------
 * Get All Terms of Taxonomy 
 * @author : Themeum
 *-------------------------------------------------------------*/


function get_all_term_names( $post_id, $taxonomy = 'post_tag' )
{
	$terms = get_the_terms( $post_id, $taxonomy );

	$term_names = '';
    if ( $terms && ! is_wp_error( $terms ) )
    { 
        $term_name = array();

        foreach ( $terms as $term ) {
            $term_name[] = $term->name;
        }

        $term_names = join( ", ", $term_name );
    }

    return $term_names;
}


/*--------------------------------------------------------------
 *				One-Page Nav Walker
 *-------------------------------------------------------------*/

class Onepage_Walker extends Walker_Nav_menu{

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){

		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join(' ', $classes);

		if(in_array('menu-item-has-children', $item->classes))
			$class_names .= ' dropdown';

       	$class_names = ' class="'. esc_attr( $class_names ) .'"';

       
		$attributes 	= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes 	.= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';


		if($item->object == 'page')
		{
		    $post_object = get_post($item->object_id);

		    $separate_page = get_post_meta($item->object_id, "thm_no_hash", true);

		    $disable_item = get_post_meta($item->object_id, "thm_disable_menu", true);

			$current_page_id = get_option('page_on_front');

		    if ( ( $disable_item != true ) && ( $post_object->ID != $current_page_id ) ) {

		    	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names.'>';

		    	if ( $separate_page == true ){
		        	$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'" class="no-scroll"' : '';
		    	}
		        else{
		        	if (is_front_page()){
		        		$attributes .= ' href="#' . $post_object->post_name . '"'; 
		        	}
		        	else {
		        		$attributes .= ' href="' . home_url() . '#' . $post_object->post_name . '" class="no-scroll"';
		        	}
		        }	

		        $item_output = $args->before;
		        $item_output .= '<a'. $attributes .'>';
		        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		        $item_output .= $args->link_after;
		        $item_output .= '</a>';
		        $item_output .= $args->after;

		        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );            	              	
		    }
		                             
		}
		else
		{

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names.'>';

		    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'" class="no-scroll"' : '';

		    $item_output = $args->before;
	        $item_output .= '<a'. $attributes .'>';
	        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
	        $item_output .= $args->link_after;
	        $item_output .= '</a>';
	        $item_output .= $args->after;

		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	// end element

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {
		
		global $wp_query;

		if($item->object == 'page')
		{
			$post_object = get_post($item->object_id);

			$separate_page = get_post_meta($item->object_id, "thm_no_hash", true);

			$disable_item = get_post_meta($item->object_id, "thm_disable_menu", true);

			$current_page_id = get_option('page_on_front');

			if ( ( $disable_item != true ) && ( $post_object->ID != $current_page_id ) ) {
				$output .= "</li>\n";
			}
		}
		else
		{
			$output .= "</li>\n";
		}
	}
}

// custom excerpt length

if(!function_exists('the_excerpt_max_charlength')){

	function the_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut ).'...';
			} else {
				return $subex.'...';
			}

		} else {
			return $excerpt;
		}
	}

}

// Add Google Map Script
// I took it out and addeded it to gmaps.php



// Post View Count

function post_view_count($id){

	$key = "_post_count_key";

	$count = get_post_meta( $id, $key,true);

	if($count == ''){
		$count = 0;
		add_post_meta( $id, $key, 0);
	}
	else{
		$count = $count+1;
		update_post_meta( $id, $key, $count);
	}

	return $count;
}

// Add SVG support.

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// sets default featured images to select categories... oh la la

function default_category_featured_image() {
global $post;
$featured_image_exists = has_post_thumbnail($post->ID);
              
if (!$featured_image_exists)  {
$attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

if ($attached_image) {
						  
foreach ($attached_image as $attachment_id => $attachment) {
set_post_thumbnail($post->ID, $attachment);
}}
else if ( in_category('55') ) {
set_post_thumbnail($post->ID, '471');
}
else if ( in_category('56') ) {
set_post_thumbnail($post->ID, '471');
}
else if ( in_category('57') ) {
set_post_thumbnail($post->ID, '471');
}
//else {
//set_post_thumbnail($post->ID, '40381');
//wp_reset_postdata();
					//		   }
							   
                           }
                        
      }
add_action('the_post', 'default_category_featured_image');

## Hacky fix for qTranslate sorting ##

add_filter( 'posts_clauses', 'qtrans_fix_clauses', 999, 2 );
function qtrans_fix_clauses($clauses,$query){
if(!is_admin()){
global $q_config;
$lang = $q_config['language'];
if($query->query_vars['orderby'] == 'title'){
$clauses['orderby'] = "SUBSTR(post_title, IF(LOCATE('<!--:".$lang."-->',post_title),LOCATE('<!--:".$lang."-->',post_title)+10, LOCATE('[:".$lang."]',post_title)+5),
IF(LOCATE('<!--:".$lang."-->',post_title),LOCATE('<!--:-->',post_title,LOCATE('<!--:".$lang."-->',post_title)+10) - (LOCATE('<!--:".$lang."-->',post_title)+10),
LOCATE('[:',post_title,LOCATE('[:".$lang."]',post_title)+5) - (LOCATE('[:".$lang."]',post_title)+5))) ".$query->query_vars['order'];
}
}
return $clauses;
}


## auto add first image as featured image (fingers crossed) ##
// this works by the way only for images attached to the post, so great for new posts but 

function auto_featured_image() { global $post;  if (!has_post_thumbnail($post->ID)) { $attached_image = get_children( "post_parent=$post->ID&amp;post_type=attachment&amp;post_mime_type=image&amp;numberposts=1" );  if ($attached_image) { foreach ($attached_image as $attachment_id => $attachment) { set_post_thumbnail($post->ID, $attachment_id); } } } } 



// Use it temporary to generate all featured images 
//add_action('the_post', 'auto_featured_image'); 
//// Used for new posts 
//add_action('save_post', 'auto_featured_image'); 
//add_action('draft_to_publish', 'auto_featured_image'); 
//add_action('new_to_publish', 'auto_featured_image'); 
//add_action('pending_to_publish', 'auto_featured_image'); 
//add_action('future_to_publish', 'auto_featured_image');

function gpi_find_image_id($post_id) {
    if (!$img_id = get_post_thumbnail_id ($post_id)) {
        $attachments = get_children(array(
            'post_parent' => $post_id,
            'post_type' => 'attachment',
            'numberposts' => 1,
            'post_mime_type' => 'image'
        ));
        if (is_array($attachments)) foreach ($attachments as $a)
            $img_id = $a->ID;
    }
    if ($img_id)
        return $img_id;
    return false;
}

function find_img_src($post) {
    if (!$img = gpi_find_image_id($post->ID))
    if ($img = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches))
            $img = $matches[1][0];
    if (is_int($img)) {
        $img = wp_get_attachment_image_src($img);
        $img = $img[0];
    }
    return $img;
}

# stop wordpress from making my life into a living hell.

#remove_filter( 'the_content', 'wpautop' );
#remove_filter( 'the_excerpt', 'wpautop' );

#add_filter( 'the_content', 'nl2br' );
#add_filter( 'the_excerpt', 'nl2br' );

//Hide categories from WordPress category widget
function exclude_widget_categories($args){
    $exclude = "1,56,57,7,3,42,5017,5018,55";
    $args["exclude"] = $exclude;
    return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");