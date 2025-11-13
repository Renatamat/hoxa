<?php
/**
 * Simple product add to cart
 *
 * Custom front UI matching variable product style.
 *
 * @package WooCommerce\Templates
 * @version 10.2.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

// dostępność / stan magazynowy
echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form
		class="cart"
		action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
		method="post"
		enctype="multipart/form-data"
	>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		// --- ILOŚĆ ---
		// Ukrywamy pole ilości (produkt zawsze kupowany w 1 szt.)
		// 1) Nie pokazujemy quantity_input w ogóle w HTML
		// 2) Ale żeby WooCommerce wysłał poprawnie ilość = 1, dokładamy hidden input
		?>

		<input type="hidden" name="quantity" value="1" />

		<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>

		<?php
		// --- PRZYCISK DODAJ DO KOSZYKA ---
		?>
		<button
			type="submit"
			name="add-to-cart"
			value="<?php echo esc_attr( $product->get_id() ); ?>"
			class="addProduct inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full addProduct md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100"
		>
			<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
		</button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	<?php
	// --- BLOK CTA jak przy wariantach ---
	?>
	<div class="flex flex-col mb-6 -mt-4 md:flex-row lg:mt-0 lg:mb-0">
		<a href="<?php echo function_exists('pll_url') ? pll_url(28) : '#'; ?>"
			class="inline-block p-4 px-5 mt-10 text-xs font-semibold text-white transition-all duration-200 rounded-full md:px-3 bg-primary-100 hover:bg-gray-900 hover:text-white">
			<?php echo function_exists('pll_e') ? pll__('Zapytaj o produkt') : esc_html__('Zapytaj o produkt','yourtheme'); ?>
		</a>

		<a href="#"
			data-id="<?php echo esc_attr( get_the_ID() ); ?>"
			class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full addProduct md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100">
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

<?php endif; ?>
