<?php
/**
 * Template name: Kontakt
 */

get_header(); 
headSVG();
$pageID = get_option('page_on_front')

?>
<div class="container mx-auto flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></h1>
</div>

<div class="flex flex-wrap mt-2 lg:mt-24 px-4 lg:px-0">

    <div class="w-full lg:w-7/12 lg:pr-24  ">

        <div class=" px-10 lg:px-24  bg-center bg-cover bg-primary-100 py-8 pb-8 lg:pl-40 rounded-lg lg:rounded-r-lg lg:rounded-l-none"
            style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/engineer.png' ;?>) #F37836;">

            <h2 class="font-bold text-2xl lg:text-4xl mb-8 mt-2 pt-2 text-white mb-12">
                <?php echo get_field('skontaktuj');?></h2>
            <?php echo do_shortcode(get_field('formularz'));?>

        </div>

    </div>

    <div class="w-full lg:w-5/12 pt-10 pb-10 ">

        <h2 class="font-bold text-2xl lg:text-4xl mb-8 mt-2 pt-2 text-black mb-12"><?php echo get_field('dane');?></h2>


        <h3 class="mt-16 font-bold text-black text-lg mb-5"><?php echo get_field('stopd',$pageID );?></h3>
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
        <h3 class="mt-12 font-bold text-black text-lg mb-5"><?php echo get_field('stopinfo',$pageID );?></h3>

        <div class="flex flex-wrap">

            <div class="w-full lg:w-5/12">
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
				<a href="mailto:<?php echo get_field('p2_email',$pageID );?>"
                    class="block text-gray-600 hover:text-primary-100 mt-3"><?php echo get_field('p2_email',$pageID );?></a>
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

</div>


<div class="map mt-8 lg:mt-0">

<?php echo get_field('mapa');?>

</div>



<div class="container mx-auto">






</div>




<?php
get_footer();