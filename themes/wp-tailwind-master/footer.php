<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_Tailwind;
$pageID = get_option('page_on_front')
?>
</main>
<footer class="footer pt-16 overflow-hidden relative">


		<svg class="absolute pointer-events-none  right-2/4 mt-4 -mt-3 pr-24 lg:pr-0" style="left:30%" xmlns="http://www.w3.org/2000/svg" width="987.522" height="639.936" viewBox="0 0 987.522 639.936">
  <path id="Path_3199" data-name="Path 3199" d="M-8333.228-1875.378s-381.525-427.534-691.5-552.43-294.31-11.582-294.31-11.582,11.288-29.1,4.283-19.61c-11.071,13.83-17.939,91.338,84.97,252.165,138.294,216.167,329.055,360.284,329.055,360.284l-124-201.757s-109.7-216.168,262.3-43.234S-8333.228-1875.378-8333.228-1875.378Z" transform="translate(9320.75 2486.487)" fill="#f6f6f6"/>
</svg>


	<div class="container mx-auto lg:px-16 flex flex-wrap relative z-20 ">


		<div class="w-full lg:w-4/12 lg:pr-16">
			<?php
			echo '<a class="logo "  href="/"><img style="" src="'.get_field_o('logo').'"/></a>'; ?>

			<div class="mt-8 leading-relaxed"><?php echo get_field('stopt',$pageID );?></div>

		</div>
		<div class="w-full lg:w-3/12 lg:pl-16 pt-6">

			<h3 class="mt-0 font-bold text-black text-lg mb-5"><?php echo get_field('stopd',$pageID );?></h3>
			<div class="flex ">
				<svg class="mt-1 flex-shrink-0 mr-3" xmlns="http://www.w3.org/2000/svg" width="18" height="25.34"
					viewBox="0 0 18 25.34">
					<g id="iconfinder_location_1814106_15_" data-name="iconfinder_location_1814106 (15)"
						transform="translate(-15.2 -8.4)">
						<g id="Icon-Location" transform="translate(15.2 8.4)">
							<path id="Fill-55"
								d="M-207.8-342.26l-.482-.589c-.321-.429-8.518-10.018-8.518-15.75a9.02,9.02,0,0,1,9-9,9.054,9.054,0,0,1,9,9c0,5.732-8.2,15.375-8.518,15.75l-.482.589Zm0-24.107a7.716,7.716,0,0,0-7.714,7.714c0,4.5,5.946,12.161,7.714,14.357,1.768-2.2,7.714-9.8,7.714-14.357a7.716,7.716,0,0,0-7.714-7.714Z"
								transform="translate(216.8 367.6)" fill="#f27737" />
							<path id="Fill-56"
								d="M-202.971-350.343a3.453,3.453,0,0,1-3.429-3.429,3.453,3.453,0,0,1,3.429-3.429,3.453,3.453,0,0,1,3.429,3.429,3.453,3.453,0,0,1-3.429,3.429Zm0-5.571a2.149,2.149,0,0,0-2.143,2.143,2.149,2.149,0,0,0,2.143,2.143,2.149,2.149,0,0,0,2.143-2.143,2.149,2.149,0,0,0-2.143-2.143Z"
								transform="translate(211.971 362.771)" fill="#f27737" />
						</g>
					</g>
				</svg>
				<div class="whitespace-pre-line"><?php echo get_field('stopa',$pageID );?></div>
			</div>

			<h3 class="mt-4 font-bold text-black text-base mb-3"><?php echo get_field('stoptyd',$pageID );?></h3>
			<div class="flex items-center">
				<svg class="flex-shrink-0 mr-3" xmlns="http://www.w3.org/2000/svg" width="20.522" height="20.522"
					viewBox="0 0 20.522 20.522">
					<g id="Layer_15" data-name="Layer 15" transform="translate(-1 -1)">
						<path id="Path_3223" data-name="Path 3223"
							d="M11.261,21.522A10.261,10.261,0,1,1,21.522,11.261,10.261,10.261,0,0,1,11.261,21.522Zm0-19.154a8.893,8.893,0,1,0,8.893,8.893,8.893,8.893,0,0,0-8.893-8.893Z"
							fill="#f27737" />
						<path id="Path_3224" data-name="Path 3224"
							d="M18.584,17.344,15.2,13.958a.684.684,0,0,1-.2-.486V8h1.368v5.192l3.188,3.181Z"
							transform="translate(-4.423 -2.212)" fill="#f27737" />
					</g>
				</svg>

				<div class="whitespace-pre-line"><?php echo get_field('stopg',$pageID );?></div>
			</div>


		</div>
		<div class="w-full lg:w-5/12 lg:pl-16 pt-6">
			<h3 class="mt-0 font-bold text-black text-lg mb-5"><?php echo get_field('stopinfo',$pageID );?></h3>

			<div class="flex flex-wrap">

				<div class="w-full lg:w-7/12">
					<a href="tel:<?php echo get_field('stoptel',$pageID );?>"
						class="block font-semibold text-lg text-black hover:text-primary-100"><span
							class="text-primary-100">+48
						</span><?php echo get_field('stoptel',$pageID );?></a>
					<a href="mailto:<?php echo get_field('stopemail',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('stopemail',$pageID );?></a>

					<h4 class="text-black font-semibold mt-3 text-base mb-0">
						<?php echo get_field('wlasciciel',$pageID );?>
					</h4>
					<a href="mailto:<?php echo get_field('w_email',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('w_email',$pageID );?></a>
					<h4 class="text-black font-semibold mt-3 text-base mb-0">
						<?php echo get_field('przedstawiciele',$pageID );?>
					</h4>
					<a href="mailto:<?php echo get_field('p_email',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('p_email',$pageID );?></a>
				</div>
				<div class="w-full lg:w-5/12 lg:pl-4 mt-4 lg:mt-0">
					<h4 class="text-black font-semibold mt-0 text-base mb-0">
						<?php echo get_field('poligrafia',$pageID );?>
					</h4>
					<a href="mailto:<?php echo get_field('po_email',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('po_email',$pageID );?></a>
					<h4 class="text-black font-semibold mt-4 text-base mb-0">
						<?php echo get_field('zakupy',$pageID );?>
					</h4>
					<a href="mailto:<?php echo get_field('z_email',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('z_email',$pageID );?></a>
					<h4 class="text-black font-semibold mt-3 text-base mb-0">
						<?php echo get_field('magazyn',$pageID );?>
					</h4>
					<a href="mailto:<?php echo get_field('m_email',$pageID );?>"
						class="block text-gray-600 hover:text-primary-100"><?php echo get_field('m_email',$pageID );?></a>

				</div>



			</div>
		</div>


		<div class="block md:flex justify-between text-sm w-full text-gray-300 mt-8 lg:mt-24 pb-20">

		<div class="">©Hoxa 2021 All rights reserved - <a class="text-gray-300 hover:text-primary-100" href="<?php echo pll_url(186);?>"><?php echo pll_title(186);?></a></div>
		
		</div>

		
	</div>
</footer>

<a href="tel:<?php echo get_field_o('telefon_do_przycisku_mobilnego' );?>" style="bottom:2rem; right:1rem" class="fixed md:hidden rounded-full bg-primary-100 w-24 h-24 flex items-center justify-center">

<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
</svg>


</a>
<?php wp_footer(); ?>

</body>

</html>