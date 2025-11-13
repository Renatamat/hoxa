<?php
/**
 * Template name: Poligrafia
 */

get_header(); 

?>

<div class="opacity-25 lg:opacity-100">
    <?php headSVG();?>
</div>
<div class="container mx-auto flex  relative z-20 lg:px-0 justify-between items-center">
    <div>
        <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></span></h1>
        <div class="lg:pl-32 leading-relaxed lg:pr-16"><?php echo get_field('wstep');?></div>
    </div>
    <div class="flex-shrink-0 hidden lg:block">
        <?php echo s_form();?>
    </div>
</div>

<div class="container mx-auto">

    <h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('haft');?></h2>

    <div class="flex flex-wrap pt-2 lg:-mx-12 lg:px-4 items-center">

        <div class="w-full lg:w-6/12 leading-relaxed lg:px-12">

            <?php echo get_field('tekst');?>

        </div>

        <div class="w-full lg:w-6/12 lg:px-12">
            <?php foreach(get_field('punkty') as $item) { ?>
            <div class="flex items-center mt-5 mb-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">
                <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                    viewBox="0 0 25.931 20.135">
                    <path id="check_9_" data-name="check (9)"
                        d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>
                <?php echo $item['tekst'];?>
            </div>
            <?php } ?>

        </div>

    </div>


    <div class="flex flex-wrap lg:-mx-1 mt-10">
        <?php foreach(get_field('galeria') as $item) { ?>
        <div class="w-full lg:w-1/5 lg:px-1 mb-5">
            <a data-fancybox="gallery" href="<?php echo $item['url'];?>"
                class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                    src="<?php echo $item['sizes']['gal'];?>" /></a>
        </div>
        <?php } ?>
    </div>






    <h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('sitodruk');?></h2>

    <div class="flex flex-wrap pt-2 lg:-mx-12 lg:px-4 lg:flex-row-reverse items-center">

        <div class="w-full lg:w-6/12 leading-relaxed lg:px-12">

            <?php echo get_field('tekst2');?>

        </div>

        <div class="w-full lg:w-6/12 lg:px-12">
            <?php foreach(get_field('punkty2') as $item) { ?>
            <div class="flex items-center mt-5 mb-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">
                <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                    viewBox="0 0 25.931 20.135">
                    <path id="check_9_" data-name="check (9)"
                        d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>
                <?php echo $item['tekst'];?>
            </div>
            <?php } ?>

        </div>

    </div>


    <div class="flex flex-wrap lg:-mx-1 mt-10">
        <?php foreach(get_field('galeria2') as $item) { ?>
        <div class="w-full lg:w-1/5 lg:px-1 mb-5">
            <a data-fancybox="gallery" href="<?php echo $item['url'];?>"
                class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                    src="<?php echo $item['sizes']['gal'];?>" /></a>
        </div>
        <?php } ?>
    </div>




    <h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('druk_uv');?></h2>

    <div class="flex flex-wrap pt-2 lg:-mx-12 lg:px-4  items-center">

        <div class="w-full lg:w-6/12 leading-relaxed lg:px-12">

            <?php echo get_field('tekst3');?>

        </div>

        <div class="w-full lg:w-6/12 lg:px-12">
            <?php foreach(get_field('punkty3') as $item) { ?>
            <div class="flex items-center mt-5 mb-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">
                <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                    viewBox="0 0 25.931 20.135">
                    <path id="check_9_" data-name="check (9)"
                        d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>
                <?php echo $item['tekst'];?>
            </div>
            <?php } ?>

        </div>

    </div>


    <div class="flex flex-wrap lg:-mx-1 mt-10">
        <?php foreach(get_field('galeria3') as $item) { ?>
        <div class="w-full lg:w-1/5 lg:px-1 mb-5">
            <a data-fancybox="gallery" href="<?php echo $item['url'];?>"
                class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                    src="<?php echo $item['sizes']['gal'];?>" /></a>
        </div>
        <?php } ?>
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
        <a href="<?php echo get_field('banner_link');?>"
            class="transition-all duration-200 p-4 px-12 mt-10 font-semibold inline-block rounded-full bg-white font-semibold text-sm text-primary-100 hover:bg-gray-900 hover:text-white">
            <?php echo get_field('bb');?></a>

    </div>




    <h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('druk_dtg');?></h2>

<div class="flex flex-wrap pt-2 lg:-mx-12 lg:px-4  items-center lg:flex-row-reverse">

    <div class="w-full lg:w-6/12 leading-relaxed lg:px-12">

        <?php echo get_field('tekst4');?>

    </div>

    <div class="w-full lg:w-6/12 lg:px-12">
        <?php foreach(get_field('punkty4') as $item) { ?>
        <div class="flex items-center mt-5 mb-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">
            <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                viewBox="0 0 25.931 20.135">
                <path id="check_9_" data-name="check (9)"
                    d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                    transform="translate(0 -0.406)" fill="#f37836" />
            </svg>
            <?php echo $item['tekst'];?>
        </div>
        <?php } ?>

    </div>

</div>


<div class="flex flex-wrap lg:-mx-1 mt-10">
    <?php foreach(get_field('galeria4') as $item) { ?>
    <div class="w-full lg:w-1/5 lg:px-1 mb-5">
        <a data-fancybox="gallery" href="<?php echo $item['url'];?>" class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                src="<?php echo $item['sizes']['gal'];?>" /></a>
    </div>
    <?php } ?>
</div>



<h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('folia_flexflock');?></h2>

<div class="flex flex-wrap pt-2 lg:-mx-12 lg:px-4  items-center ">

    <div class="w-full lg:w-6/12 leading-relaxed lg:px-12">

        <?php echo get_field('tekst5');?>

    </div>

    <div class="w-full lg:w-6/12 lg:px-12">
        <?php foreach(get_field('punkty5') as $item) { ?>
        <div class="flex items-center mt-5 mb-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".5s">
            <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                viewBox="0 0 25.931 20.135">
                <path id="check_9_" data-name="check (9)"
                    d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                    transform="translate(0 -0.406)" fill="#f37836" />
            </svg>
            <?php echo $item['tekst'];?>
        </div>
        <?php } ?>

    </div>

</div>


<div class="flex flex-wrap lg:-mx-1 mt-10">
    <?php foreach(get_field('galeria5') as $item) { ?>
    <div class="w-full lg:w-1/5 lg:px-1 mb-5">
        <a data-fancybox="gallery" href="<?php echo $item['url'];?>" class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                src="<?php echo $item['sizes']['gal'];?>" /></a>
    </div>
    <?php } ?>
</div>






</div>




<?php
get_footer();