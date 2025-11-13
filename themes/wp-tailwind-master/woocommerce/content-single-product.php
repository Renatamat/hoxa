<?php
/**
 * Nadpisanie: content-single-product.php
 * Ścieżka: yourtheme/woocommerce/content-single-product.php
 * Układ stylizowany klasami Tailwind, odwzorowuje Twój wcześniejszy wygląd („Szwalnia”),
 * ale korzysta z natywnego Woo: warianty (kolor/rozmiar), marka, kategoria, galeria.
 */

defined('ABSPATH') || exit;

global $product;
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

// Pomocnicze tłumaczenia (z Polylang jeśli jest)
$tr = function($text){ return function_exists('pll__') ? pll__($text) : $text; };
$tre = function($text){ if(function_exists('pll_e')) pll_e($text); else echo esc_html($text); };

// Główne obrazy
$main_id   = $product->get_image_id();
$main_url  = $main_id ? wp_get_attachment_image_url($main_id, 'large') : wc_placeholder_img_src('large');
$gallery_ids = $product->get_gallery_image_ids();

// MARKA (Producent → „Marka”)
// 1) jeśli używasz WooCommerce Brands → taksonomia 'product_brand'
// 2) jeśli marka to atrybut → 'pa_marka'
$brand_name = '';
$brand_terms = get_the_terms($product->get_id(), 'product_brand');
if ( $brand_terms && ! is_wp_error($brand_terms) ) {
    $brand_name = $brand_terms[0]->name;
} else {
    // Spróbuj z atrybutu 'pa_marka'
    $brand_attr = wc_get_product_terms( $product->get_id(), 'pa_marka', ['fields'=>'names'] );
    if ( ! empty($brand_attr) ) {
        $brand_name = $brand_attr[0];
    }
}

// KATEGORIE (z product_cat)
$cats = get_the_terms($product->get_id(), 'product_cat');
$cats_list = [];
if ($cats && ! is_wp_error($cats)) {
    foreach ($cats as $c) $cats_list[] = $c->name;
}

// Atrybuty wariantowe: kolor/rozmiar (przykładowe slugi 'kolor', 'rozmiar')
$colors  = wc_get_product_terms( $product->get_id(), 'pa_kolor',   ['fields'=>'names'] );
$sizes   = wc_get_product_terms( $product->get_id(), 'pa_rozmiar', ['fields'=>'names'] );

// Bezpieczeństwo haseł do produktu
if ( post_password_required() ) {
    echo get_the_password_form();
    return;
}
?>

<div class="opacity-25 lg:opacity-100" style="z-index:-1">
    <?php if(function_exists('headSVG')) headSVG(); ?>
</div>

<div class="container relative z-20 flex items-center justify-between mx-auto lg:px-0">
    <h1 class="pt-2 mt-8 mb-8 text-2xl font-bold lg:text-4xl lg:pl-32 lg:pr-12">
        <?php the_title(); ?>
    </h1>
    <div class="flex-shrink-0 hidden lg:block lg:w-5/12">
       <?php get_template_part('template-parts/product-filters'); ?>
    </div>
