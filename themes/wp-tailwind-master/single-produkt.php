<?php
/**
 * Template name: Szwalnia
 */

get_header(); 

?>

<div class="opacity-25 lg:opacity-100 " style="z-index: -1">
    <?php headSVG();?>
</div>
<div class="container relative z-20 flex items-center justify-between mx-auto lg:px-0">
    <h1 class="pt-2 mt-8 mb-8 text-2xl font-bold lg:text-4xl lg:pl-32 lg:pr-12"><?php echo get_the_title();?></span>
    </h1>
    <div class="flex-shrink-0 hidden lg:block">
        <?php echo s_form();?>
    </div>
</div>

<div class="container relative mx-auto">


    <div class="flex flex-col-reverse flex-wrap mt-2 lg:mt-20 lg:-mx-10 lg:flex-row">


        <div class="w-full lg:w-6/12 lg:px-10">

            <div class="mb-6 leading-relaxed"><?php the_content();?></div>

            <?php
            $terms = get_the_terms( get_the_ID(), 'producent' );
            $term = array_pop($terms);  
            ?>
            <?php if($term->name) {?>
            <div class="pb-2 border-b border-gray-500"><span
                    class="mr-2 font-bold text-black"><?php pll_e('Producent'); ?>:</span> <?php echo $term->name;?>
            </div>
            <?php } ?>
            <?php
            $terms = get_the_terms( get_the_ID(), 'rozmiar' );
            //$term = array_pop($terms);  
 
            ?>
            <?php if($terms) {?>
            <div class="pb-2 mt-4 border-b border-gray-500"><span
                    class="mr-2 font-bold text-black"><?php pll_e('Rozmiar'); ?>:</span> <?php 
                    $termsa = array();
                    foreach($terms as $term)
                    $termsa[] = $term->name;

                    echo implode(', ', $termsa);?></div>
            <?php } ?>
            <?php if(get_field('kolor')) {?>
            <div class="pb-2 mt-4 border-b border-gray-500"><span
                    class="mr-2 font-bold text-black"><?php pll_e('Kolor'); ?>:</span> <?php echo get_field('kolor');?>
            </div>
            <?php } ?>
            <?php if(get_field('gramatura')) {?>
            <div class="pb-2 mt-4 border-b border-gray-500"><span
                    class="mr-2 font-bold text-black"><?php pll_e('Gramatura'); ?>:</span>
                <?php echo get_field('gramatura');?></div>
            <?php } ?>
            <?php if(get_field('sklad')) {?>
            <div class="pb-2 mt-4 "><span class="mr-2 font-bold text-black"><?php pll_e('Skład'); ?>:</span>
                <?php echo get_field('sklad');?></div>
            <?php } ?>

            <?php foreach(get_field('punkty') as $item) { ?>
            <div class="flex items-center mt-8 mb-4">
                <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="25.931" height="20.135"
                    viewBox="0 0 25.931 20.135">
                    <path id="check_9_" data-name="check (9)"
                        d="M9.929,20.153a1.323,1.323,0,0,1-1.872,0L.582,12.676a1.985,1.985,0,0,1,0-2.808l.936-.936a1.985,1.985,0,0,1,2.808,0L8.993,13.6,21.6.988a1.985,1.985,0,0,1,2.808,0l.936.936a1.985,1.985,0,0,1,0,2.808Zm0,0"
                        transform="translate(0 -0.406)" fill="#f37836" />
                </svg>
                <?php echo $item['tekst'];?>
            </div>
            <?php } ?>
            
            <?php
          
            $variants = get_field('warianty');
            if($variants){ ?>
            <div class="block mt-8 font-bold text-black"><?php pll_e('Wybierz wariant'); ?>:</div>
            <form action="<?php echo get_permalink();?>" method="get">
            <select class="px-4 py-4 mt-4 mb-0 rounded-full shadow-2xl variants" name="variant" onchange="javascript:this.form.submit()">
                <?php
                $var = 0;
                foreach($variants as $variant){
                    $sel = '';
                    if($_GET['variant'] == $var)
                        $sel = 'selected="selected"';
                    echo '<option '.$sel.'  value="'.$var++.'"  >'.pll__('Kolor').': '.$variant['kolor'].' /  '.pll__('Rozmiar').': '.$variant['rozmiar']. '</option>';
                }?>
            </select>
            </form>
            <?php } ?>

            <div class="flex flex-col mb-6 -mt-4 md:flex-row lg:mt-0 lg:mb-0">
                <a href="<?php echo pll_url(28);?>"
                    class="inline-block p-4 px-5 mt-10 text-xs font-semibold text-white transition-all duration-200 rounded-full md:px-3 bg-primary-100 hover:bg-gray-900 hover:text-white"><?php pll_e('Zapytaj o produkt'); ?></a>
                <a href="#" data-id="<?php echo get_the_ID();?>"
                    class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full addProduct md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100"><?php pll_e('Dodaj do oferty'); ?></a>
                <?php if(get_field('karta_produktu')){?><a href="<?php echo get_field('deklaracje');?>"
                    class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100"><?php pll_e('Karta produktu'); ?></a><?php }?>
                <?php if(get_field('tabela_rozmiarow')){?><a href="<?php echo get_field('deklaracje');?>"
                    class="inline-block p-4 px-5 mt-3 text-xs font-semibold transition-all duration-200 border border-gray-500 rounded-full md:ml-2 md:px-3 md:mt-10 text-black2 hover:bg-primary-100 hover:text-white hover:border-primary-100"><?php pll_e('Tabela rozmiarow'); ?></a><?php }?>

            </div>

            <div class="flex"> <a href="<?php echo get_permalink(533);?>" style="display:none"
                    class="p-2 px-4 mt-6 text-xs font-semibold text-white border seeproducts border-primary-100 bg-primary-100 hover:bg-gray-900 hover:text-white ">Zobacz
                    swoje produkty</a>
            </div>
        </div>

<?php


$gallery = array();
foreach($variants as $variant){
    $gallery[]['gallery'] = $variant['zdjecia'];

}
//print_r($gallery);
?>

        <div class="w-full mb-4 lg:w-6/12 lg:px-10 lg:mb-0">
            <?php
            if(isset($_GET['variant']))
                $first_photo = $gallery[$_GET['variant']]['gallery'][0] ;
            else
                $first_photo = $gallery[0]['gallery'][0]; ?>
            <a href="<?php echo $first_photo;?>" data-fancybox="gallery"
                class="block px-6 py-6 text-center text-gray-600 transition-all duration-200 bg-white rounded-lg shadow-md lg:py-16 hover:shadow">
                <img style="max-height: 20rem" class="mx-auto " src="<?php echo $first_photo;?>" />
            </a>

            <div class="flex flex-wrap mt-4 lg:flex-nowrap lg:-mx-1">

                <?php
                $i=0;
                if(isset($_GET['variant']))
                    $second_photo = $gallery[$_GET['variant']]['gallery'];
                else
                    $second_photo = $gallery[0]['gallery']; 

                //$second_photo = $gallery[$variants[0]['kolor']]['gallery'];?>
                <?php foreach($second_photo as $item){
                    if($i++ == -1) continue; ?>
                <div class="w-4/12 px-1 mb-2 lg:w-auto lg:flex-1">
                    <a href="<?php echo $item;?>" data-fancybox="gallery"
                        class="flex items-center block h-full px-6 py-6 text-center text-gray-600 transition-all duration-200 bg-white rounded-lg shadow-md hover:shadow">
                        <img class="w-16 mx-auto" src="<?php echo $item;?>" />
                    </a>
                </div>
                <?php } ?>

                <?php 
                 $others = $gallery[$variants[0]['kolor']]['gallery'];?>
                <?php foreach(get_field('galeria') as $item){ ?>
                <div class="w-4/12 px-1 mb-2 lg:w-auto lg:flex-1">
                    <a href="<?php echo $item;?>" data-fancybox="gallery"
                        class="flex items-center block h-full px-6 py-6 text-center text-gray-600 transition-all duration-200 bg-white rounded-lg shadow-md hover:shadow">
                        <img class="w-16 mx-auto" src="<?php echo $item;?>" />
                    </a>
                </div>
                <?php } ?>

            </div>


        </div>


    </div>




</div>

<div class="py-1 pb-12 mt-10 mb-20 bg-center bg-cover shadow-md lg:mt-16 lg:px-10 bg-primary-100"
    style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/young.png' ;?>) #F37836;">

    <div class="container mx-auto ">

        <h3 class="mt-8 mb-5 font-bold text-center text-white text:lg md:text-4xl">
            <?php pll_e('Sprawdź inne produkty'); ?>
        </h3>
        <div class="flex flex-wrap mt-4 lg:-mx-3 lg:mt-10 ">

            <?php
        // WP_Query arguments
        $args = array(
            'post_type'              => array( 'produkt' ),
            'posts_per_page' => 3,
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); 
                ?>
            <div class="w-full mb-5 lg:w-4/12 lg:px-2">

                <?php echo prodItem();?>
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

    </div>
</div>



<?php
get_footer(); ?>


<script>
    jQuery(".addProduct").click(function (event) {
        event.preventDefault();
        var id = jQuery(this).attr('data-id');
        var variant = jQuery( ".variants option:selected" ).val();

        jQuery(this).css('opacity', '.5');
        var th = jQuery(this);
        jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: 'action=addProduct&id=' + id + '&variant=' +  variant,
            success: function (data) {
                jQuery('.seeproducts').show();
                jQuery(th).css('opacity', '1');
                console.log(data);
            }
        });

    });
</script>