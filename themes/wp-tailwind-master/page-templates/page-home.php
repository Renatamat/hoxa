<?php
/**
 * Nothing here, but where templates should go.
 *  template name: Home
 */
get_header(); ?>


<div class="container mx-auto hidden lg:flex flex-wrap lg:-mt-1 relative z-20 lg:px-0">

    <div class="w-full ml-auto lg:w-6/12 lg:pl-14">
        <?php get_template_part('template-parts/product-filters'); ?>
        <?php //echo s_form();?>

    </div>

</div>



<div class="mt-4 lg:-mt-10">

    <svg class="absolute pointer-events-none  right-2/4 mt-8 pr-24 lg:pr-0" style="right:50%"
        xmlns="http://www.w3.org/2000/svg" width="1468.202" height="951.426" viewBox="0 0 1468.202 951.426">
        <path id="Path_3174" data-name="Path 3174"
            d="M-9320.75-1577.919s567.232-635.637,1028.087-821.326,437.565-17.22,437.565-17.22-16.783-43.26-6.368-29.156c16.461,20.563,26.672,135.8-126.329,374.907-205.608,321.387-489.225,535.652-489.225,535.652l184.356-299.962s163.095-321.389-389.971-64.279S-9320.75-1577.919-9320.75-1577.919Z"
            transform="translate(9320.75 2486.487)" fill="#f37836" />
    </svg>

    <div class="container mx-auto">

        <div class="slider relative">

            <?php
				$slider = get_field('slider');
				foreach($slider as $item) {?>
            <div class="">
                <div class="flex flex-wrap">

                    <div class="w-full lg:w-6/12 relative xl:pr-10 xl2:pr-24">

                        <div class="bg-center bg-cover w-full rounded-full slidImage "
                            style="background-image: url(<?php echo $item['zdjecie'];?>)"></div>

                    </div>
                    <div class="w-full lg:w-6/12 lg:pl-16 lg:pr-6 lg:pt-12 xl2:pt-20 mb-32">

                        <h1 class="font-bold text-3xl lg:text-5xl mb-8"><?php echo $item['n'];?></h1>

                        <div class="leading-relaxed"><?php echo $item['t'];?></div>

                        <a href="<?php echo $item['l'];?>"
                            class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900"><?php echo $item['b'];?></a>

                    </div>
                </div>
            </div>

            <?php } ?>


        </div>

        <div class="-mt-24 xl2:-mt-28 relative z-20">
            <div class="w-full lg:w-6/12 lg:ml-auto text-center lg:text-left lg:pl-16 slidNav2">
                <?php
				$slider = get_field('slider');
				foreach($slider as $item) {?>
                <button></button>
                <?php } ?>
            </div>
        </div>

    </div>

