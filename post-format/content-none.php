<div class="page-content">
    <?php if ( is_search() ) { ?>

    <header class="page-header">
    <h1 class="page-title"><?php _e( '[:de]Deine Suchanfrage erzielte keine Treffer[:]', 'themeum' ); ?></h1>
    <p>Didn't find what you were looking for?  Perhaps this can help:<p>
    <?php get_search_form(); ?>
    </header>
    <?php } else { ?>
    <header class="page-header">
    <h1 class="page-title"><?php _e( '404: error', 'themeum' ); ?></h1>
    <a href="https://realeyz.de/" class="btn btn-info">STARTSEITE</a>&nbsp;&nbsp;<a href="http://www.stream.realeyz.de/" class="btn btn-info">ZURÜCK ZU BROWSE</a>
    </header>
    <?php } ?>
</div><!-- .page-content -->