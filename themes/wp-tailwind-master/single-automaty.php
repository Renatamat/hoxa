<?php
/**
 */

get_header(); 
?>
<div class="opacity-25 lg:opacity-100 " style="z-index:-1">
    <?php headSVG();?>
</div>

<div class="container mx-auto hidden lg:flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32">
        <?php pll_e('Szczegóły automatu'); ?></span></h1>
    <div class="">
        <?php echo s_form();?>
    </div>
</div>

<div class="container mx-auto">

    <h2 class="text-2xl lg:text-4xl mt-20 font-bold text-center relative lg:px-24"><?php echo get_the_title();?></h2>


    <div class="leading-relaxed mt-8 text-center"><?php echo get_the_content();?></div>


    <div class="flex flex-wrap lg:-mx-2 mt-12 justify-center">

        <?php
            foreach(get_field('punkty2') as $item){ 
        ?>
        <div class="w-full lg:w-4/12 lg:px-2 mb-5 ">

            <div class="shadow-md h-full px-10 pt-24 pb-16 text-center rounded-lg bg-white">

                <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="80.799" height="62.739"
                    viewBox="0 0 80.799 62.739">
                    <path id="check_9_" data-name="check (9)"
                        d="M30.939,61.937a4.123,4.123,0,0,1-5.833,0L1.813,38.64a6.185,6.185,0,0,1,0-8.75L4.73,26.973a6.186,6.186,0,0,1,8.751,0L28.023,41.516l39.3-39.3a6.186,6.186,0,0,1,8.751,0l2.917,2.917a6.185,6.185,0,0,1,0,8.75L59.428,33.446Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>
                <div class="mt-8 pt-1"><?php echo $item['tekst'];?></div>
            </div>

        </div>
        <?php } ?>

    </div>

    <img class="mx-auto rounded-xl mt-12 overflow-hidden" src="<?php echo get_field('obraz');?>"/>

    <div class="flex justify-between mt-6"><a href="<?php echo get_field('specyfikacja');?>"
                    class="mx-auto transition-all duration-200 p-4 px-8 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                    <?php pll_e('Pobierz specyfikację'); ?></a></div>
</div>




<?php
get_footer();