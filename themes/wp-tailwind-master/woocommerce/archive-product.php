<?php
defined('ABSPATH') || exit;

/**
 * WooCommerce Shop Archive – AJAX-ready
 */

// === 1. TRYB AJAX (zwracamy tylko listę produktów + paginację) ===
if ( isset($_GET['ajax_products']) && $_GET['ajax_products'] == '1' ) {
    // główna query WooCommerce jest już ustawiona (pre_get_posts itd.)
    get_template_part('template-parts/shop-products-loop');
    exit;
} 

get_header('shop');

// Dekor, jeśli masz
if (function_exists('headSVG')) {
    headSVG();
}

// Przydatne: URL sklepu (bez parametrów)
$shop_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/');
$get_params = $_GET;

// Ustabilizowany tytuł strony
$current_title = 'Produkty';
if (is_tax('product_cat')) {
    $term = get_queried_object();
    if ($term && !is_wp_error($term)) {
        $current_title = $term->name;
    }
} elseif (is_post_type_archive('product')) {
    $current_title = 'Produkty';
}
?>
<div class="container mx-auto">
    <h1 class="pt-2 mt-16 mb-8 text-3xl font-bold lg:text-5xl lg:pl-32">
        <?php echo esc_html( $current_title ); ?>
    </h1>

    <div class="mt-10 lg:mt-24">

        <?php
        // Twój topowy blok filtrów / szukajki jeśli masz:
         get_template_part('template-parts/product-filters');
        ?>

        <!-- MOBILE toggle kategorii -->
        <a class="inline-block p-4 px-6 mt-10 text-sm font-semibold text-white cursor-pointer toggle_cat lg:hidden bg-primary-100 hover:bg-gray-900">
            <?php echo function_exists('pll_e') ? pll__('cat') : esc_html__('Kategorie', 'yourtheme'); ?>
        </a>

        <!-- KAFLE KATEGORII (główne kategorie produktu) -->
        <div class="flex-wrap hidden mt-12 lg:-mx-2 cats lg:flex">
            <?php
            $terms = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'orderby'    => 'ID',
                'parent'     => 0,
            ]);

            $base_params = $get_params;
            unset($base_params['cat']); // nie dubluj cat w URL

            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) :
                    // Pole ACF 'strona_glowna' albo podobne - jeśli używasz
                    $show = function_exists('get_field') ? get_field('strona_glowna', 'product_cat_' . $term->term_id) : true;
                    if (!$show) continue;

                    $thumb     = function_exists('get_field') ? get_field('ikona', 'product_cat_'.$term->term_id) : '';
                    $is_active = (isset($_GET['cat']) && $_GET['cat'] === $term->slug);

                    // Budujemy URL bez kotwicy #list
                    $url = add_query_arg(
                        array_merge($base_params, ['cat' => $term->slug]),
                        $shop_url
                    );
                    ?>
                    <div class="w-full mb-5 lg:w-1/5 lg:px-2">
                        <a href="<?php echo esc_url($url); ?>"
                           class="cat_block block shadow-md h-full px-8 pt-12 pb-5 text-center rounded-lg bg-white transition-all duration-200 hover:shadow <?php echo $is_active ? 'border border-primary-100' : ''; ?>">
                            <?php if ($thumb): ?>
                                <img class="h-10 mx-auto" style="max-width:40px;height:auto" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($term->name); ?>" />
                            <?php endif; ?>
                            <div class="font-bold text-base text-black mt-5"><?php echo esc_html($term->name); ?></div>
                        </a>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- LISTA + SIDEBAR -->
        <div id="list-box" class="flex flex-col-reverse flex-wrap lg:flex-no-wrap mt-2 lg:mt-20 lg:-mx-10 lg:flex-row">

            <!-- SIDEBAR FILTERS -->
            <aside class="w-full lg:w-3/12 mb-8 lg:mb-0 lg:px-10">
                <?php
                /**
                 * WAŻNE:
                 * shop-filters-sidebar.php NIE MOŻE już deklarować helperów.
                 * Helpery (pf_term_is_active, pf_build_filter_url, itp.) są wczytywane
                 * przez functions.php z template-parts/filters-helpers.php
                 */
                get_template_part('template-parts/shop-filters-sidebar');
                ?>
            </aside>

            <!-- PRODUCT LIST (dynamic / AJAX target) -->
            <div class="w-full lg:w-9/12 lg:px-10">
                <div id="products-and-pagination">
                    <?php
                    // Główna lista produktów + paginacja (osobny partial)
                    get_template_part('template-parts/shop-products-loop');
                    ?>
                </div>
            </div>
        </div>

        <!-- Banner pod listą -->
        <div class="-mt-10 -mb-10">
            <?php if ( function_exists('home_banner') ) echo home_banner(); ?>
        </div>
    </div>
</div>

<?php
get_footer('shop');
?>

<script>
// toggle kategorii dla mobile
document.addEventListener('DOMContentLoaded', function(){
    var t = document.querySelector('.toggle_cat');
    var c = document.querySelector('.cats');
    if (t && c) {
        t.addEventListener('click', function(e){
            e.preventDefault();
            c.classList.toggle('hidden');
        });
    }
});
</script>

<!-- Ten blok (addProduct/removeProduct) to Twój istniejący kod - zostaje -->
<script>
jQuery(function($){
    $(".removeProd").on("click", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $(this).css('opacity', '.5');
        $.post("/wp-admin/admin-ajax.php", { action:"addProduct", remove:id }, function(){
            location.reload();
        });
    });

    $(".addProduct").on("click", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $(this).css('opacity', '.5');
        $.post("/wp-admin/admin-ajax.php", { action:"addProduct", id:id, variant:0 }, function(data){
            $('.seeproducts').show();
            location.reload();
            console.log(data);
        });
    });
});
</script>
