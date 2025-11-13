<?php
/**
 * Template name: Twoje produkty
 */

get_header(); 
?>

<div class="opacity-25 lg:opacity-100">
    <?php headSVG();?>
</div>
<div class="container relative z-20 flex flex-wrap items-center justify-between mx-auto lg:px-0">
    <h1 class="pt-2 mt-16 mb-8 text-3xl font-bold lg:text-5xl lg:pl-32"><?php echo get_the_title();?></span></h1>

</div>

<div class="container mx-auto lg:px-0">

    <div class="mt-6 leading-relaxed lg:mt-12 lg:px-32">

        <?php 
        $cookie_name = "products";

        if(isset($_COOKIE[$cookie_name])){


            $products = unserialize(base64_decode($_COOKIE[$cookie_name]));
        //$products = explode(',' ,$_COOKIE[$cookie_name]);
    
      // print_r($products);
        
?>             <?php
if (  user_can( $current_user, "subscriber" ) ){ ?><form id="form"><?php } ?>

            <div id="list" class="flex flex-wrap lg:-mx-2 ">
                <?php

foreach($products as $p){
	?>
                <div class="w-full mb-5 lg:w-4/12 lg:px-2">
                <?php echo prodItemOferta(true, $p['id'], $p['variant'], $p['price'] );?>

                </div>
                <?php
}
     ?>

            </div>

            <?php
if (  user_can( $current_user, "subscriber" ) ){ ?>
            <div class="flex ">
                <a href=""
                    class="inline-block p-4 px-6 mt-10 text-sm font-semibold text-white transition-all duration-200 rounded-full generate bg-primary-100 hover:bg-gray-900">Generuj
                    PDF</a>
                <a href="" target="blank" style="display:none"
                    class="p-4 px-6 mt-10 ml-4 text-sm font-semibold text-white transition-all duration-200 rounded-full pdfD bg-primary-100 hover:bg-gray-900">Pobierz
                    PDF</a>

            </div>

            <?php } else { ?>
            <div class="px-10 py-8 pb-8 mt-10 bg-center bg-cover rounded-lg lg:px-24 bg-primary-100 lg:pl-40"
                style="background:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/engineer.png' ;?>) #F37836;">

                <h2 class="pt-2 mt-2 mb-8 mb-12 text-2xl font-bold text-white lg:text-4xl">
                    Wyślij zapytanie</h2>
                <?php  echo do_shortcode('[contact-form-7 id="442" title="oferta"]');?>


            </div>
            <?php } ?>

    </div>

    <?php
if (  user_can( $current_user, "subscriber" ) ){ ?></form><?php } ?>
    
</div>

<?php }  else{
    echo 'Brak produktów';
}
?>
<script>
    jQuery(".prod_button").click(function (event) {
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


    jQuery(".generate").click(function (event) {
        event.preventDefault();
        var Form = jQuery('#form').serializeArray();
        Form = JSON.stringify(Form);
console.log(Form);
        var th = jQuery(this);
        jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: 'action=addPrices&data=' + Form,
            success: function (data) {
                console.log(data);

                jQuery(this).css('opacity', '.5');
                jQuery('.pdfD').hide();
                jQuery.ajax({
                    type: "POST",
                    url: "/wp-admin/admin-ajax.php",
                    data: 'action=my_action&type=oferta',
                    success: function (data) {
                        jQuery('.pdfD').attr('href', data);
                        jQuery('.pdfD').show();
                        jQuery(th).css('opacity', '1');

                    }
                });

            }
        });





    });
</script>


<?php
get_footer();