</div>
<div class="container relative mx-auto">
    
    <div class="flex flex-col-reverse flex-wrap mt-2 lg:mt-20 lg:-mx-10 lg:flex-row">

        <!-- LEWA KOLUMNA: opis + marka/kategorie/kolor/rozmiar + przyciski -->
        <div class="w-full lg:w-6/12 lg:px-10">
            <div class="mb-6 leading-relaxed">
                <?php the_content(); ?>
            </div>

            <?php if ($brand_name) : ?>
            <div class="pb-2 border-b border-gray-500">
                <span class="mr-2 font-bold text-black"><?php $tre('Producent'); ?>:</span> <?php echo esc_html($brand_name); ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($sizes)) : ?>
            <div class="pb-2 mt-4 border-b border-gray-500">
                <span class="mr-2 font-bold text-black"><?php $tre('Rozmiar'); ?>:</span>
                <?php echo esc_html(implode(', ', $sizes)); ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($colors)) : ?>
            <div class="pb-2 mt-4 border-b border-gray-500">
                <span class="mr-2 font-bold text-black"><?php $tre('Kolor'); ?>:</span>
                <?php echo esc_html(implode(', ', $colors)); ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($cats_list)) : ?>
            <div class="pb-2 mt-4 border-b border-gray-500">
                <span class="mr-2 font-bold text-black"><?php $tre('Kategorie'); ?>:</span>
                <?php echo esc_html(implode(', ', $cats_list)); ?>
            </div>
            <?php endif; ?>
            <?php
                // Pobierz wartość pola ACF
                $opis_punkty = get_field('opis_punkty');

                if ($opis_punkty) {
                    // Rozdziel tekst po średnikach
                    $punkty = explode(';', $opis_punkty);

                    // Iteracja po każdym punkcie
                    foreach ($punkty as $punkt) {
                        $punkt = trim($punkt);
                        if ($punkt) {
                            echo '
                            <div class="flex items-center mt-8 mb-4">
                                <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135" viewBox="0 0 25.931 20.135">
                                    <path id="check_9_" data-name="check (9)" d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0" transform="translate(0 -0.406)" fill="#f37836"></path>
                                </svg>
                                ' . esc_html($punkt) . '
                            </div>';
                        }
                    }
                }
                ?>

            

            <!-- FORMULARZ KOSZYKA / WARIANTÓW (natywny Woo) -->
            <div class="mt-8">
                <?php
                /**
                 * To wyświetla właściwy formularz dodania do koszyka:
                 * - dla produktów prostych: przycisk
                 * - dla wariantowych: wybór atrybutów (kolor/rozmiar) + przycisk
                 */
                do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
                ?>
            </div>
            <?php 
                /**
                 * Hook: woocommerce_before_single_product.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 */
                do_action( 'woocommerce_before_single_product' );
                ?>
        </div>

        <!-- PRAWA KOLUMNA: galeria -->
        <div class="w-full mb-4 lg:w-6/12 lg:px-10 lg:mb-0">
            <?php if ($main_url): ?>
                <a href="<?php echo esc_url($main_url); ?>"
                   data-fancybox="gallery"
                   class="block px-6 py-6 text-center text-gray-600 transition-all duration-200 bg-white rounded-lg shadow-md lg:py-16 hover:shadow">
                    <img style="max-height:20rem" class="mx-auto" src="<?php echo esc_url($main_url); ?>" alt="<?php the_title_attribute(); ?>" />
                </a>
            <?php endif; ?>

            <div class="flex flex-wrap mt-4 lg:flex-nowrap lg:-mx-1">
                <?php
                // Miniatury z galerii produktu
                if (!empty($gallery_ids)) :
                    foreach ($gallery_ids as $gid) :
                        $thumb = wp_get_attachment_image_url($gid, 'thumbnail');
                        $full  = wp_get_attachment_image_url($gid, 'large');
                        if (!$thumb || !$full) continue;
                ?>
                <div class="w-4/12 px-1 mb-2 lg:w-auto lg:flex-1">
                    <a href="<?php echo esc_url($full); ?>" data-fancybox="gallery"
                       class="flex items-center block h-full px-6 py-6 text-center text-gray-600 transition-all duration-200 bg-white rounded-lg shadow-md hover:shadow">
                        <img class="w-16 mx-auto" src="<?php echo esc_url($thumb); ?>" alt="" />
                    </a>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

    </div>
</div>

<!-- Sekcja „Sprawdź inne produkty” (3 produkty) -->
<div class="py-1 pb-12 mt-10 mb-20 bg-center bg-cover shadow-md lg:mt-16 lg:px-10 bg-primary-100"
     style="background:url(<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/young.png'); ?>) #F37836;">
    <div class="container mx-auto">
        <h3 class="mt-8 mb-5 font-bold text-center text-white text:lg md:text-4xl">
            <?php $tre('Sprawdź inne produkty'); ?>
        </h3>

        <div class="flex flex-wrap mt-4 lg:-mx-3 lg:mt-10 ">
            <?php
            $q = new WP_Query([
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'post__not_in'   => [ get_the_ID() ],
            ]);
            if ($q->have_posts()):
                while ($q->have_posts()): $q->the_post(); ?>
                    <div class="w-full mb-5 lg:w-4/12 lg:px-2">
                        <?php
                        // Jeśli masz własny renderer kafelka produktu:
                        if (function_exists('prodItem')) {
                            echo prodItem();
                        } else {
                            // Fallback: prosty link/miniatura
                            echo '<a class="block p-4 bg-white rounded-lg shadow hover:shadow-md transition" href="'.esc_url(get_permalink()).'">';
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['class'=>'w-full h-auto mb-3 rounded']);
                            }
                            echo '<div class="font-semibold">'.esc_html(get_the_title()).'</div>';
                            echo '</a>';
                        }
                        ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</div>