</div>
<div class="overflow-hidden">
    <div class="container mx-auto relative mt-8 lg:mt-16 xl2:mt-32 pt-2 ">
        <h2 class="text-4xl font-bold text-center "><?php echo get_field('s1n');?></h2>


        <div class="flex flex-wrap lg:-mx-2 mt-12">

            <?php

		$taxonomies = get_terms( array(
			'taxonomy' => 'kategorie',
			'hide_empty' => false,
			'include' => '',
            'meta_query' => array(
                array(
                   'key'       => 'strona_glowna',
                   'value'     => true,
                   'compare'   => '='
                )
           )
		) );

		foreach($taxonomies as $tax){ 
$thumbnail = get_field('ikona', $tax->taxonomy . '_' . $tax->term_id);	
$bg = get_field('tlo', $tax->taxonomy . '_' . $tax->term_id);	

?>
            <div class="w-full lg:w-4/12 lg:px-2 mb-5 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">

                <a href="<?php echo pll_url(16);?>?cat=<?php echo $tax->slug;?>"
                    class="block shadow-md h-full text-gray-600 px-6 pt-16 pb-12 text-center rounded-lg bg-white relative transition-all duration-300 overflow-hidden hover:bg-primary-100 group">
                    <div class="bg-center bg-cover  py-16 pb-12 inset-0 absolute opacity-0 group-hover:opacity-6 transition-all duration-300"
                        style="background-image:url(<?php echo $bg;?>) "></div>
                    <img class="h-14 mx-auto relative group-hover:hidden transition-all duration-400"
                        src="<?php echo $thumbnail;?>" style="max-width: 5rem;" />
                    <svg class="h-14 hidden mx-auto group-hover:block transition-all duration-300 opacity-0 group-hover:opacity-100"
                        xmlns="http://www.w3.org/2000/svg" width="50" height="51.036" viewBox="0 0 50 51.036">
                        <g id="iconfinder_corner-up-right_2561266_2_" data-name="iconfinder_corner-up-right_2561266 (2)"
                            transform="translate(-1.5 -0.464)">
                            <path id="Path_3250" data-name="Path 3250" d="M15,32.125,29.063,18.063,15,4"
                                transform="translate(19.938)" fill="none" stroke="#fff" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="5" />
                            <path id="Path_3251" data-name="Path 3251" d="M4,39.938V20.25A11.25,11.25,0,0,1,15.25,9H49"
                                transform="translate(0 9.063)" fill="none" stroke="#fff" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="5" />
                        </g>
                    </svg>

                    <div class="font-bold text-lg text-black mt-6 relative">
                        <span
                            class="hidden group-hover:block text-white"><?php pll_e('Zobacz  wszystkie produkty'); ?></span>
                        <span
                            class="group-hover:hidden"><?php echo ( get_field('nazwa', $tax->taxonomy . '_' . $tax->term_id) ? get_field('nazwa', $tax->taxonomy . '_' . $tax->term_id) : $tax->name );?></span>
                    </div>
                    <div class="mt-4 relative group-hover:text-primary-300 transition-all duration-300">
                        <?php echo $tax->description;?></div>
        </a>

            </div>
            <?php } ?>


        </div>


        <div class="flex flex-wrap mt-12 items-center">
            <div class="w-full lg:w-6/12">
                <img class="rounded-xl w-full" src="<?php echo get_field('so');?>">
            </div>
            <div class="w-full lg:w-6/12 lg:pl-12 mt-4 lg:mt-0">
                <h3 class="mt-0 mb-6 text-4xl font-bold"><?php echo get_field('sn');?></h3>
                <div class="leading-relaxed whitespace-pre-line"><?php echo get_field('st');?></div>
                <a href="<?php echo get_field('sl');?>"
                    class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                    <?php echo get_field('sb');?></a>
            </div>
        </div>
        <svg class="absolute pointer-events-none  right-2/4 mt-4  pr-24 lg:pr-0" style="left:53%"
            xmlns="http://www.w3.org/2000/svg" width="1379.555" height="893.981" viewBox="0 0 1379.555 893.981">
            <path id="Path_3175" data-name="Path 3175"
                d="M-7941.2-1632.776s-532.984-597.259-966.014-771.737-411.146-16.18-411.146-16.18,15.771-40.648,5.984-27.4c-15.467,19.321-25.062,127.6,118.7,352.271,193.194,301.983,459.687,503.311,459.687,503.311l-173.226-281.851s-153.247-301.984,366.425-60.4S-7941.2-1632.776-7941.2-1632.776Z"
                transform="translate(9320.75 2486.488)" fill="#f6f6f6" />
        </svg>
        <div class="flex flex-wrap mt-16 items-center relative">

            <div class="w-full lg:w-6/12 lg:pr-20 mt-4 lg:mt-0  ">
                <h3 class="mt-0 mb-6 text-4xl font-bold"><?php echo get_field('pn');?></h3>
                <div class="leading-relaxed whitespace-pre-line"><?php echo get_field('pt');?></div>
                <?php foreach(get_field('p_pkt') as $item){
                echo '<div class="flex flex-wrap mt-4"><svg class="mr-4" id="checked_1_" data-name="checked (1)" xmlns="http://www.w3.org/2000/svg" width="21.497" height="21.497" viewBox="0 0 21.497 21.497">
                <path id="Path_3170" data-name="Path 3170" d="M66.631,72.162l-7.145,7.145-2.176-2.176a.768.768,0,0,0-1.086,1.086l2.719,2.719a.768.768,0,0,0,1.086,0l7.688-7.688a.768.768,0,1,0-1.086-1.086Z" transform="translate(-51.222 -65.8)" fill="#f37836"/>
                <path id="Path_3171" data-name="Path 3171" d="M10.748,0A10.748,10.748,0,1,0,21.5,10.748,10.76,10.76,0,0,0,10.748,0Zm0,19.961a9.213,9.213,0,1,1,9.213-9.213A9.223,9.223,0,0,1,10.748,19.961Z" fill="#f37836"/>
              </svg>'.$item['p'].'</div>';
            }?>
                <a href="<?php echo get_field('pl');?>"
                    class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                    <?php echo get_field('pb');?></a>
            </div>
            <div class="w-full lg:w-6/12 mt-4 lg:mt-0">
                <img class="rounded-xl w-full" src="<?php echo get_field('po');?>">
            </div>
        </div>

        <div class="flex flex-wrap mt-10 lg:mt-24 items-center relative">
            <div class="w-full lg:w-6/12 mb-4 lg:mb-0">
                <img class="rounded-xl w-full" src="<?php echo get_field('ao');?>">
            </div>
            <div class="w-full lg:w-6/12 lg:pl-12 lg:pr-10 mt-4 lg:mt-0">
                <h3 class="mt-0 mb-6 text-4xl font-bold"><?php echo get_field('an');?></h3>
                <div class="leading-relaxed whitespace-pre-line pb-5"><?php echo get_field('at');?></div>
                <?php foreach(get_field('a_pkt') as $item){
                echo '<div class="flex  mt-4 shadow-md h-full px-5 lg:px-10 lg:pr-16 py-5 rounded-lg bg-white items-center"><svg class="mr-8 flex-shrink-0" id="checked_1_" data-name="checked (1)" xmlns="http://www.w3.org/2000/svg" width="49.481" height="49.481" viewBox="0 0 49.481 49.481">
                <path id="Path_3170" data-name="Path 3170" d="M80.472,72.454,64.024,88.9l-5.009-5.009a1.767,1.767,0,0,0-2.5,2.5l6.258,6.258a1.767,1.767,0,0,0,2.5,0l17.7-17.7a1.767,1.767,0,1,0-2.5-2.5Z" transform="translate(-45.003 -57.812)" fill="#f37836"/>
                <path id="Path_3171" data-name="Path 3171" d="M24.74,0a24.74,24.74,0,1,0,24.74,24.74A24.768,24.768,0,0,0,24.74,0Zm0,45.947A21.206,21.206,0,1,1,45.947,24.74,21.23,21.23,0,0,1,24.74,45.947Z" fill="#f37836"/>
              </svg><div class="">
              '.$item['p'].'</div></div>';
            }?>
                <a href="<?php echo get_field('al');?>"
                    class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                    <?php echo get_field('ab');?></a>
            </div>
        </div>

        <?php echo home_banner();?>

    </div>


    <div class="">
        <svg class="absolute pointer-events-none  right-2/4 -mt-6 pr-24 lg:pr-0" style="right:68%"
            xmlns="http://www.w3.org/2000/svg" width="1468.202" height="951.426" viewBox="0 0 1468.202 951.426">
            <path id="Path_3174" data-name="Path 3174"
                d="M-9320.75-1577.919s567.232-635.637,1028.087-821.326,437.565-17.22,437.565-17.22-16.783-43.26-6.368-29.156c16.461,20.563,26.672,135.8-126.329,374.907-205.608,321.387-489.225,535.652-489.225,535.652l184.356-299.962s163.095-321.389-389.971-64.279S-9320.75-1577.919-9320.75-1577.919Z"
                transform="translate(9320.75 2486.487)" fill="#f37836" />
        </svg>

        <div class="container mx-auto ">

            <h2 class="text-4xl font-bold text-center "><?php echo get_field('on');?></h2>


            <div class="flex flex-wrap lg:-mx-3 mt-12 slider_prod navc">

                <?php
