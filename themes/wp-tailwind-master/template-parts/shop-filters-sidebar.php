<?php
defined('ABSPATH') || exit;

/**
 * Sidebar filters for shop/category pages
 * Hoxa style (dynamic version)
 */
?>
<form id="shop-filters" class="bg-white px-6 pt-8 pb-10 text-gray-600 rounded-lg shadow-md sticky top-6">
    <!-- KATEGORIE -->
    <div class="mb-8">
        <div class="mb-4 text-[11px] font-semibold tracking-wide text-black uppercase">
            <?php echo function_exists('pll_e') ? pll__('Kategorie') : esc_html__('Kategorie','yourtheme'); ?>
        </div>

        <?php
        $parents = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
        ]);

        if ( ! empty($parents) && ! is_wp_error($parents) ) :
            echo '<ul class="space-y-2">';

            foreach ($parents as $parent_term):

                $parent_active =
                    pf_term_is_active('product_cat', $parent_term->slug)
                    || (
                        is_product_taxonomy()
                        && is_a(get_queried_object(), 'WP_Term')
                        && (int) get_queried_object()->term_id === (int) $parent_term->term_id
                    );

                $parent_url = pf_build_filter_url('product_cat', $parent_term->slug);

                echo '<li>';

                echo '  <a class="block text-sm font-semibold transition-colors duration-200 ';
                echo        ($parent_active ? 'text-primary-100' : 'text-black hover:text-primary-100');
                echo    '" href="'.$parent_url.'" data-tax="product_cat" data-slug="'.esc_attr($parent_term->slug).'">';
                echo        esc_html($parent_term->name);
                echo '  </a>';

                $children = get_terms([
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => true,
                    'parent'     => $parent_term->term_id,
                ]);

                if ( ! empty($children) && ! is_wp_error($children) ) {
                    echo '<ul class="ml-3 mt-3 border-l border-gray-200 pl-4 space-y-1">';

                    foreach ($children as $child_term) {

                        $child_active =
                            pf_term_is_active('product_cat', $child_term->slug)
                            || (
                                is_product_taxonomy()
                                && is_a(get_queried_object(), 'WP_Term')
                                && (int) get_queried_object()->term_id === (int) $child_term->term_id
                            );

                        $child_url = pf_build_filter_url('product_cat', $child_term->slug);

                        echo '<li>';
                        echo '  <a class="block text-xs transition-colors duration-200 ';
                        echo        ($child_active ? 'text-primary-100 font-semibold' : 'text-gray-600 hover:text-primary-100');
                        echo    '" href="'.$child_url.'" data-tax="product_cat" data-slug="'.esc_attr($child_term->slug).'">';
                        echo        esc_html($child_term->name);
                        echo '  </a>';
                        echo '</li>';
                    }

                    echo '</ul>';
                }

                echo '</li>';

            endforeach;

            echo '</ul>';
        endif;
        ?>
    </div>

    <?php
    // DYNAMICZNE BLOKI FILTRÓW
    $filter_taxonomies = pf_get_filter_taxonomies();

    foreach ( $filter_taxonomies as $tax_slug => $tax_label ) {
        pf_render_tax_block( $tax_slug, $tax_label );
    }
    ?>

    <!-- WYCZYŚĆ FILTRY -->
    <div class="pt-4 mt-4 border-t border-gray-200">
        <?php
        $clear_url = is_product_taxonomy()
            ? get_term_link(get_queried_object())
            : wc_get_page_permalink('shop');
        ?>
        <a href="<?php echo esc_url($clear_url); ?>"
           class="shop-clear-filters inline-block text-[11px] font-semibold text-black hover:text-black underline rounded-full">
            <?php echo function_exists('pll_e') ? pll__('Wyczyść filtry') : esc_html__('Wyczyść filtry','yourtheme'); ?>
        </a>
    </div>
</form>
