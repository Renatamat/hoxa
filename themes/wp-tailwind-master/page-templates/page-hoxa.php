<?php
/**
 * Template name: Hoxa
 */

get_header(); 
headSVG();
?>
<div class="container mx-auto hidden lg:flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></span></h1>
    <div class="">
        <?php echo s_form();?>
    </div>
</div>

<div class="container mx-auto">


    <div class="flex flex-wrap mt-8 lg:mt-16 relative items-center">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('s1o');?>">
        </div>
        <div class="w-full lg:w-6/12 lg:pl-16 mt-4 lg:mt-0">
            <h3 class="mt-4 mb-6 text-2xl lg:text-4xl font-bold whitespace-pre-line"><?php echo get_field('s1n');?></h3>
            <div class="leading-relaxed lg:pr-10"><?php echo get_field('s1t');?></div>

        </div>
    </div>

    <svg class="absolute -mt-64 lg:-mt-2 pl-64 lg:pl-0" style="right:0; z-index: -1;" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" width="422" height="776" viewBox="0 0 422 776">
            <defs>
                <clipPath id="clip-path3">
                    <rect id="Rectangle_358" data-name="Rectangle 358" width="422" height="776"
                        transform="translate(1018 2099)" fill="#fff" stroke="#707070" stroke-width="1" />
                </clipPath>
            </defs>
            <g id="Mask_Group_1" data-name="Mask Group 1" transform="translate(-1018 -2099)"
                clip-path="url(#clip-path3)">
                <path id="Path_3260" data-name="Path 3260"
                    d="M-7852.547-1577.919s-567.232-635.637-1028.087-821.326-437.565-17.22-437.565-17.22,16.783-43.26,6.368-29.156c-16.461,20.563-26.672,135.8,126.329,374.907,205.608,321.387,489.225,535.652,489.225,535.652l-184.356-299.962s-163.095-321.389,389.971-64.279S-7852.547-1577.919-7852.547-1577.919Z"
                    transform="translate(10356.749 4597.013)" fill="#D9D9D9" />
            </g>
        </svg>
    <div class="flex flex-wrap mt-8 lg:mt-10 relative items-center flex-row-reverse">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('s2o');?>">
        </div>
        <div class="w-full lg:w-6/12  mt-4 lg:mt-0">
            <h3 class="mt-4 mb-6 text-2xl lg:text-4xl font-bold whitespace-pre-line"><?php echo get_field('s2n');?></h3>
            <div class="leading-relaxed lg:pr-10"><?php echo get_field('s2t');?></div>

        </div>
    </div>

    <h2 class="mt-16 text-2xl lg:text-4xl font-bold text-center "><?php echo get_field('s3n');?></h2>

    <div class="opinie_slider_out">
        <div class="opinie_slider mt-10">
            <?php
            foreach(get_field('opinie') as $item){ 
        ?>
            <div class="w-full lg:w-6/12 lg:px-2 mb-5 ">

                <div class="shadow-md h-full px-10 pt-8 pb-12  rounded-lg bg-white">

                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="88" viewBox="0 0 35 88">
                        <text id="_" data-name="&quot;" fill="#f37836" font-size="72"
                            font-family="Montserrat-BoldItalic, Montserrat" font-weight="700" font-style="italic">
                            <tspan x="0" y="70">&quot;</tspan>
                        </text>
                    </svg>


                    <div class="-mt-4 leading-relaxed"><?php echo $item['tekst'];?></div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>


    <svg class="absolute -mt-12 lg:mt-24 pr-64 -ml-48 lg:ml-0 lg:pr-0" style="left:0; z-index: -1;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="486" height="831" viewBox="0 0 486 831">
  <defs>
    <clipPath id="clip-path5">
      <rect id="Rectangle_358" data-name="Rectangle 358" width="486" height="831" transform="translate(0 1990)" fill="#fff" stroke="#707070" stroke-width="1"/>
    </clipPath>
  </defs>
  <g id="Mask_Group_1" data-name="Mask Group 1" transform="translate(0 -1990)" clip-path="url(#clip-path5)">
    <path id="Path_3255" data-name="Path 3255" d="M-9320.75-1577.919s567.232-635.637,1028.087-821.326,437.565-17.22,437.565-17.22-16.783-43.26-6.368-29.156c16.461,20.563,26.672,135.8-126.329,374.907-205.608,321.387-489.225,535.652-489.225,535.652l184.356-299.962s163.095-321.389-389.971-64.279S-9320.75-1577.919-9320.75-1577.919Z" transform="translate(8293.547 4503.562)" fill="#f37836"/>
  </g>
</svg>




    <div class="flex flex-wrap mt-8 lg:mt-16 relative items-center">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('s4o');?>">
        </div>
        <div class="w-full lg:w-6/12 lg:pl-16 mt-4 lg:mt-0">
            <h3 class="mt-4 mb-6 text-2xl lg:text-4xl font-bold whitespace-pre-line"><?php echo get_field('s4n');?></h3>
            <div class="leading-relaxed lg:pr-10"><?php echo get_field('s4t');?></div>

        </div>
    </div>
    <h2 class="mt-16 text-2xl lg:text-4xl font-bold text-center "><?php echo get_field('s5n');?></h2>

    <div class="flex flex-wrap lg:-mx-2 mt-12 ">

        <?php
        $i=0;
    foreach(get_field('punkty') as $item){  $time = 1 + ($i);
?>
        <div class="w-full lg:w-3/12 lg:px-2 mb-5 wow fadeInLeft"  data-wow-duration=".4s" data-wow-delay="<?php echo $time;?>s">

            <div class="shadow-md h-full px-6 pt-16 pb-12 text-center rounded-lg bg-white">

                <svg style="max-width: 5rem;" class="h-14 mx-auto" xmlns="http://www.w3.org/2000/svg" width="63"
                    height="48.919" viewBox="0 0 63 48.919">
                    <path id="check_9_" data-name="check (9)"
                        d="M24.124,48.382a3.215,3.215,0,0,1-4.548,0L1.414,30.217a4.823,4.823,0,0,1,0-6.822L3.688,21.12a4.823,4.823,0,0,1,6.823,0L21.85,32.46,52.489,1.82a4.823,4.823,0,0,1,6.823,0l2.274,2.275a4.823,4.823,0,0,1,0,6.822Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>

                <div class="mt-4"><?php echo $item['tekst'];?></div>
            </div>

        </div>
        <?php $i = $i + .3; } ?>

    </div>

    <div class="mt-10 lg:mt-10 shadow-md mb-20 rounded-lg text-center px-10  bg-center bg-cover bg-primary-100 py-16"
        style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png' ;?>) #F37836;">

        <svg class="mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" width="57.969" height="74.143"
            viewBox="0 0 57.969 74.143">
            <g id="iconfinder_N_F010_01_ConstructionArtboard_1_copy_9_6714782" transform="translate(-54.142 -49.494)">
                <path id="Path_3226" data-name="Path 3226"
                    d="M194.949,275.244a.983.983,0,1,0-1.573-1.177,5.387,5.387,0,0,1-3.957,1.989,5.461,5.461,0,0,1-3.957-1.989.983.983,0,1,0-1.573,1.177,6.9,6.9,0,0,0,11.061,0Z"
                    transform="translate(-106.293 -183.941)" fill="#fff" />
                <path id="Path_3227" data-name="Path 3227"
                    d="M111.215,111.458a8.887,8.887,0,0,0-5.534-7.713L90.73,98.169a16.264,16.264,0,0,0,8.642-14.35v-6.1a13.537,13.537,0,0,0,4.352-1.927,2.373,2.373,0,0,0,.583-3.206,6.581,6.581,0,0,0-3.1-2.6C101,67.036,99.548,55.978,89.32,52.525l.144-1.544a.979.979,0,0,0-.773-1.051c-4.484-.953-10.8-.05-11.068-.013a.981.981,0,0,0-.834,1.064l.144,1.544C66.707,55.976,65.249,67.036,65.043,69.992a6.572,6.572,0,0,0-3.1,2.6,2.375,2.375,0,0,0,.583,3.186,13.542,13.542,0,0,0,4.35,1.927v6.1a16.266,16.266,0,0,0,8.644,14.35l-14.948,5.593a8.889,8.889,0,0,0-5.532,7.713l-.9,11.075a.983.983,0,0,0,.9,1.058h.081a.983.983,0,0,0,.978-.9l.9-11.075a6.919,6.919,0,0,1,4.258-6.034l2.673-1v18.024a.987.987,0,1,0,1.973,0V103.854l4.07-1.518,1.568,11.8a.985.985,0,0,0,.974.854H93.747a.985.985,0,0,0,.974-.854l1.568-11.8,4.07,1.518v18.758a.983.983,0,1,0,1.964,0V104.588l2.671,1a6.923,6.923,0,0,1,4.262,6.034l.9,11.075a.983.983,0,0,0,.979.9h.079a.981.981,0,0,0,.9-1.058ZM63.591,73.646a4.471,4.471,0,0,1,2.631-1.984.981.981,0,0,0,.75-.953c0-.522.147-12.47,10.146-16.184l1.256,13.513a.982.982,0,1,0,1.955-.179l-1.5-16.123a36.954,36.954,0,0,1,8.594-.052l-1.5,16.176a.981.981,0,0,0,.886,1.076H86.9a.981.981,0,0,0,.976-.9l1.256-13.513c10,3.713,10.146,15.662,10.147,16.184a.981.981,0,0,0,.75.952,4.5,4.5,0,0,1,2.633,1.984.416.416,0,0,1-.1.552c-1.3.954-5.767,3.157-19.432,3.229-13.663-.065-18.137-2.267-19.432-3.229A.414.414,0,0,1,63.591,73.646Zm5.25,10.165V78.185A70.616,70.616,0,0,0,82.4,79.379a.8.8,0,0,0,.113,0h1.234a.8.8,0,0,0,.113,0,70.6,70.6,0,0,0,13.552-1.195v5.627a14.283,14.283,0,1,1-28.567,0Zm24.037,29.215H73.364l-1.512-11.4,6.033-2.249a.994.994,0,0,0,.221-.117,16.254,16.254,0,0,0,10.045,0,1.047,1.047,0,0,0,.222.117l6.033,2.249Z"
                    transform="translate(0 0)" fill="#fff" />
                <path id="Path_3229" data-name="Path 3229"
                    d="M175.93,223.955a.983.983,0,0,0-1.964,0v2.832a.983.983,0,1,0,1.964,0Z"
                    transform="translate(-98.329 -142.394)" fill="#fff" />
                <path id="Path_3230" data-name="Path 3230"
                    d="M247.462,227.562a.981.981,0,0,0,.981-.983v-2.832a.987.987,0,0,0-1.973,0v2.832a.983.983,0,0,0,.992.983Z"
                    transform="translate(-157.828 -142.186)" fill="#fff" />
            </g>
        </svg>
        <h3 class="mt-8 mb-5 text:lg md:text-4xl text-white font-bold"><?php echo get_field('bn');?></h3>
        <div class="lg:px-32" style="color:#FFD9C5"><?php echo get_field('bt');?></div>
        <a href="tel:<?php echo get_field('btt');?>"
            class="transition-all duration-200 p-4 px-12 mt-10 font-semibold inline-block rounded-full bg-white font-semibold text-sm text-primary-100 hover:bg-gray-900 hover:text-white">
            <?php echo get_field('btt');?></a>

    </div>
    <div class="flex flex-wrap mt-8 lg:mt-10 relative items-center flex-row-reverse">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('s6o');?>">
        </div>
        <div class="w-full lg:w-6/12  mt-4 lg:mt-0">
            <h3 class="mt-4 mb-6 text-2xl lg:text-4xl font-bold whitespace-pre-line"><?php echo get_field('s6n');?></h3>
            <div class="leading-relaxed lg:pr-10"><?php echo get_field('s6t');?></div>

        </div>
    </div>

    <div class="flex flex-wrap lg:-mx-1 mt-16">
    <?php foreach(get_field('galeria') as $item) { ?>
    <div class="w-full lg:w-1/5 lg:px-1 mb-5">
        <a data-fancybox="gallery" href="<?php echo $item['url'];?>" class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                src="<?php echo $item['sizes']['gal'];?>" /></a>
    </div>
    <?php } ?>
</div>

</div>





<?php
get_footer();