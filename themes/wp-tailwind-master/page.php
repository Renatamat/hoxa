<?php
/**
 * Template name: Szwalnia
 */

get_header(); 
?>

<div class="opacity-25 lg:opacity-100">
    <?php headSVG();?>
</div>
<div class="container mx-auto  flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></span></h1>

</div>

<div class="container mx-auto lg:px-0">

    <div class="leading-relaxed mt-6 lg:mt-12 lg:px-32">

        <?php the_content();?>

    </div>

</div>


<?php
get_footer();