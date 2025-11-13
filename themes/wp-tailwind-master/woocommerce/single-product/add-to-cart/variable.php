<?php
/**
 * Variable product add to cart
 *
 * Custom front UI inspired by legacy ACF warianty select,
 * but keeps WooCommerce variation logic intact.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' )
    ? wc_esc_json( $variations_json )
    : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' );
?>

<form
    class="variations_form cart"
    action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
    method="post"
    enctype="multipart/form-data"
    data-product_id="<?php echo absint( $product->get_id() ); ?>"
    data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>"
>
    <?php do_action( 'woocommerce_before_variations_form' ); ?>

    <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>

        <p class="stock out-of-stock">
            <?php
            echo esc_html(
                apply_filters(
                    'woocommerce_out_of_stock_message',
                    __( 'This product is currently out of stock and unavailable.', 'woocommerce' )
                )
            );
            ?>
        </p>

    <?php else : ?>

        <!-- Nasz custom UI dla wyboru wariantów -->
        <div class="variations mt-8" role="presentation">
            <div class="block font-bold text-black">
                <?php
                // "Wybierz wariant:" – jak w Twoim kodzie
                if ( function_exists('pll_e') ) {
                    pll_e('Wybierz wariant');
                } else {
                    esc_html_e('Wybierz wariant', 'yourtheme');
                }
                ?>:
            </div>

            <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                <div class="mt-4">
                    <label
                        for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"
                        class="block mb-2 text-sm font-semibold text-black"
                    >
                        <?php echo wp_kses_post( wc_attribute_label( $attribute_name ) ); ?>
                    </label>

                    <?php
                    // renderujemy standardowe wc_dropdown_variation_attribute_options,
                    // ale dokładamy nasze klasy tailwindowe
                    wc_dropdown_variation_attribute_options(
                        array(
                            'options'   => $options,
                            'attribute' => $attribute_name,
                            'product'   => $product,
                            'class'     => 'px-4 py-4 mb-0 w-full rounded-full shadow-2xl border border-gray-200 text-sm font-medium text-black bg-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-black/10', // <== nasz wygląd
                        )
                    );

                    // link "Wyczyść"
//                    if ( end( $attribute_keys ) === $attribute_name ) {
//                        echo wp_kses_post(
//                            apply_filters(
//                                'woocommerce_reset_variations_link',
//                                '<a class="reset_variations text-xs font-normal text-gray-500 ml-3 inline-block align-middle" href="#" aria-label="' .
//                                    esc_attr__( 'Clear options', 'woocommerce' ) .
//                                '">' .
//                                    esc_html__( 'Wyczyść', 'woocommerce' ) .
//                                '</a>'
//                            )
//                        );
//                    }
                    ?>
                </div>
            <?php endforeach; ?>

            <div class="reset_variations_alert screen-reader-text" role="alert" aria-live="polite" aria-relevant="all"></div>
        </div>

        <?php do_action( 'woocommerce_after_variations_table' ); ?>

        <!-- Cena / dostępność / qty / przycisk dodaj do koszyka -->
        <div class="single_variation_wrap mt-6">
            <?php

            do_action( 'woocommerce_before_single_variation' );
            /**
             * Hook: woocommerce_single_variation.
             *
             * @hooked woocommerce_single_variation - 10 (variation data: price, stock msg)
             * @hooked woocommerce_single_variation_add_to_cart_button - 20 (qty + add to cart)
             */
            do_action( 'woocommerce_single_variation' );

            do_action( 'woocommerce_after_single_variation' );
            ?>
        </div>

    <?php endif; ?>

    <?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
// Dodatkowe CTA jak w Twoim starym layoucie
?>

<div class="flex flex-col mb-6 -mt-4 md:flex-row lg:mt-0 lg:mb-0">
    <a href="<?php echo function_exists('pll_url') ? pll_url(28) : '#'; ?>"
        class="inline-block p-4 px-5 mt-10 text-xs font-semibold text-white transition-all duration-200 rounded-full md:px-3 bg-primary-100 hover:bg-gray-900 hover:text-white">
        <?php echo function_exists('pll_e') ? pll__('Zapytaj o produkt') : esc_html__('Zapytaj o produkt','yourtheme'); ?>
    </a>

    <a href="#"
        data-id="<?php echo esc_attr( get_the_ID() ); ?>"
        class=" inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full addProduct md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100">
        <?php echo function_exists('pll_e') ? pll__('Dodaj do oferty') : esc_html__('Dodaj do oferty','yourtheme'); ?>
    </a>

    <?php if ( get_field('karta_produktu') ) : ?>
        <a href="<?php echo esc_url( get_field('deklaracje') ); ?>"
            class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100">
            <?php echo function_exists('pll_e') ? pll__('Karta produktu') : esc_html__('Karta produktu','yourtheme'); ?>
        </a>
    <?php endif; ?>

    <?php if ( get_field('tabela_rozmiarow') ) : ?>
        <a href="<?php echo esc_url( get_field('deklaracje') ); ?>"
            class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100">
            <?php echo function_exists('pll_e') ? pll__('Tabela rozmiarow') : esc_html__('Tabela rozmiarów','yourtheme'); ?>
        </a>
    <?php endif; ?>
</div>

<div class="flex">
    <a href="<?php echo esc_url( get_permalink(5281) ); ?>"
        style="display:none"
        class="p-2 px-4 mt-6 text-xs font-semibold text-white border seeproducts border-primary-100 bg-primary-100 hover:bg-gray-900 hover:text-white">
        Zobacz swoje produkty
    </a>
</div>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
?>

