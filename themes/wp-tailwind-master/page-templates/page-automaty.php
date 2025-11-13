<?php
/**
 * Template name: automaty
 */

get_header(); 
?>
<div class="opacity-25 lg:opacity-100 " style="z-index:-1">
    <?php headSVG();?>
</div>
<div class="container mx-auto flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></span></h1>
    <div class="hidden lg:block ">
        <?php echo s_form();?>
    </div>
</div>

<div class="container mx-auto ">

    <h2 class="text-2xl lg:text-4xl font-bold text-center relative"><?php echo get_field('automaty');?></h2>


    <div class="flex flex-wrap mt-8 lg:mt-16 relative">
        <div class="w-full lg:w-6/12">
            <img class="rounded-xl w-full" src="<?php echo get_field('obraz');?>">
        </div>
        <div class="w-full lg:w-6/12 lg:pl-16 mt-4 lg:mt-0">
            <h3 class="mt-4 mb-6 text-2xl lg:text-4xl font-bold whitespace-pre-line"><?php echo get_field('naglowek');?></h3>
            <div class="leading-relaxed "><?php echo get_field('tekst');?></div>

        </div>
    </div>


    <h2 class="text-2xl lg:text-4xl font-bold text-center "><?php echo get_field('zalety');?></h2>

    <div class="flex flex-wrap lg:-mx-2 mt-12 justify-center">

        <?php
            foreach(get_field('zalety_boksy') as $item){ 
        ?>
        <div class="w-full lg:w-3/12 lg:px-2 mb-5 ">

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
        <?php } ?>

    </div>



    <div class="mt-10 lg:mt-10 shadow-md mb-16 rounded-lg text-center px-10  bg-center bg-cover bg-primary-100 py-16"
        style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png' ;?>) #F37836;">


        <svg class="mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" width="44.667" height="67" viewBox="0 0 44.667 67">
            <g id="Layer_1_1_" transform="translate(-9 -1)">
                <path id="Path_3247" data-name="Path 3247"
                    d="M53.667,1H9V68H53.667ZM50.875,3.792V26.125H33.307l-5.583-5.583H11.792V3.792ZM11.792,65.208V23.333H26.568l5.583,5.583H50.875V65.208Z"
                    transform="translate(0 0)" fill="#fff" />
                <path id="Path_3248" data-name="Path 3248"
                    d="M44.708,6H14v8.375H44.708Zm-2.792,5.583H16.792V8.792H41.917Z" transform="translate(1.979 1.979)"
                    fill="#fff" />
                <path id="Path_3249" data-name="Path 3249"
                    d="M32.658,30.944l-1.4,2.415a6.979,6.979,0,1,1-6.976,0l-1.4-2.415a9.769,9.769,0,1,0,9.776,0Z"
                    transform="translate(3.562 11.853)" fill="#fff" />
                <rect id="Rectangle_257" data-name="Rectangle 257" width="3" height="12" transform="translate(30 40)"
                    fill="#fff" />
                <rect id="Rectangle_258" data-name="Rectangle 258" width="3" height="3" transform="translate(44 19)"
                    fill="#fff" />
            </g>
        </svg>


        <h3 class="mt-8 mb-5 text:lg md:text-4xl text-white font-bold"><?php echo get_field('bn');?></h3>
        <div class="lg:px-32" style="color:#FFD9C5"><?php echo get_field('bt');?></div>
        <a href="tel:<?php echo get_field('tel');?>"
            class="transition-all duration-200 p-4 px-12 mt-10 font-semibold inline-block rounded-full bg-white font-semibold text-sm text-primary-100 hover:bg-gray-900 hover:text-white">
            <?php echo get_field('tel');?></a>

    </div>


    <h2 class="text-3xl lg:text-4xl font-bold text-center "><?php echo get_field('rodzaje');?></h2>

    <div class="mt-12">

        <svg class="absolute -mt-48 lg:-mt-20 pl-40 lg:pl-0" style="right:0; z-index: -1;" xmlns="http://www.w3.org/2000/svg"
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
                    transform="translate(10356.749 4597.013)" fill="#f37836" />
            </g>
        </svg>



        <?php
        $i = 0;
// WP_Query arguments
$args = array(
'post_type'              => array( 'automaty' ),
'posts_per_page' => 99,
);
// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
while ( $query->have_posts() ) {
$query->the_post(); ?>

        <?php if($i==3){ ?>

        <svg class="absolute -mt-32 lg:-mt-16" style="left:0; z-index: -1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" width="300" height="687" viewBox="0 0 300 687">
            <defs>
                <clipPath id="clip-path4">
                    <rect id="Rectangle_359" data-name="Rectangle 359" width="300" height="687"
                        transform="translate(0 3730)" fill="#fff" stroke="#707070" stroke-width="1" />
                </clipPath>
            </defs>
            <g id="Mask_Group_2" data-name="Mask Group 2" transform="translate(0 -3730)" clip-path="url(#clip-path4)">
                <path id="Path_3261" data-name="Path 3261"
                    d="M-9320.75-1577.919s567.232-635.637,1028.087-821.326,437.565-17.22,437.565-17.22-16.783-43.26-6.368-29.156c16.461,20.563,26.672,135.8-126.329,374.907-205.608,321.387-489.225,535.652-489.225,535.652l184.356-299.962s163.095-321.389-389.971-64.279S-9320.75-1577.919-9320.75-1577.919Z"
                    transform="translate(8147.649 6246.463)" fill="#d9d9d9" />
            </g>
        </svg>


        <?php } ?>

        <div class="flex flex-wrap mt-6 mb-16 items-center <?php  if($i%2 == 0) echo 'flex-row-reverse';?> lg:-mx-6">
            <div class="w-full lg:w-6/12 lg:px-6">
                <div class="rounded-lg bg-center bg-cover h-80"
                    style="background-image: url('<?php echo get_field('obraz'); ?>' );"></div>

            </div>
            <div class="w-full lg:w-6/12  mt-4 lg:mt-0 lg:px-6 lg:pr-12">
                <a class="hover:text-primary-100" href="<?php echo get_permalink();?>"><h3 class="hover:text-primary-100 leading-normal mt-0 mb-6 text-2xl font-bold whitespace-pre-line">
                    <?php echo get_the_title();?></h3></a>
                <div class="leading-relaxed "><?php echo get_field('skrot');?></div>


                <div class="flex mt-10 items-end lg:-mx-8">
                    <?php foreach(get_field('punkty') as $item ){ ?>

                    <div class="text-center lg:px-8 wow fadeInUp"  data-wow-duration=".5s" data-wow-delay=".3s">
                        <img class="mx-auto" src="<?php echo $item['ikona'];?>" />
                        <div class="font-bold mt-4 text-black"><?php echo $item['tekst'];?></div>
                    </div>

                    <?php } ?>

                </div>

                <a href="<?php echo get_field('specyfikacja');?>"
                    class="transition-all duration-200 p-4 px-6 mt-10 inline-block rounded-full text-white font-semibold text-sm bg-primary-100 hover:bg-gray-900">
                    <?php pll_e('Pobierz specyfikację'); ?></a>
            </div>
        </div>

        <?php
        $i++;
} 
} else {
 echo '<h3>';
 pll_e('Nothing');
 echo '</h3>';
}

// Restore original Post Data
wp_reset_postdata();

?>

    </div>


    <video class="mt-16 w-full rounded-xl overflow-hidden" width="320" height="240" controls>
  <source src="<?php echo get_field('wideo');?>" type="video/mp4">
Your browser does not support the video tag.
</video> 



</div>




<?php
get_footer();