// WP_Query arguments
$args = array(
	'post_type'              => array( 'produkt' ),
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>

                <div class="w-full lg:w-3/12 lg:px-3 mb-5">

                    <a href="<?php echo get_permalink();?>"
                        class="block text-gray-600 shadow-md h-full px-6 pt-16 pb-10 text-center rounded-lg bg-white transition-all duration-200 hover:shadow">

                        <img class="h-32 mx-auto" src="<?php echo get_field('warianty')[0]['zdjecia'][0];?>" />

                        <div class="font-bold text-lg text-black mt-12"><?php echo get_the_title();?></div>
                        <div class="mt-2"><?php echo get_field('skrot');?></div>
                    </a>

                </div>

                <?php
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();

?>

            </div>


            <div class="flex flex-wrap relative z-20 mt-10 lg:mt-20">

                <div class="w-full lg:w-1/4 lg:pr-10">

                    <h2 class="text-2xl md:text-4xl font-bold mt-4 xl2:mt-16 "><?php echo get_field('on2');?></h2>
                    <?php echo get_field('ot');?>

                </div>

                <div class="w-full lg:w-3/4 lg:pl-10 mt-2 lg:mt-0">
                    <div class="flex flex-wrap lg:-mx-3 mt-3">

                        <?php
                        $i=0;
                         foreach(get_field('obox') as $item) { $time = 1 + ($i) ?>
                        <div class="w-full lg:w-4/12 lg:px-3 mb-5 wow fadeInLeft"  data-wow-duration=".7s" data-wow-delay="<?php echo $time;?>s">

                            <div class="shadow-md h-full px-8 pt-10 pb-12  rounded-lg bg-white relative">
                                <img class="absolute" style=" right:0" src="<?php echo $item['tlo'];?>" />
                                <img class="relative" src="<?php echo $item['ikona'];?>" />
                                <div class="relative whitespace-pre-line font-bold text-lg text-black mt-0">
                                    <?php echo $item['nazwa'];?></div>
                                <div class="relative mt-3 lg:pr-8"><?php echo $item['tekst'];?></div>
                            </div>

                        </div>
                        <?php $i = $i + .5; } ?>

                    </div>
                </div>

            </div>


            <div class="mt-16 lg:mt-16 shadow-md mb-16 rounded-lg text-center px-10  bg-center bg-cover  py-16 pb-12"
                style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/engineers.png' ;?>) #FFF;">

                <svg class="mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" width="73.093" height="73.094"
                    viewBox="0 0 73.093 73.094">
                    <g id="iconfinder_connect_phone_pc_computer_sync_4014663" transform="translate(0.1 0.1)">
                        <path id="Path_3176" data-name="Path 3176"
                            d="M14.212,19.158a.638.638,0,0,0,.308-.091.569.569,0,0,0,.171-.786,6.253,6.253,0,0,1,8.633-8.645.569.569,0,0,0,.786-.171.581.581,0,0,0-.171-.8A7.4,7.4,0,0,0,13.688,18.919.615.615,0,0,0,14.212,19.158Z"
                            transform="translate(1.734 1.036)" fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                        <path id="Path_3177" data-name="Path 3177"
                            d="M19.33,20.59a5.968,5.968,0,0,1-1.948-.319.592.592,0,0,0-.729.364.569.569,0,0,0,.364.718,7.278,7.278,0,0,0,2.278.376,7.415,7.415,0,0,0,7.438-7.4,7.278,7.278,0,0,0-.376-2.278.569.569,0,0,0-.718-.364.592.592,0,0,0-.364.729,5.968,5.968,0,0,1,.319,1.913A6.276,6.276,0,0,1,19.33,20.59Z"
                            transform="translate(2.31 1.62)" fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                        <path id="Path_3178" data-name="Path 3178"
                            d="M19.347,17.195A2.847,2.847,0,1,0,16.5,14.347,2.847,2.847,0,0,0,19.347,17.195Zm0-4.556a1.708,1.708,0,1,1-1.708,1.708,1.708,1.708,0,0,1,1.708-1.708Z"
                            transform="translate(2.293 1.598)" fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                        <path id="Path_3179" data-name="Path 3179"
                            d="M57.185,26.58a.558.558,0,0,0-.774.205L52.344,33.96l-1.765-2.654a.575.575,0,1,0-.957.638L51.9,35.361a.581.581,0,0,0,.478.251h0a.558.558,0,0,0,.467-.285L57.4,27.354a.558.558,0,0,0-.216-.775Z"
                            transform="translate(6.883 3.683)" fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                        <path id="Path_3180" data-name="Path 3180"
                            d="M69.477,43.281H68.133a3.417,3.417,0,0,0,.205-1.139V19.363a3.417,3.417,0,0,0-3.417-3.417H55.81a3.417,3.417,0,0,0-3.417,3.417V20.5a1.139,1.139,0,0,0-1.139,1.139v2.278a1.139,1.139,0,0,0,1.139,1.139V42.142a3.417,3.417,0,0,0,.205,1.139H35.878V36.447h.569a1.139,1.139,0,0,0,1.139-1.139h2.278a3.417,3.417,0,0,0,3.417-3.417V3.417A3.417,3.417,0,0,0,39.864,0H3.417A3.417,3.417,0,0,0,0,3.417V31.891a3.417,3.417,0,0,0,3.417,3.417H15.946a34.055,34.055,0,0,1-1.868,7.973H3.417A3.417,3.417,0,0,0,2.278,49.91V69.477a3.417,3.417,0,0,0,6.834,0V59.227H28.474a3.417,3.417,0,0,0,3.417-3.417V50.115h2.847v9.112a13.1,13.1,0,1,0,26.2,0V50.115h2.847V69.477a3.417,3.417,0,0,0,6.834,0V49.91a3.417,3.417,0,0,0-1.139-6.629ZM54.671,19.363a1.139,1.139,0,0,1,1.139-1.139h9.112a1.139,1.139,0,0,1,1.139,1.139V19.7h-.569a2.187,2.187,0,0,0-1.7.866c-.319.342-.49.5-.866.5H57.8c-.376,0-.547-.159-.866-.5a2.187,2.187,0,0,0-1.7-.866h-.569Zm0,22.779v-21.3h.569c.376,0,.547.159.866.5a2.187,2.187,0,0,0,1.7.866h5.125a2.187,2.187,0,0,0,1.7-.866c.319-.342.49-.5.866-.5h.569v21.3a1.139,1.139,0,0,1-1.139,1.139H55.81A1.139,1.139,0,0,1,54.671,42.142Zm1.139,3.417h2.278A1.139,1.139,0,0,0,59.227,46.7H59.8v1.139H35.878V45.559ZM34.739,43.281H29.26a34.055,34.055,0,0,1-1.868-7.973H33.03a1.139,1.139,0,0,0,1.139,1.139h.569ZM41,31.891a1.139,1.139,0,0,1-1.139,1.139H23.326a2.825,2.825,0,0,0,1.139-2.278,2.882,2.882,0,0,0-.547-1.708H41ZM21.641,29.044a1.708,1.708,0,1,1-1.708,1.708A1.708,1.708,0,0,1,21.641,29.044ZM3.417,2.278H39.864A1.139,1.139,0,0,1,41,3.417V27.9H2.278V3.417A1.139,1.139,0,0,1,3.417,2.278ZM2.278,31.891V29.044H19.363a2.882,2.882,0,0,0-.569,1.708,2.825,2.825,0,0,0,1.139,2.278H3.417A1.139,1.139,0,0,1,2.278,31.891Zm15.946,3.417h6.834A33.6,33.6,0,0,0,26.8,43.281H16.435a33.6,33.6,0,0,0,1.788-7.973ZM6.834,58.088v7.4H4.556V50.115H6.834ZM5.695,70.616a1.139,1.139,0,0,1-1.139-1.139V66.63H6.834v2.847A1.139,1.139,0,0,1,5.695,70.616ZM29.613,55.81a1.139,1.139,0,0,1-1.139,1.139H9.112V50.115h20.5Zm1.139-7.973H3.417a1.139,1.139,0,0,1,0-2.278H34.739v2.278ZM59.8,59.227a11.959,11.959,0,1,1-23.918,0V50.115H59.8Zm8.542,6.264H66.061V50.115h2.278ZM67.2,70.616a1.139,1.139,0,0,1-1.139-1.139V66.63h2.278v2.847A1.139,1.139,0,0,1,67.2,70.616Zm2.278-22.779H60.935V46.7H61.5a1.139,1.139,0,0,0,1.139-1.139h6.834a1.139,1.139,0,0,1,0,2.278Z"
                            fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                        <path id="Path_3181" data-name="Path 3181"
                            d="M17.208,48.917A1.708,1.708,0,1,0,15.5,47.208a1.708,1.708,0,0,0,1.708,1.708Zm0-2.278a.569.569,0,1,1-.569.569A.569.569,0,0,1,17.208,46.639Z"
                            transform="translate(2.154 6.323)" fill="#f27735" stroke="#eb7434" stroke-width="0.2" />
                    </g>
                </svg>
                <h3 class="mt-6 mb-5 text:lg md:text-4xl text-black font-bold whitespace-pre-line">
                    <?php echo get_field('b2n');?>
                </h3>
                <div class="lg:px-16 " style=""><?php echo get_field('b2t');?></div>
                <a href="tel:<?php echo get_field('b2tel');?>"
                    class="transition-all duration-200 p-4 px-6 mt-10 font-semibold inline-block rounded-full bg-primary-100 font-semibold text-sm text-white hover:bg-gray-900 hover:text-white">
                    <?php echo get_field('b2tel');?></a>

            </div>


            <div class="flex justify-between items-center">
                <h2 class="text-4xl font-bold mt-0 xl2:mt-6 "><?php echo get_field('aktn');?></h2>
                <div class="postslidernav flex flex-wrap lg:pr-6">

                    <button
                        class="outline-none flex justify-center items-center border border-gray-100 w-12 h-12 rounded-full hover:bg-primary-100 hover:text-white group hover:border-primary-100">
                        <svg class="group-hover:text-white stroke-current" xmlns="http://www.w3.org/2000/svg"
                            width="9.05" height="15.6" viewBox="0 0 9.05 15.6">
                            <g id="iconfinder_chevrons-right_2561362" transform="translate(16.031 61.265) rotate(180)">
                                <path id="Path_3195" data-name="Path 3195" d="M13,19.065l6.032-6.032L13,7"
                                    transform="translate(-4.252 40.432)" fill="none" stroke="#" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2.5" />
                            </g>
                        </svg>
                    </button>
                    <button style="transform: scaleX(-1)"
                        class="outline-none ml-2 flex justify-center items-center border border-gray-100 w-12 h-12 rounded-full hover:bg-primary-100 hover:text-white group hover:border-primary-100">
                        <svg class="group-hover:text-white stroke-current" xmlns="http://www.w3.org/2000/svg"
                            width="9.05" height="15.6" viewBox="0 0 9.05 15.6">
                            <g id="iconfinder_chevrons-right_2561362" transform="translate(16.031 61.265) rotate(180)">
                                <path id="Path_3195" data-name="Path 3195" d="M13,19.065l6.032-6.032L13,7"
                                    transform="translate(-4.252 40.432)" fill="none" stroke="#" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2.5" />
                            </g>
                        </svg>
                    </button>

                </div>
            </div>

            <div class="">
                <div class="flex flex-wrap lg:-mx-3  mt-8 postSlider">

                    <?php
                // WP_Query arguments
                $args = array(
                    'post_type'              => array( 'post' ),
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post(); 
                        postItem();

                    }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();

                ?>

                </div>
                <div class="text-center">
                    <a href="<?php echo pll_url(26);?>"
                        class="mx-auto transition-all duration-200 p-4 px-6 mt-6  font-semibold inline-block rounded-full bg-primary-100 font-semibold text-sm text-white hover:bg-gray-900 hover:text-white">
                        <?php echo get_field('zobacz');?></a>
                </div>
            </div>


            <div class="border-b border-gray-200 mt-12"></div>
        </div>

    </div>



</div>


<?php
get_footer();