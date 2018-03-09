<?php $blogViews = get_post_meta(get_the_ID(),'_post_count_key',true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-item">  		
		<div>
            <div class="blog-content">
					<div class="featured-image">

			     <div class="intrinsic-container intrinsic-container-16x9">
					<?php $video_source = rwmb_meta( 'thm_video_source' ); ?>
                    <?php $kmc_entry_id = get_post_meta($post->ID, 'kmc_entry_id', true); ?>
					<?php $video = rwmb_meta( 'thm_video' ); ?>
                    <?php if($kmc_entry_id != ''): ?>
                        <?php echo '<iframe id="kaltura_player_1509100143" src="https://www.kaltura.com/p/2031841/sp/203184100/embedIframeJs/uiconf_id/40844861/partner_id/2031841?iframeembed=true&playerId=kaltura_player_1509100143&entry_id='.$kmc_entry_id.'" width="600" height="337" allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder="0"></iframe>'; ?>
                    <?php endif; ?>
					<?php if($video_source == 1): ?>
						<?php echo rwmb_meta( 'thm_video' ); ?>
					<?php elseif ($video_source == 2): ?>
						<?php echo '<iframe width="100%" height="350" src="http://www.youtube.com/embed/'.$video.'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; ?>
					<?php elseif ($video_source == 3): ?>
						<?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
					<?php endif; ?>
				</div>	
				</div>
	                 <header class="entry-header">
	                 <div class="row">
	                 <div class="<?php if($kmc_entry_url != ''): ?>col-xs-6<?php endif; ?> no-padding">
	                        <h4 class="entry-title no-margin">
	                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	                            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
	                            <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
	                            <?php } ?>
	                        </h4> 
	                        <!-- //.entry-title -->
	                </div>
	                <?php if($kmc_entry_url != ''): ?>
	                <div class="col-xs-6 text-right no-padding">
			        <a class="btn btn-primary btn-sm" href="<?php echo($kmc_entry_url); ?>">WATCH NOW</a>
	                </div>
	                <?php endif; ?>
	                </div>
	                </header>
	                <!-- custom author -->
    			 <h5 style="color:#666;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
    			 <?php
    			 $custom_author = get_post_meta($post->ID, 'custom_author', true);
    			 $custom_author_url = get_post_meta($post->ID, 'custom_author_url', true);	 
    			 if (($custom_author_url != '' )&&($custom_author != '')) { ?><a href="<?php echo($custom_author_url); ?>"><?php echo($custom_author); ?></a> <?php }
    			 else if (($custom_author_url == '' )&&($custom_author != '')) { echo($custom_author);
    			 } else { the_author_posts_link(); } ?>
    			 &nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?><?php if ($blogViews !=0) {?>
&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo ($blogViews); }; ?></h5>
                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                        <span class="comments-number"> <i class="fa fa-comments-o"></i> <?php echo get_comments_number(get_the_ID()); ?></span>
                    <?php endif;?>
                <!-- //.facebook -->
					 <div class="post-content">
					 <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&width=450&layout=standard&action=like&size=small&show_faces=false&share=true&height=40&appId" width="450" height="40" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			            <?php the_excerpt(); ?>
			        </div>
			        

		        </div>
        </div>

    </div> <!--/#post-->

</article> <!--/#post-->

