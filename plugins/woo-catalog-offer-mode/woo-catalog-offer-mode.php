<?php
/**
 * Plugin Name: WooCommerce – Catalog / Offer Mode
 * Description: Ukrywa wszystkie ceny w WooCommerce i zamienia sklep w formularz ofertowy: dodajesz produkty, wysyłasz zapytanie, bez płatności i bez dostawy.
 * Author: Miyo Studio - RM
 * Version: 1.0.0
 * Requires Plugins: woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WC_Catalog_Offer_Mode {

    public function __construct() {
        // tylko jeśli WooCommerce jest aktywny
        add_action( 'plugins_loaded', [ $this, 'maybe_boot' ], 11 );
    }

    public function maybe_boot() {
        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        /**
         * GŁÓWNE HOOKI
         */
        // 1. ceny wszędzie
        add_filter( 'woocommerce_get_price_html', '__return_empty_string', 9999 );
        add_filter( 'woocommerce_get_variation_price_html', '__return_empty_string', 9999 );
        add_filter( 'woocommerce_variable_sale_price_html', '__return_empty_string', 9999 );
        add_filter( 'woocommerce_variable_price_html', '__return_empty_string', 9999 );

        // w koszyku / mini-koszyku
        add_filter( 'woocommerce_cart_item_price', '__return_empty_string', 9999 );
        add_filter( 'woocommerce_cart_item_subtotal', '__return_empty_string', 9999 );

        // w zamówieniu (podsumowania pozycji)
        add_filter( 'woocommerce_order_formatted_line_subtotal', '__return_empty_string', 9999 );

        // 2. przycisk “dodaj do koszyka” -> “Dodaj do oferty”
        add_filter( 'woocommerce_product_single_add_to_cart_text', [ $this, 'btn_text' ], 20 );
        add_filter( 'woocommerce_product_add_to_cart_text', [ $this, 'btn_text' ], 20 );

        // 3. wyłącz płatności i wysyłkę
        add_filter( 'woocommerce_cart_needs_shipping', '__return_false', 9999 );
        add_filter( 'woocommerce_cart_needs_payment', '__return_false', 9999 );
        add_filter( 'woocommerce_cart_ready_to_calc_shipping', '__return_false', 9999 );
        add_filter( 'woocommerce_payment_gateways', [ $this, 'disable_gateways' ], 9999 );

        // 4. ukryj podsumowania kwot w checkout / podziękowaniu
        add_filter( 'woocommerce_get_order_item_totals', [ $this, 'hide_order_totals' ], 9999, 3 );

        // 5. usuń widgetowy mini-koszyk (żeby nie straszył “0,00 zł”)
        add_filter( 'woocommerce_widget_cart_is_hidden', '__return_true', 9999 );

        // 6. komunikaty nad koszykiem i checkoutem
        add_action( 'woocommerce_before_cart', [ $this, 'info_cart' ] );
        add_action( 'woocommerce_before_checkout_form', [ $this, 'info_checkout' ] );

        // 7. podmień tytuły stron (opcjonalne)
        add_filter( 'woocommerce_cart_page_title', [ $this, 'cart_title' ] );
        add_filter( 'woocommerce_checkout_page_title', [ $this, 'checkout_title' ] );

        // 8. CSS na froncie – gdyby coś się wymknęło
        add_action( 'wp_enqueue_scripts', [ $this, 'inject_css' ], 99 );

        // 9. override szablonów “w locie” (cart totals, payment)
        add_filter( 'woocommerce_locate_template', [ $this, 'override_templates' ], 10, 3 );

        // 10. upewnij się, że totals w koszyku nie pokazują wartości
        add_filter( 'woocommerce_cart_total', '__return_empty_string', 9999 );
        add_filter( 'woocommerce_cart_subtotal', '__return_empty_string', 9999 );

        // 11. w mailach linie pozycji na 0
        add_filter( 'woocommerce_order_item_get_subtotal', [ $this, 'force_zero' ], 9999, 2 );
        add_filter( 'woocommerce_order_item_get_total', [ $this, 'force_zero' ], 9999, 2 );

        // 12. uprość checkout do danych kontaktowych
        add_filter( 'woocommerce_checkout_fields', [ $this, 'simplify_checkout_fields' ] );
        add_filter( 'woocommerce_order_button_text', [ $this, 'order_button_text' ] );


    }

    public function btn_text( $text ) {
        return __( 'Dodaj do oferty', 'woo-catalog-offer-mode' );
    }

    public function disable_gateways( $gateways ) {
        // brak płatności
        return [];
    }

    public function hide_order_totals( $totals, $order, $tax_display ) {
        foreach ( ['cart_subtotal', 'shipping', 'payment_method', 'order_total', 'discount'] as $key ) {
            if ( isset( $totals[ $key ] ) ) {
                unset( $totals[ $key ] );
            }
        }
        return $totals;
    }

    public function info_cart() {
        echo '<p class="woocommerce-info">'.esc_html__( 'To jest formularz ofertowy. Dodaj produkty do listy i przejdź dalej, aby wysłać zapytanie – bez płatności.', 'woo-catalog-offer-mode' ).'</p>';
    }

    public function info_checkout() {
        echo '<p class="woocommerce-info">'.esc_html__( 'Uzupełnij dane, a prześlemy Ci wycenę i szczegóły dostawy. Nie pobieramy płatności online.', 'woo-catalog-offer-mode' ).'</p>';
    }

    public function cart_title( $title ) {
        return __( 'Twoja oferta', 'woo-catalog-offer-mode' );
    }

    public function checkout_title( $title ) {
        return __( 'Wyślij zapytanie', 'woo-catalog-offer-mode' );
    }

    public function inject_css() {
        $css = "
        /* ukrycie resztek cen i podsumowań */
        .price,
        .woocommerce-Price-amount,
        .cart-subtotal,
        .order-total,
        .woocommerce-mini-cart__total,
        .woocommerce-checkout-review-order-table tfoot,
        .woocommerce-cart .cart_totals,
        .woocommerce ul.order_details li.total,
        .woocommerce ul.order_details li.order_total, 
        .wp-block-woocommerce-checkout-order-summary-totals-block, 
        .wc-block-components-totals-item,
        .wc-offer-hidden-field{
            display: none !important;
        }
        .wc-block-components-totals-wrapper{
        border-top: none;
       }
        /* ukryj przycisk 'Przejdź do płatności' jeśli motyw go dodaje */
        .wc-proceed-to-checkout a.checkout-button {
            display: inline-block;
        }
        ";
        wp_add_inline_style( 'woocommerce-general', $css );
    }

    /**
     * Podmieniamy 2 szablony Woo bez kopiowania do motywu:
     * - cart/cart-totals.php
     * - checkout/payment.php
     */
    public function override_templates( $template, $template_name, $template_path ) {

        // ścieżka do pluginu
        $plugin_path = plugin_dir_path( __FILE__ ) . 'templates/';

        if ( $template_name === 'cart/cart-totals.php' ) {
            $custom = $plugin_path . 'cart/cart-totals.php';
            if ( file_exists( $custom ) ) {
                return $custom;
            }
        }

        if ( $template_name === 'checkout/payment.php' ) {
            $custom = $plugin_path . 'checkout/payment.php';
            if ( file_exists( $custom ) ) {
                return $custom;
            }
        }

        return $template;
    }

    public function force_zero($val, $item) {
        return 0;
    }

    public function simplify_checkout_fields( $fields ) {
        if ( isset( $fields['billing'] ) ) {
            $allowed = [ 'billing_first_name', 'billing_last_name', 'billing_phone' ];

            foreach ( $fields['billing'] as $key => $field ) {
                if ( in_array( $key, $allowed, true ) ) {
                    continue;
                }

                $fields['billing'][ $key ]['required'] = false;

                if ( isset( $fields['billing'][ $key ]['class'] ) && is_array( $fields['billing'][ $key ]['class'] ) ) {
                    $fields['billing'][ $key ]['class'][] = 'wc-offer-hidden-field';
                } else {
                    $fields['billing'][ $key ]['class'] = [ 'wc-offer-hidden-field' ];
                }

                $fields['billing'][ $key ]['priority'] = isset( $fields['billing'][ $key ]['priority'] )
                    ? $fields['billing'][ $key ]['priority'] + 1000
                    : 1000;
            }

            if ( isset( $fields['billing']['billing_first_name'] ) ) {
                $fields['billing']['billing_first_name']['label']       = __( 'Imię', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_first_name']['placeholder'] = __( 'Imię', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_first_name']['priority']    = 10;
                $fields['billing']['billing_first_name']['class']       = [ 'form-row-wide' ];
            }

            if ( isset( $fields['billing']['billing_last_name'] ) ) {
                $fields['billing']['billing_last_name']['label']       = __( 'Nazwisko', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_last_name']['placeholder'] = __( 'Nazwisko', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_last_name']['priority']    = 20;
                $fields['billing']['billing_last_name']['class']       = [ 'form-row-wide' ];
            }

            if ( isset( $fields['billing']['billing_phone'] ) ) {
                $fields['billing']['billing_phone']['label']       = __( 'Numer telefonu', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_phone']['placeholder'] = __( 'Numer telefonu', 'woo-catalog-offer-mode' );
                $fields['billing']['billing_phone']['priority']    = 30;
                $fields['billing']['billing_phone']['class']       = [ 'form-row-wide' ];
                $fields['billing']['billing_phone']['required']    = true;
            }
        }

        if ( isset( $fields['shipping'] ) ) {
            $fields['shipping'] = [];
        }

        if ( isset( $fields['account'] ) ) {
            $fields['account'] = [];
        }

        if ( isset( $fields['order']['order_comments'] ) ) {
            $fields['order']['order_comments']['priority']    = 50;
        }

        return $fields;
    }

    public function order_button_text( $text ) {
        return __( 'Wyślij zapytanie', 'woo-catalog-offer-mode' );
    }
}

new WC_Catalog_Offer_Mode();
