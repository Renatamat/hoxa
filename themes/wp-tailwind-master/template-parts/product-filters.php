<?php
/**
 * Template Part: Product Filters (AJAX narrowing)
 */

defined('ABSPATH') || exit;

$action = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/');

$sel_cat   = isset($_GET['cat'])         ? sanitize_text_field($_GET['cat'])         : '';
$sel_brand = isset($_GET['brand'])       ? sanitize_text_field($_GET['brand'])       : '';
$sel_size  = isset($_GET['pa_rozmiar'])  ? sanitize_text_field($_GET['pa_rozmiar'])  : '';
$sel_q     = isset($_GET['s'])           ? sanitize_text_field($_GET['s'])           : '';

$cats   = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
]);

$sizes  = taxonomy_exists('pa_rozmiar')
    ? get_terms([
        'taxonomy'   => 'pa_rozmiar',
        'hide_empty' => true,
    ])
    : [];

$brands = taxonomy_exists('product_brand')
    ? get_terms([
        'taxonomy'   => 'product_brand',
        'hide_empty' => true,
    ])
    : [];

// Nonce do AJAX
$nonce = wp_create_nonce('pf_filters_nonce');
?>

<div id="pf-filters-wrap"
     class="flex-shrink-0 hidden lg:block"
     data-ajax="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>"
     data-nonce="<?php echo esc_attr( $nonce ); ?>">

    <form class="relative w-full" action="<?php echo esc_url( $action ); ?>#list" method="get">
        <input type="hidden" name="post_type" value="product" />

        <div class="relative">
            <input
                class="w-full py-4 pl-10 mb-0 border-none rounded-full shadow-2xl"
                type="text"
                placeholder="<?php echo esc_attr__('Czego dziś szukasz?', 'yourtheme'); ?>"
                name="s"
                value="<?php echo esc_attr( $sel_q ); ?>"
            />

            <button
                type="submit"
                style="height: calc(100% - 11px); top:50%; right:6px; background: url(<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/search.svg' ); ?>); background-position: 25px center;"
                class="absolute hidden w-auto px-10 pl-16 mb-0 text-sm font-semibold text-white transform -translate-y-1/2 bg-no-repeat border-none rounded-full cursor-pointer md:block bg-primary-100 top-1/2 hover:bg-gray-900"
            >
                <?php echo esc_html__('Szukaj', 'yourtheme'); ?>
            </button>
        </div>

        <div class="flex flex-wrap lg:-mx-2 cat_select">

            <!-- Kategoria produktu / product_cat -->
            <div class="w-full lg:w-4/12 lg:px-2">
                <select
                    id="pf-cat-top"
                    name="cat"
                    class="mt-4 mb-0 rounded-full shadow-2xl"
                >
                    <option value=""><?php echo esc_html__('Kategoria produktu', 'yourtheme'); ?></option>

                    <?php foreach ($cats as $c): ?>
                        <option
                            value="<?php echo esc_attr($c->slug); ?>"
                            <?php selected($sel_cat, $c->slug); ?>
                        >
                            <?php echo esc_html($c->name); ?>
                        </option>

                        <?php
                        // podkategorie
                        $children = get_terms([
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => true,
                            'parent'     => $c->term_id,
                        ]);
                        foreach ($children as $ch): ?>
                            <option
                                value="<?php echo esc_attr($ch->slug); ?>"
                                <?php selected($sel_cat, $ch->slug); ?>
                            >
                                — <?php echo esc_html($ch->name); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Rozmiar / atrybut pa_rozmiar -->
            <div class="w-full lg:w-4/12 lg:px-2">
                <select
                    id="pf-size-top"
                    name="pa_rozmiar"
                    class="mt-4 mb-0 rounded-full shadow-2xl"
                >
                    <option value=""><?php echo esc_html__('Rozmiar', 'yourtheme'); ?></option>

                    <?php foreach ($sizes as $s): ?>
                        <option
                            value="<?php echo esc_attr($s->slug); ?>"
                            <?php selected($sel_size, $s->slug); ?>
                        >
                            <?php echo esc_html($s->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Producent / product_brand -->
            <div class="w-full lg:w-4/12 lg:px-2">
                <select
                    id="pf-brand-top"
                    name="brand"
                    class="mt-4 mb-0 rounded-full shadow-2xl"
                >
                    <option value=""><?php echo esc_html__('Producent', 'yourtheme'); ?></option>

                    <?php foreach ($brands as $b): ?>
                        <option
                            value="<?php echo esc_attr($b->slug); ?>"
                            <?php selected($sel_brand, $b->slug); ?>
                        >
                            <?php echo $b->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
    </form>
</div> 
