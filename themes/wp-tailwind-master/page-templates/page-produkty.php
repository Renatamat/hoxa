<?php
/**
 * Template name: Produkty 
 */

get_header(); 
headSVG();
?>

<div class="container mx-auto ">
    <h1 class="pt-2 mt-16 mb-8 text-3xl font-bold lg:text-5xl lg:pl-32"><?php echo get_the_title();?></span></h1>

    <div class="mt-10 lg:mt-24">
        <?php echo s_form();?>


        <a  class="inline-block p-4 px-6 mt-10 text-sm font-semibold text-white transition-all duration-200 rounded-full cursor-pointer toggle_cat lg:hidden bg-primary-100 hover:bg-gray-900"><?php pll_e('cat'); ?></a>

        <div class="flex-wrap hidden mt-12 lg:-mx-2 cats lg:flex">

            <?php

                $taxonomies = get_terms( array(
                'taxonomy' => 'kategorie',
                'hide_empty' => false,
                'orderby' => 'ID',
                'include' => '',
                ) );

                foreach($taxonomies as $tax){ 
                $thumbnail = get_field('ikona', $tax->taxonomy . '_' . $tax->term_id);	
                ?>
            <div class="w-full mb-5 lg:w-1/5 lg:px-2">
                    <?php
                    //exclude cat from get
                    $get = $_GET;
                    $get['cat'] = '';
                    ?>
                <a style="" href="<?php echo pll_url(16);?>?cat=<?php echo $tax->slug.'&'.http_build_query($get);?>#list"
                    class="cat_block block shadow-md h-full px-8 pt-12 pb-5 text-center rounded-lg bg-white transition-all duration-200 hover:shadow <?php if($_GET['cat'] == $tax->slug) echo ' border border-primary-100';?>">

                    <img class="h-10 mx-auto" style="max-width: 4rem;" src="<?php echo $thumbnail;?>" />
                    <div class="font-bold text-base text-black mt-5 <?php if($_GET['cat'] == $tax->slug) echo ' ';?>">
                        <?php echo $tax->name;?></div>
                </a>

            </div>
            <?php } ?>


        </div>


        <div id="list" class="flex flex-wrap pt-12 lg:-mx-2 slider_prod navc">

            <?php
// WP_Query arguments
$args = array(
'post_type'              => array( 'produkt' ),
'posts_per_page' => 9,
'paged' => $paged,
'order' => "ASC",
's' => $_GET['ss'],


);

$args['tax_query'] = array(
    'relation' => 'AND',
);
if(isset($_GET['cat'])) {
$args['tax_query'][0][] = 
    array (
        'taxonomy' => 'kategorie',
        'field' => 'slug',
        'terms' => $_GET['cat'],

    );
}

if(isset($_GET['przeznaczenie']) && $_GET['przeznaczenie'] !='') {
    $args['tax_query'][0][] = 
        array (
            'taxonomy' => 'przeznaczenie',
            'field' => 'slug',
            'terms' => $_GET['przeznaczenie'],
    
        );
    }
    if(isset($_GET['rozmiar']) && $_GET['rozmiar'] !='') {
        $args['tax_query'][0][] = 
            array (
                'taxonomy' => 'rozmiar',
                'field' => 'slug',
                'terms' => $_GET['rozmiar'],
        
            );
        }  

        if(isset($_GET['producent']) && $_GET['producent'] !='') {
            $args['tax_query'][0][] = 
                array (
                    'taxonomy' => 'producent',
                    'field' => 'slug',
                    'terms' => $_GET['producent'],
            
                );
            }  

        



// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
while ( $query->have_posts() ) {
$query->the_post(); ?>
            <div class="w-full mb-5 lg:w-4/12 lg:px-2">

                <?php echo prodItem();?>
            </div>
            <?php
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
        <?php echo pag($query);?>
        <div class="-mt-10 -mb-10">
            <?php echo home_banner();?>
        </div>

    </div>

</div>


<?php
get_footer();

?>

<script>


jQuery(".removeProd").click(function (event) {
        event.preventDefault();
        var id = jQuery(this).attr('data-id');

        jQuery(this).css('opacity', '.5');
        var th = jQuery(this);
        jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: 'action=addProduct&remove=' + id,
            success: function (data) {

                location.reload();
            }
        });

    });


jQuery( ".addProduct" ).click(function(event) {
    event.preventDefault();
    var id = jQuery(this).attr('data-id');

    jQuery(this).css('opacity', '.5');
    var th = jQuery(this);
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: 'action=addProduct&id=' + id + '&variant=0',
        success: function(data){
           jQuery('.seeproducts').show();
           // jQuery(th).css('opacity', '1');
          //  jQuery(th).attr('style', 'background: #000 !important');

           // jQuery(th).text('Dodano');
           //jQuery(th).hide();
           location.reload();

            console.log(data);
        }
    });

});




</script>