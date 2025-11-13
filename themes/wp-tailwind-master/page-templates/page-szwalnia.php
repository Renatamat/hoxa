<?php
/**
 * Template name: Szwalnia
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


    <div class="flex flex-wrap mt-16 items-center">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('o');?>">
        </div>
        <div class="w-full lg:w-6/12 lg:pl-16 mt-4 lg:mt-0">
            <h3 class="mt-0 mb-6 text-4xl font-bold whitespace-pre-line"><?php echo get_field('n');?></h3>
            <div class="leading-relaxed "><?php echo get_field('t');?></div>
            <a href="tel:<?php echo get_field('tel');?>"
                class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                <?php echo get_field('tel');?></a>
        </div>
    </div>

    <div class="flex flex-wrap lg:-mx-2 mt-12">
        <?php
        $i=0;
         foreach(get_field('boksy') as $item) {  $time = 1 + ($i) ?>
        <div class="w-full lg:w-3/12 lg:px-2 mb-3 wow fadeInLeft"  data-wow-duration=".7s" data-wow-delay="<?php echo $time;?>s">
            <div class="block shadow-md h-full px-8 pt-16 pb-16 text-center rounded-lg bg-white  ">

                <img class="h-16 mx-auto" style="max-width: 3.5rem;" src="<?php echo $item['ikona'];?>" />
                <div class="font-bold text-base text-black mt-5 ">
                    <?php echo $item['tekst'];?></div>
            </div>
        </div>
        <?php $i = $i + .3; } ?>

    </div>
 

    <div class="flex flex-wrap lg:-mx-2 mt-10">
        <?php foreach(get_field('galeria') as $item) { ?>
        <div class="w-full lg:w-4/12 lg:px-2 mb-5">
            <a data-fancybox="gallery" href="<?php echo $item['url'];?>" class="block shadow-md rounded-lg overflow-hidden transition-all duration-200 hover:shadow"><img
                    src="<?php echo $item['sizes']['gal'];?>" /></a>
        </div>
        <?php } ?>
    </div>




    <?php
get_footer();