<?php
defined('ABSPATH') || exit;
?>

<div id="list" class="flex flex-wrap lg:-mx-2 navc">
    <?php
    if ( woocommerce_product_loop() ) :

        while ( have_posts() ) :
            the_post();
            ?>
            <div class="w-full mb-5 lg:w-4/12 lg:px-2">
                <?php
                if ( function_exists('prodItem') ) {
                    echo prodItem();
                } else {
                    wc_get_template_part( 'content', 'product' );
                }
                ?>
            </div>
            <?php
        endwhile;

    else :
        echo '<h3 class="text-lg font-semibold">'.esc_html(
            function_exists('pll__') ? pll__('Nothing') : __('Brak produktów', 'yourtheme')
        ).'</h3>';
    endif;
    ?>
</div>

<!-- PAGINACJA -->
<div class="mt-6 custom-pagination">
    <?php
    global $wp_query;
    if ( function_exists('pag') ) {
        echo pag( $wp_query ); // Twój paginator
    } else {
        woocommerce_pagination(); // domyślna paginacja Woo
    }
    ?>
</div>
 