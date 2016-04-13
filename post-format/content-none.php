<header class="page-header">
    <h1 class="page-title"><?php _e( 'Nothing Found', 'themeum' ); ?></h1>
</header>

<div class="page-content">
    <?php if ( is_search() ) { ?>

    <p><?php _e( 'Oops Sorry, but nothing matched your search terms. Please try again with different keywords.', 'themeum' ); ?></p>
    <?php get_search_form(); ?>
    <?php relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "?</p>", 5); ?>
    <?php } else { ?>

    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'themeum' ); ?></p>
    <?php get_search_form(); ?>

    <?php } ?>
</div><!-- .page-content -->