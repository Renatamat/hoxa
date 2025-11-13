<?php
/**
 * Kickoff theme setup and build
 */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

define( 'WP_Tailwind_VERSION', wp_get_theme()->version );
define( 'WP_Tailwind_DIR', __DIR__ );
define( 'WP_Tailwind_URL', get_template_directory_uri() );

//use FPDF;


//require_once( WP_Tailwind_DIR . '/vendor/autoload.php' );

//\A7\autoload( __DIR__ . '/src' );
// replace composer with php

foreach(glob( __DIR__ .'/src/*.php') as $file) {
    include_once $file;
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');



function postItem($more = false){?>

<div class="w-full mb-5 lg:w-4/12 lg:px-3">

    <a href="<?php echo get_permalink();?>"
        class="relative block h-full p-4 pb-8 text-black transition-all duration-200 bg-white rounded-lg shadow-md hover:shadow">
        <div class="h-48 bg-center bg-cover rounded-lg"
            style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>' );"></div>
        <div class="px-4">
            <div class="flex items-center mt-5 text-sm font-bold text-primary-100">
                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="14.379" height="14.346"
                    viewBox="0 0 14.379 14.346">
                    <g id="iconfinder_calendar_1814093_4_" data-name="iconfinder_calendar_1814093 (4)"
                        transform="translate(-10 -9.9)">
                        <g id="Icon-Calendar" transform="translate(10 9.9)">
                            <path id="Fill-133"
                                d="M-7.118-451.73H-18.569A1.444,1.444,0,0,1-20-453.161v-10.508a1.326,1.326,0,0,1,1.2-1.431h.716v.943H-18.8c-.1,0-.228.2-.228.488v10.508a.5.5,0,0,0,.488.488H-7.085a.5.5,0,0,0,.488-.488v-10.508c0-.293-.163-.488-.228-.488H-7.54v-.943h.716a1.349,1.349,0,0,1,1.2,1.431v10.508a1.548,1.548,0,0,1-1.5,1.431"
                                transform="translate(20 466.076)" fill="#f37836" />
                            <path id="Fill-134"
                                d="M-10.712-465.2a.5.5,0,0,1-.488-.488v-1.919a.5.5,0,0,1,.488-.488.5.5,0,0,1,.488.488v1.919a.525.525,0,0,1-.488.488"
                                transform="translate(14.063 468.1)" fill="#f37836" />
                            <path id="Fill-135"
                                d="M12.688-465.2a.5.5,0,0,1-.488-.488v-1.919a.5.5,0,0,1,.488-.488.5.5,0,0,1,.488.488v1.919a.5.5,0,0,1-.488.488"
                                transform="translate(-1.725 468.1)" fill="#f37836" />
                            <path id="Fill-136" d="M-5.3-465.1H-.55v.976H-5.3Z" transform="translate(10.082 466.076)"
                                fill="#f37836" />
                            <path id="Fill-137" d="M-17.1-456.3H-4.673v.976H-17.1Z"
                                transform="translate(18.043 460.139)" fill="#f37836" />
                            <path id="Fill-138" d="M15.2-450.4h.943v.943H15.2Z" transform="translate(-3.749 456.158)"
                                fill="#f37836" />
                            <path id="Fill-139" d="M9.3-450.4h.976v.943H9.3Z" transform="translate(0.232 456.158)"
                                fill="#f37836" />
                            <path id="Fill-140" d="M3.5-450.4h.943v.943H3.5Z" transform="translate(4.145 456.158)"
                                fill="#f37836" />
                            <path id="Fill-141" d="M-2.4-450.4h.943v.943H-2.4Z" transform="translate(8.126 456.158)"
                                fill="#f37836" />
                            <path id="Fill-142" d="M-8.3-450.4h.976v.943H-8.3Z" transform="translate(12.106 456.158)"
                                fill="#f37836" />
                            <path id="Fill-143" d="M15.2-444.5h.943v.943H15.2Z" transform="translate(-3.749 452.177)"
                                fill="#f37836" />
                            <path id="Fill-144" d="M9.3-444.5h.976v.943H9.3Z" transform="translate(0.232 452.177)"
                                fill="#f37836" />
                            <path id="Fill-145" d="M3.5-444.5h.943v.943H3.5Z" transform="translate(4.145 452.177)"
                                fill="#f37836" />
                            <path id="Fill-146" d="M-2.4-444.5h.943v.943H-2.4Z" transform="translate(8.126 452.177)"
                                fill="#f37836" />
                            <path id="Fill-147" d="M-8.3-444.5h.976v.943H-8.3Z" transform="translate(12.106 452.177)"
                                fill="#f37836" />
                            <path id="Fill-148" d="M-14.1-444.5h.943v.943H-14.1Z" transform="translate(16.019 452.177)"
                                fill="#f37836" />
                            <path id="Fill-149" d="M15.2-438.7h.943v.976H15.2Z" transform="translate(-3.749 448.264)"
                                fill="#f37836" />
                            <path id="Fill-150" d="M9.3-438.7h.976v.976H9.3Z" transform="translate(0.232 448.264)"
                                fill="#f37836" />
                            <path id="Fill-151" d="M3.5-438.7h.943v.976H3.5Z" transform="translate(4.145 448.264)"
                                fill="#f37836" />
                            <path id="Fill-152" d="M-2.4-438.7h.943v.976H-2.4Z" transform="translate(8.126 448.264)"
                                fill="#f37836" />
                            <path id="Fill-153" d="M-8.3-438.7h.976v.976H-8.3Z" transform="translate(12.106 448.264)"
                                fill="#f37836" />
                            <path id="Fill-154" d="M-14.1-438.7h.943v.976H-14.1Z" transform="translate(16.019 448.264)"
                                fill="#f37836" />
                            <path id="Fill-155" d="M9.3-432.8h.976v.943H9.3Z" transform="translate(0.232 444.284)"
                                fill="#f37836" />
                            <path id="Fill-156" d="M3.5-432.8h.943v.943H3.5Z" transform="translate(4.145 444.284)"
                                fill="#f37836" />
                            <path id="Fill-157" d="M-2.4-432.8h.943v.943H-2.4Z" transform="translate(8.126 444.284)"
                                fill="#f37836" />
                            <path id="Fill-158" d="M-8.3-432.8h.976v.943H-8.3Z" transform="translate(12.106 444.284)"
                                fill="#f37836" />
                            <path id="Fill-159" d="M-14.1-432.8h.943v.943H-14.1Z" transform="translate(16.019 444.284)"
                                fill="#f37836" />
                        </g>
                    </g>
                </svg>
                <?php echo get_the_date('d F Y');?>r


            </div>
            <div class="relative mt-3 text-lg font-bold text-black">
                <?php echo get_the_title();?></div>
            <div class="relative mt-3 leading-relaxed text-gray-600"><?php echo wp_trim_words(get_the_content(), 31);?>
            </div>
            <?php if($more){?>
            <div
                class="inline-block p-4 px-8 mx-auto mt-5 -mb-3 text-sm font-semibold text-white transition-all duration-200 rounded-full bg-primary-100 hover:bg-gray-900 hover:text-white">
                <?php pll_e('Czytaj dalej'); ?></div>
            <?php } ?>
        </div>
    </a>

</div>

<?php }



function pll_url( $id ) {

	$post_id = pll_get_post( $id, pll_current_language() );
    return get_permalink($post_id);

}

function pll_title( $id ) {

	$post_id = pll_get_post( $id, pll_current_language() );
    return get_the_title($post_id);

}

function headSVG(){?>

<svg class="absolute" style="top: 0rem; z-index: -1;" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" width="106" height="342" viewBox="0 0 106 342">
    <defs>
        <clipPath id="clip-path">
            <rect id="Rectangle_358" data-name="Rectangle 358" width="106" height="342" fill="#fff" stroke="#707070"
                stroke-width="1" />
        </clipPath>
    </defs>
    <g id="Mask_Group_1" data-name="Mask Group 1" clip-path="url(#clip-path)">
        <path id="Path_3252" data-name="Path 3252"
            d="M-9320.75-2443.63s567.232,635.637,1028.087,821.326,437.565,17.22,437.565,17.22-16.783,43.26-6.368,29.156c16.461-20.562,26.672-135.8-126.329-374.907-205.608-321.387-489.225-535.652-489.225-535.652l184.356,299.962s163.095,321.389-389.971,64.279S-9320.75-2443.63-9320.75-2443.63Z"
            transform="translate(7927.548 1876.774)" fill="#d9d9d9" />
    </g>
</svg>

<svg class="absolute" style="right:0; top:6.7rem; z-index: -1;" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" width="319" height="238" viewBox="0 0 319 238">
    <defs>
        <clipPath id="clip-path2">
            <rect id="Rectangle_359" data-name="Rectangle 359" width="319" height="238" transform="translate(1121 104)"
                fill="#fff" stroke="#707070" stroke-width="1" />
        </clipPath>
    </defs>
    <g id="Mask_Group_2" data-name="Mask Group 2" transform="translate(-1121 -104)" clip-path="url(#clip-path2)">
        <path id="Path_3174" data-name="Path 3174"
            d="M0,12.064S159.668,190.987,289.392,243.256,412.561,248.1,412.561,248.1s-4.724,12.177-1.793,8.207c4.633-5.788,7.508-38.225-35.56-105.531C317.333,60.313,237.5,0,237.5,0l51.894,84.435S335.3,174.9,179.621,102.529,0,12.064,0,12.064Z"
            transform="matrix(-0.819, 0.574, -0.574, -0.819, 1647.094, 187.167)" fill="#f37836" />
    </g>
</svg>


<?php }

function s_form(){?>

<form class="relative w-full" action="<?php echo pll_url(16);?>#list" method="get">
    <div class="relative">
        <input style="" class="w-full py-4 pl-10 mb-0 border-none rounded-full shadow-2xl" type="text"
            placeholder="Czego dziś szukasz?" name='ss' value="<?php echo $_GET['ss'];?>" />
        <input
            style="top:50%; right:6px; background: url(<?php echo get_stylesheet_directory_uri() . '/assets/images/search.svg' ;?>); background-position: 25px center;"
            class="absolute hidden w-auto px-10 pl-16 mb-0 text-sm font-semibold text-white transform -translate-y-1/2 bg-no-repeat border-none rounded-full cursor-pointer md:block bg-primary-100 top-1/2 hover:bg-gray-900"
            type="submit" value="Szukaj" />
    </div>
    <div class="flex flex-wrap lg:-mx-2 cat_select">

        <div class="w-full lg:w-4/12 lg:px-2">
            <select class="mt-4 mb-0 rounded-full shadow-2xl" name="cat">
                <option value="" disabled selected><?php pll_e('Kategoria produktu'); ?></option>
                <?php
                $taxonomies = get_terms( array(
                    'taxonomy' => 'kategorie',
                    'hide_empty' => false,
                    'orderby' => 'ID',
                    'include' => '',
                    ) );
    
                    foreach($taxonomies as $tax){ 
                        $sel = '';
                        if($_GET['cat'] == $tax->slug)
                        $sel = 'selected="selected"';
                    echo '<option '.$sel.' value="'.$tax->slug.'">'.$tax->name.'</option>';
                    } ?>

            </select>
        </div>
 
        <div class="w-full lg:w-4/12 lg:px-2">
            <select class="mt-4 mb-0 rounded-full shadow-2xl" name="rozmiar">
                <option value="" selected><?php pll_e('Rozmiar'); ?></option>
                <?php
                 $taxonomies = get_terms( array(
                    'taxonomy' => 'rozmiar',
                    'hide_empty' => false,
                    'orderby' => 'ID',
                    'include' => '',
                    ) );
    
                    foreach($taxonomies as $tax){ 
                        $sel = '';
                        if($_GET['rozmiar'] == $tax->slug)
                            $sel = 'selected="selected"';
                        echo '<option '.$sel.' value="'.$tax->slug.'">'.$tax->name.'</option>';
                    }
                    ?>
            </select>
        </div>
        <div class="w-full lg:w-4/12 lg:px-2">
            <select class="mt-4 mb-0 rounded-full shadow-2xl" name="producent">
                <option value="" selected><?php pll_e('Producent'); ?></option>
                <?php
                 $taxonomies = get_terms( array(
                    'taxonomy' => 'producent',
                    'hide_empty' => false,
                    'orderby' => 'ID',
                    'include' => '',
                    ) );
    
                    foreach($taxonomies as $tax){ 
                        $sel = '';
                        if($_GET['producent'] == $tax->slug)
                            $sel = 'selected="selected"';
                        echo '<option '.$sel.' value="'.$tax->slug.'">'.$tax->name.'</option>';
                    }
                    ?>
            </select>
        </div>

    </div>


</form>

<?php

}


function prodItem($text = false){
    $current_user = wp_get_current_user();
    
// 1) Spróbuj obrazka z ACF (warianty -> 0 -> zdjecia -> 0)
    $img_url = '';
    $warianty = function_exists('get_field') ? get_field('warianty') : null;
    if (is_array($warianty) && !empty($warianty[0]['zdjecia'][0])) {
        $img_url = is_numeric($warianty[0]['zdjecia'][0])
            ? wp_get_attachment_image_url( (int)$warianty[0]['zdjecia'][0], 'medium_large' )
            : $warianty[0]['zdjecia'][0];
    }

    // 2) Jeśli brak – miniatura wpisu (featured image)
    if (!$img_url && has_post_thumbnail()) {
        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
    }

    // 3) Jeśli to WooCommerce 'product' – pobierz z WC
    if (!$img_url && function_exists('wc_get_product') && get_post_type() === 'product') {
        $product = wc_get_product(get_the_ID());
        if ($product) {
            $image_id = $product->get_image_id();
            if ($image_id) {
                $img_url = wp_get_attachment_image_url($image_id, 'medium_large');
            }
            // brak głównego? weź pierwsze z galerii
            if (!$img_url) {
                $gallery_ids = $product->get_gallery_image_ids();
                if (!empty($gallery_ids[0])) {
                    $img_url = wp_get_attachment_image_url($gallery_ids[0], 'medium_large');
                }
            }
        }
    }

    // 4) Ostateczny fallback – placeholder Woo lub własny
    if (!$img_url) {
        if (function_exists('wc_placeholder_img_src')) {
            $img_url = wc_placeholder_img_src('medium');
        } else {
            // podmień na własny placeholder w motywie, jeśli chcesz
            $img_url = get_template_directory_uri() . '/assets/img/placeholder.png';
        }
    }
    
?>
    <div class="flex flex-col block h-full px-6 pt-8 pb-10 text-center text-gray-600 bg-white rounded-lg shadow-md">
        <a href="<?php echo get_permalink(); ?>">
            <img class="h-48 mx-auto" src="<?php echo esc_url($img_url); ?>" />
        </a>
        <div class="mt-8 mb-4 text-lg font-bold text-black"><?php echo get_the_title(); ?></div>

        <a href="<?php echo get_permalink(); ?>" data-id="<?php echo get_the_ID(); ?>"
            class="inline-block p-4 px-6 mx-auto mt-4 mt-auto text-sm font-semibold text-white transition-all duration-200 rounded-full prod_button bg-primary-100 hover:bg-gray-900 hover:text-white">
    <?php if (!$text)
        pll_e('Sprawdź szczegóły');
    else
        pll_e('Usuń')
    ?>
        </a>
    <?php if (user_can($current_user, "subscriber")) { ?>
                <div class="flex mt-4">
        <?php
        $cookie_name = "products";
        $products = $_COOKIE[$cookie_name];

        $products = explode(',', $products);
        $products = array_unique($products);
        // $products =  implode(',' ,  $products);
        $exist = false;
        if (($key = array_search(get_the_ID(), $products)) !== false) {
            //unset($products[$key]);
            $exist = true;
        }

        if ($exist) {
        ?>
            <a data-id="<?php echo get_the_ID(); ?>" href="<?php echo get_permalink(); ?>" data-id="<?php echo get_the_ID(); ?>"
                   style="background: #000" class="inline-block p-4 px-6 mx-auto mt-4 mt-auto text-sm font-semibold text-white transition-all duration-200 rounded-full removeProd prod_button hover:bg-gray-900 hover:text-white">
            <?php pll_e('Usuń') ?>
                </a>
        <?php } else { ?>
                <a data-id="<?php echo get_the_ID(); ?>" href="<?php echo get_permalink(); ?>" data-id="<?php echo get_the_ID(); ?>"
                    class=" BBB inline-block p-4 px-6 mx-auto mt-4 mt-auto text-sm font-semibold text-white transition-all duration-200 rounded-full addProduct prod_button bg-primary-100 hover:bg-gray-900 hover:text-white">
            <?php pll_e('Dodaj do oferty') ?>
                </a>
        <?php } ?>
            <a  href="<?php echo pll_url(533); ?>" data-id="<?php echo get_the_ID(); ?>"
                class="inline-block p-4 px-6 mx-auto mt-4 mt-auto text-sm font-semibold text-white transition-all duration-200 rounded-full prod_button bg-primary-100 hover:bg-gray-900 hover:text-white">
        <?php pll_e('Zobacz
            swoje produkty') ?>
            </a>
           

            </div>
    <?php } ?>
    </div>

    <?php
}

function prodItemOferta($text = false, $p, $variant, $price=null){
    $current_user = wp_get_current_user();

    ?>

<div class="flex flex-col block h-full px-6 pt-8 pb-10 text-center text-gray-600 bg-white rounded-lg shadow-md">
    <a href="<?php echo get_permalink($p);?>">
        <img class="h-48 mx-auto" src="<?php echo get_field('warianty', $p)[$variant]['zdjecia'][0];?>" /> 
    </a>
    <div class="mt-8 mb-4 text-lg font-bold text-black"><?php echo get_the_title($p);?></div>
    <div class="mb-4"><?php echo get_field('warianty', $p)[$variant]['kolor'].', '.get_field('warianty', $p)[$variant]['rozmiar'];?></div>

    <?php
        if (  user_can( $current_user, "subscriber" ) ){
            echo '<input type="number" value="'.$price.'" name="'.$p.'-'.$variant.'" placeholder="Wpisz cenę" class="border border-gray-100"/><input disabled type="hidden" value="'.$p.'"  name="'.$p.':id"/>';

        } ?>

    <a href="<?php echo get_permalink($p);?>" data-id="<?php echo $p.'-'.$variant;?>"
        class="inline-block p-4 px-6 mx-auto mt-4 mt-auto text-sm font-semibold text-white transition-all duration-200 rounded-full prod_button bg-primary-100 hover:bg-gray-900 hover:text-white">
        <?php if(!$text) pll_e('Sprawdź szczegóły');
            else pll_e('Usuń') ?>
    </a>


</div>

<?php
    
    }

add_action('init', function() {
    pll_register_string('mytheme', 'Sprawdź szczegóły');
    pll_register_string('mytheme', 'Pobierz specyfikację');

    pll_register_string('mytheme', 'Nothing');
    pll_register_string('mytheme', 'cat');
    
    pll_register_string('mytheme', 'Szczegóły automatu');
    pll_register_string('mytheme', 'Czytaj dalej');
    pll_register_string('mytheme', 'Sprawdź inne wpisy');
    pll_register_string('mytheme', 'Wróć do aktualności');

    pll_register_string('mytheme', 'Producent');
    pll_register_string('mytheme', 'Rozmiar');
    pll_register_string('mytheme', 'Kolor');
    pll_register_string('mytheme', 'Gramatura');
    pll_register_string('mytheme', 'Skład');
    pll_register_string('mytheme', 'Deklaracje');
    pll_register_string('mytheme', 'Karta produktu');
    pll_register_string('mytheme', 'Tabela rozmiarow');
    pll_register_string('mytheme', 'Zobacz  wszystkie produkty');

    pll_register_string('mytheme', 'Kategoria produktu');
    pll_register_string('mytheme', 'Przeznaczenie');
    pll_register_string('mytheme', 'Dodaj do oferty');
    pll_register_string('mytheme', 'Usuń');
    pll_register_string('mytheme', 'Wybierz wariant');
    
  });



  function pag($query){?>

<div class="block mt-12 text-center pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
</div>



<?php

    
  }


  function home_banner(){
    $pageID = get_option('page_on_front')
  
      ?>

<div class="px-10 py-16 mt-16 mb-20 text-center bg-center bg-cover rounded-lg shadow-md lg:mt-24 bg-primary-100"
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
    <h3 class="mt-8 mb-5 font-bold text-white text:lg md:text-4xl"><?php echo get_field('ban_n', $pageID);?></h3>
    <div class="lg:px-32" style="color:#FFD9C5"><?php echo get_field('ban_t', $pageID);?></div>
    <a href="tel:<?php echo get_field('tel', $pageID);?>"
        class="inline-block p-4 px-6 mt-10 text-sm font-semibold transition-all duration-200 bg-white rounded-full text-primary-100 hover:bg-gray-900 hover:text-white">
        <?php echo get_field('tel', $pageID);?></a>

</div>

<?php

  }


  function my_admin_menu() {
    add_menu_page(
        __( 'Produkty PDF', 'my-textdomain' ),
        __( 'Produkty PDF', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        3
    );

    add_menu_page(
        __( 'Import', 'my-textdomain' ),
        __( 'Import', 'my-textdomain' ),
        'manage_options',
        'import',
        'my_admin_page_import',
        'dashicons-schedule',
        3
    );
}

add_action( 'admin_menu', 'my_admin_menu' );


function my_admin_page_import() {?>

    <h1 class="mt-32" style="margin-top: 2rem">
        <?php esc_html_e( 'Import', 'my-plugin-textdomain' ); ?>
    </h1>

    <p>Plik do importu: <code>/import/import.csv</code></p>

    <div class="card" >
        1) tytuł 11 kolumna, pierwszy element <br>
        2) produkty są scalane wedle kolumny 2 (NAZWA HANDLOWA) <br>
        3) Jeśli wystąpił błąd w pobieraniu grafik, należy je usunąć z mediów i ponowić import. Tak samo w przypadku chęci podmiany grafik w produktach na nowe. Dla optymalizacji importu grafiki nie są aktualizowane jeśli już istnieją.
    </div>
    <p>Separator
        <input class="sep" type="text" name="separator" value=","/>
    </p>
    <p>Od rekordu
        <input class="from" type="text" name="first" value="1"/>
    </p>
    <p>Do
        <input class="to" type="text" name="last" value="99999"/>
    </p>
    <a target="blank " class="btnStartImport button action" style="margin-top:30px; display: none;" href="#" >Rozpocznij import</a>

    <div id='information' class="card" > 

    </div>

    <script type="text/javascript">
    jQuery(document).ready(function ($) {
        var refreshIntervalId;
        refreshIntervalId = setInterval(oneSecondFunction, 500);
        jQuery(document).on("click",".btnStartImport",function(event) {
            event.preventDefault();
            startimport();
        });
        
        function startimport() {
            jQuery('.btnStartImport').hide()
       
            refreshIntervalId = setInterval(oneSecondFunction, 1000);
            
            var separator = jQuery('.sep').val();
            var from = jQuery('.from').val();
            var to = jQuery('.to').val();
            console.log(separator);
            jQuery.ajax({
                type: "GET",
                url: "/import/import.php",
                data: { separator: separator, from: from, to: to },
                success : function(res) { 
                    console.log(res);
                }
            });
        }
        

        function oneSecondFunction() {
            
            fetch('/import/counter.txt')
            .then(response => response.text())
            .then(text => {
            //const myArr = text.split(","); 
            //console.log(myArr);
            document.getElementById("information").innerHTML = text;
            
            if(text == "Zakończono"){
                //clearInterval(refreshIntervalId);
                //jQuery('#information').text('Zakończono');
                jQuery('.btnStartImport').show()
                clearInterval(refreshIntervalId);
            }
            else{

                
            }
            })

        }

    });

    </script>

<?php }




function my_admin_page_contents() {
    ?>
<h1 class="mt-32" style="margin-top: 2rem">
    <?php esc_html_e( 'Generowanie PDF z bazą produktów', 'my-plugin-textdomain' ); ?>
</h1>

<a target="blank " class="pdfD button action" style="margin-top:30px; opacity:0" href="">Pobierz PDF</a>

<?php

    printPDF();


}

function printPDF(){?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var data = {
            'action': 'my_action',
            'whatever': 1234
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
            jQuery('.pdfD').attr('href', response);
            jQuery('.pdfD').css('opacity', 1);
        });
    });
</script> <?php
   
}

add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {

    $ICONV_CHARSET_INPUT = 'UTF-8';
 $ICONV_CHARSET_OUTPUT_A = 'ISO-8859-2//TRANSLIT';
 $ICONV_CHARSET_OUTPUT_B = 'windows-1252//TRANSLIT';
  $font = 'DejaVuuu';  


    require('src/pdf/FPDF/fpdf.php');
    
    $pdf = new FPDF();
    $pdf->cellspacing = 3;
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetDrawColor(230,230,230);
$pdf->AddFont('DejaVuuu','','DejaVuSans.php');
// WP_Query arguments

$type = $_POST['type'];


if($type == 'oferta'){
    $cookie_name = "products";
    $products = unserialize(base64_decode($_COOKIE[$cookie_name]));
}
else{
    $args = array(
        'post_type'              => array( 'produkt' ),
        'posts_per_page' => 9,
    );
    $products = get_posts($args);
}
// The Query
$query = new WP_Query( $args );
$top = 10;
$count=0;
// The Loop
$total = 0;

foreach($products as $p){

    if($type == 'oferta'){
        $ID = $p['id'];
    }
    else{
        $ID = $p->ID;
    }
       
        $query->the_post(); 
        $pdf->SetFont('DejaVuuu','',11);
        $pdf->Cell(0 ,7, iconv($ICONV_CHARSET_INPUT, $ICONV_CHARSET_OUTPUT_A, mb_strtoupper(get_the_title($ID), $ICONV_CHARSET_INPUT))        , "L T R", 1, 'L');
       

        $pdf->SetFont('DejaVuuu','',7);
        $dane = '';
        $terms = get_the_terms( $ID, 'producent' );
        $term = array_pop($terms);  
        if($term->name)
        $dane .= $term->name.' | ';


        // sizes
        if($type == 'oferta'){
            $rozmiar = get_field('warianty', $ID)[$p['variant']]['rozmiar'];
            $dane .= $rozmiar .' | ';
        }
        else{
            $terms = get_the_terms( $ID, 'rozmiar' );
            //$term = array_pop($terms);  
            $termsa = array();
            foreach($terms as $term){
                $termsa[] = $term->name;
            }
   
            $dane .= implode(', ', $termsa).' | ';
        }

        // colors
        if($type == 'oferta'){
            $kolor = get_field('warianty', $ID)[$p['variant']]['kolor'];
            $dane .= $kolor .' | ';
        }
        else{
            $kolor = get_field('warianty', $ID);
            //$term = array_pop($terms);  
            $kolora = array();
            foreach($kolor as $k){
                $kolora[] = $k['kolor'];
            }
   
            $dane .= implode(', ', $kolora).' | ';
        }

     
        $term = get_field('gramatura', $ID);
        if($term)
        $dane .= $term.' | ';

        $term = get_field('sklad', $ID);
        if($term)
        $dane .= $term.' | ';


        $pdf->MultiCell(0 ,4, iconv($ICONV_CHARSET_INPUT, $ICONV_CHARSET_OUTPUT_A, mb_strtoupper($dane, $ICONV_CHARSET_INPUT))        , "L R");

        if($type == 'oferta'){

            $price = $p['price'];
            $total += $price;
            $pdf->Cell(0 ,7, iconv($ICONV_CHARSET_INPUT, $ICONV_CHARSET_OUTPUT_A, mb_strtoupper('Cena: '.$price .' pln', $ICONV_CHARSET_INPUT))        , "L R", 1, 'L');

            $gallery = array();
            $images = get_field('warianty', $ID)[$p['variant']];
            foreach($images['zdjecia'] as $image){
                    $gallery[] = $image;
            }
        }
        else{
            $gallery = array();
            $images = get_field('warianty', $ID);
            foreach($images as $image){
                foreach($image['zdjecia'] as $im){
                    $gallery[] = $im;
                }
                
            }
        }

        $i= 0;
        if($gallery){
            foreach($gallery as $item){
                $w = 17;
                $y = $pdf->GetY() + 2;
                if($i==0)
                $pdf->Cell( 22, 25, $pdf->Image(str_replace(' ', '%20', $item), $pdf->GetX() + 2, $y , $w), "L T", 0, 'L', false );
                elseif($i<2) //only two images
                $pdf->Cell( 22, 25, $pdf->Image(str_replace(' ', '%20', $item), $pdf->GetX() + 2, $y , $w), " T", 0, 'L', false );

                $i++;
            }
        }
        $pdf->Cell(0 ,25, ''        , "R T ", 1, 'L');

        $pdf->Cell(0 ,0, ''        , "B", 1, 'L');
        $pdf->Cell(0 ,5, ''        , "", 1, 'L');
        $top = $top + 40;


        $count++;
        if ($count == 6 ){
           // $pdf->addPage();

            $count=0;
         }
        
    }



if($type == 'oferta'){
    $pdf->Cell(0 ,7, iconv($ICONV_CHARSET_INPUT, $ICONV_CHARSET_OUTPUT_A, mb_strtoupper('Razem: '.$total .' pln', $ICONV_CHARSET_INPUT))        , "", 1, 'L');
}

if($type == 'oferta'){
    $path = get_template_directory().'/src/pdf/baza_produktow_'.get_current_user_id().'.pdf';
    $path_url = get_template_directory_uri().'/src/pdf/baza_produktow_'.get_current_user_id().'.pdf';
}
else{
    $path = get_template_directory().'/src/pdf/baza_produktow.pdf';
    $path_url = get_template_directory_uri().'/src/pdf/baza_produktow.pdf';
}

$r = $pdf->Output('F', $path);
echo $path_url;
	wp_die(); // this is required to terminate immediately and return a proper response
}


function addProduct() {
    $cookie_name = "products";
    

    if(!isset($_COOKIE[$cookie_name])){
        $products = array();
    }
    else
    $products = unserialize(base64_decode($_COOKIE[$cookie_name]));

    //$products =  explode(',',  $products);
    

    if(!isset($_POST['remove'])) {
        $id = $_POST['id'];
        $variant = $_POST['variant'];
        $products[$id.'-'.$variant] = array(
            'id' => $id,
            'variant' => $variant
        );
  
        $products = array_unique($products, SORT_REGULAR);
        print_r($products);
        $products = base64_encode(serialize($products));
    
    }
    else{
        
        $products = array_unique($products, SORT_REGULAR);
        //print_r($products);
        //print_r($_POST['remove']);
        //if (($key = array_search($_POST['remove'], array_keys($products) )) !== false) {
        unset($products[$_POST['remove']]);
        // }
        //print_r($products);
        $products = base64_encode(serialize($products));

       // $products =  implode(',' ,  $products);
        
    }
    setcookie($cookie_name, urlencode($products), time() + (86400 * 30), "/",  $_SERVER['HTTP_HOST']); // 86400 = 1 day

    
    

    die();
}
add_action('wp_ajax_addProduct', 'addProduct');
add_action('wp_ajax_nopriv_addProduct', 'addProduct');


function addPrices() {


    $data = json_decode(stripslashes($_POST['data']), true);


    $cookie_name = "products";
    $products = unserialize(base64_decode($_COOKIE[$cookie_name]));

    foreach($data as $d){
        $products[$d['name']]['price'] = $d['value'];
    }
    print_r($products);
    $products = base64_encode(serialize($products));

    //$key = array_search('2915-0', array_column($data, 'name'));
    //print_r($key);


    //setcookie($cookie_name, stripslashes($_POST['data']), time() + (86400 * 30), "/",  $_SERVER['HTTP_HOST']); // 86400 = 1 day
  // $prices = $_COOKIE[$cookie_name];
    //$data = json_decode(stripslashes($_POST['data']), true);

    setcookie($cookie_name, urlencode($products), time() + (86400 * 30), "/",  $_SERVER['HTTP_HOST']); // 86400 = 1 day

  

    die();
}
add_action('wp_ajax_addPrices', 'addPrices');
add_action('wp_ajax_nopriv_addPrices', 'addPrices');

add_action( 'wpcf7_before_send_mail', 'process_form', 10, 3  );

function process_form(  $contact_form, $abort, $submission ) {
    $posted_data = $submission->get_posted_data();
    $type = $posted_data['type'];
    $form_id = $contact_form->posted_data['type'];
    if ( $type == 'oferta'){
// get mail property
$mail = $contact_form->prop( 'mail' ); // returns array 

$cookie_name = "products";
        $products = unserialize(base64_decode($_COOKIE[$cookie_name]));


        foreach($products as $p){
            $kolor = get_field('warianty', $p['id'])[$p['variant']]['kolor'];
            $rozmiar = get_field('warianty', $p['id'])[$p['variant']]['rozmiar'];

            $mail['body'] .= '<div style="margin-top:10px">'.get_the_title($p['id']).' / Wariant:'. $kolor .', '.$rozmiar.'<span style="margin-left:50px; display:inline-block;">#id: '.$p['id'].'</span></div>';
        }
   
        // set mail property with changed value(s)
        $contact_form->set_properties( array( 'mail' => $mail ) );

    }

   }
   
add_filter('show_admin_bar', '__return_true');
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

// == FILTROWANIE PRODUKTÓW WG FORMULARZA ==
add_action('pre_get_posts', function( $q ){
  if ( is_admin() || ! $q->is_main_query() ) return;

  $is_product_archive = $q->is_post_type_archive('product') || $q->is_tax(['product_cat','product_brand','pa_rozmiar']);
  $is_product_search  = $q->is_search() && ( isset($_GET['post_type']) && $_GET['post_type'] === 'product' );
  if ( ! $is_product_archive && ! $is_product_search ) return;

  $tax_query = (array) $q->get('tax_query');

  if ( ! empty($_GET['cat']) ) {
    $tax_query[] = [
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => sanitize_text_field($_GET['cat']),
    ];
  }

  $size_terms = [];
  if ( ! empty( $_GET['pa_rozmiar'] ) ) {
    $raw = $_GET['pa_rozmiar'];
    $size_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  } elseif ( ! empty( $_GET['rozmiar'] ) ) {
    $raw = $_GET['rozmiar'];
    $size_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  }

  if ( ! empty( $size_terms ) && taxonomy_exists('pa_rozmiar') ) {
    $tax_query[] = [
      'taxonomy' => 'pa_rozmiar',
      'field'    => 'slug',
      'terms'    => $size_terms,
    ];
  }

  $brand_terms = [];
  if ( ! empty( $_GET['product_brand'] ) ) {
    $raw = $_GET['product_brand'];
    $brand_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  } elseif ( ! empty( $_GET['brand'] ) ) {
    $raw = $_GET['brand'];
    $brand_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  }

  if ( ! empty( $brand_terms ) && taxonomy_exists('product_brand') ) {
    $tax_query[] = [
      'taxonomy' => 'product_brand',
      'field'    => 'slug',
      'terms'    => $brand_terms,
    ];
  }

  if ( ! empty($tax_query) ) {
    $tax_query['relation'] = 'AND';
    $q->set('tax_query', $tax_query);
  }

  $q->set('post_type', 'product');
  // $q->set('posts_per_page', 12); // opcjonalnie
});

/**
 *  Enqueue skryptu filtrów – tylko na sklepie/produktach.
 */
add_action('wp_enqueue_scripts', function(){

  if ( function_exists('is_shop') && ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() || is_product() ) ) {
    $theme_uri = get_stylesheet_directory_uri();
  
    wp_enqueue_script(
      'pf-filters',
      $theme_uri . '/assets/js/product-filters.js',
      [],
      '1.0.1',
      true
    );
        // Ładowanie pliku shop-filters.js 
    wp_enqueue_script(
      'shop-filters',
      $theme_uri . '/assets/js/shop-filters.js',
      [],
      '1.0.1',
      true
    );
  }
});

/**
 *  Filtrowanie listy produktów przy submit (jak wcześniej).
 */
add_action('pre_get_posts', function( $q ){
  if ( is_admin() || ! $q->is_main_query() ) return;

  $is_product_archive = $q->is_post_type_archive('product') || $q->is_tax(['product_cat','product_brand','pa_rozmiar']);
  $is_product_search  = $q->is_search() && ( isset($_GET['post_type']) && $_GET['post_type'] === 'product' );
  if ( ! $is_product_archive && ! $is_product_search ) return;

  $tax_query = (array) $q->get('tax_query');

  if ( ! empty($_GET['cat']) ) {
    $tax_query[] = [
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => sanitize_text_field($_GET['cat']),
    ];
  }

  $size_terms = [];
  if ( ! empty( $_GET['pa_rozmiar'] ) ) {
    $raw = $_GET['pa_rozmiar'];
    $size_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  } elseif ( ! empty( $_GET['rozmiar'] ) ) {
    $raw = $_GET['rozmiar'];
    $size_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  }

  if ( ! empty( $size_terms ) && taxonomy_exists('pa_rozmiar') ) {
    $tax_query[] = [
      'taxonomy' => 'pa_rozmiar',
      'field'    => 'slug',
      'terms'    => $size_terms,
    ];
  }

  $brand_terms = [];
  if ( ! empty( $_GET['product_brand'] ) ) {
    $raw = $_GET['product_brand'];
    $brand_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  } elseif ( ! empty( $_GET['brand'] ) ) {
    $raw = $_GET['brand'];
    $brand_terms = is_array( $raw )
      ? array_filter( array_map( 'sanitize_text_field', $raw ) )
      : array_filter( array_map( 'sanitize_text_field', explode( ',', $raw ) ) );
  }

  if ( ! empty( $brand_terms ) && taxonomy_exists('product_brand') ) {
    $tax_query[] = [
      'taxonomy' => 'product_brand',
      'field'    => 'slug',
      'terms'    => $brand_terms,
    ];
  }

  if ( ! empty($tax_query) ) {
    $tax_query['relation'] = 'AND';
    $q->set('tax_query', $tax_query);
  }

  $q->set('post_type', 'product');
});

/**
 *  AJAX: zwraca dostępne termy dla pozostałych pól na podstawie bieżących wyborów.
 */
add_action('wp_ajax_pf_filter_terms', 'pf_filter_terms_cb');
add_action('wp_ajax_nopriv_pf_filter_terms', 'pf_filter_terms_cb');

function pf_filter_terms_cb(){
  if ( ! isset($_POST['nonce']) || ! wp_verify_nonce( $_POST['nonce'], 'pf_filters_nonce' ) ) {
    wp_send_json_error(['message'=>'Bad nonce'], 403);
  }

  $cat   = isset($_POST['cat']) ? sanitize_text_field($_POST['cat']) : '';

  $size = '';
  if ( isset($_POST['pa_rozmiar']) ) {
    $size = sanitize_text_field($_POST['pa_rozmiar']);
  } elseif ( isset($_POST['rozmiar']) ) {
    $size = sanitize_text_field($_POST['rozmiar']);
  }

  $brand = '';
  if ( isset($_POST['product_brand']) ) {
    $brand = sanitize_text_field($_POST['product_brand']);
  } elseif ( isset($_POST['brand']) ) {
    $brand = sanitize_text_field($_POST['brand']);
  }

  $tax_query = [];

  if ( $cat !== '' ) {
    $tax_query[] = [
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => $cat,
    ];
  }
  if ( $size !== '' && taxonomy_exists('pa_rozmiar') ) {
    $tax_query[] = [
      'taxonomy' => 'pa_rozmiar',
      'field'    => 'slug',
      'terms'    => $size,
    ];
  }
  if ( $brand !== '' && taxonomy_exists('product_brand') ) {
    $tax_query[] = [
      'taxonomy' => 'product_brand',
      'field'    => 'slug',
      'terms'    => $brand,
    ];
  }
  if ( ! empty($tax_query) ) {
    $tax_query['relation'] = 'AND';
  }

  // Pobierz ID produktów spełniających aktualny zestaw filtrów
  $q = new WP_Query([
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'fields'              => 'ids',
    'posts_per_page'      => 500,          // LIMIT zabezpieczający
    'no_found_rows'       => true,
    'ignore_sticky_posts' => true,
    'tax_query'           => !empty($tax_query) ? $tax_query : [],
  ]);

  $ids = $q->posts;
  if ( empty($ids) ) {
    wp_send_json_success([
      'categories' => [],
      'sizes'      => [],
      'brands'     => [],
    ]);
  }

  // Funkcja pomocnicza: policz dostępne termy (name, slug, count)
  $collect_terms = function(array $ids, string $tax){
    if ( ! taxonomy_exists($tax) ) return [];
    $terms = wp_get_object_terms( $ids, $tax, ['fields'=>'all'] );
    if ( is_wp_error($terms) || empty($terms) ) return [];
    // policz wystąpienia
    $counts = [];
    foreach ($terms as $t) {
      $counts[$t->slug] = isset($counts[$t->slug]) ? $counts[$t->slug] + 1 : 1;
    }
    // unikalne po slug
    $unique = [];
    foreach ($terms as $t) {
      if ( isset($unique[$t->slug]) ) continue;
      $unique[$t->slug] = [
        'name'  => $t->name,
        'slug'  => $t->slug,
        'count' => $counts[$t->slug],
      ];
    }
    // sortuj alfabetycznie po name
    usort($unique, function($a,$b){ return strcasecmp($a['name'], $b['name']); });
    return array_values($unique);
  };

  $available_categories = $collect_terms($ids, 'product_cat');
  $available_sizes      = $collect_terms($ids, 'pa_rozmiar');
  $available_brands     = $collect_terms($ids, 'product_brand');

  wp_send_json_success([
    'categories' => $available_categories,
    'sizes'      => $available_sizes,
    'brands'     => $available_brands,
  ]);
}


//// strona produktu - ukrycie ilosci 
//add_filter( 'woocommerce_quantity_input_min', function( $min, $product ) {
//    return 1;
//}, 10, 2 );
//
//add_filter( 'woocommerce_quantity_input_max', function( $max, $product ) {
//    return 1;
//}, 10, 2 );
//
//add_filter( 'woocommerce_is_sold_individually', function( $return, $product ) {
//    return true; // wymusza 1 sztukę, ukrywa input
//}, 10, 2 );


require_once get_stylesheet_directory() . '/template-parts/filters-helpers.php';
//  
// // FILTROWANIE
//add_action('pre_get_posts', 'hoxa_shop_filters');
//function hoxa_shop_filters( $q ) {
//    if ( ! $q->is_main_query() ) return;
//    if ( is_admin() ) return;
//
//    // tylko na archiwum sklepu / kategoriach produktów
//    if ( ! ( $q->is_post_type_archive('product') || $q->is_tax('product_cat') ) ) {
//        return;
//    }
//
//    $tax_query = [];
//
//    // Kategoria (jeśli wymuszasz przez GET np. ?cat=rekawice)
//    if ( !empty($_GET['cat']) ) {
//        $tax_query[] = [
//            'taxonomy' => 'product_cat',
//            'field'    => 'slug',
//            'terms'    => sanitize_text_field($_GET['cat']),
//        ];
//    }
//
//    // Marka (np. ?brand=kimberly-clark)
//    if ( !empty($_GET['brand']) ) {
//        $tax_query[] = [
//            'taxonomy' => 'product_brand',
//            'field'    => 'slug',
//            'terms'    => sanitize_text_field($_GET['brand']),
//        ];
//    }
//
//    // Atrybuty WooCommerce typu pa_rozmiar, pa_kolor itd.
//    foreach ($_GET as $key => $val) {
//        if ( strpos($key, 'pa_') === 0 && !empty($val) ) {
//            $tax_query[] = [
//                'taxonomy' => $key,
//                'field'    => 'slug',
//                'terms'    => array_map('sanitize_text_field', (array)$val),
//            ];
//        }
//    }
//
//    if ( !empty($tax_query) ) {
//        // Jeśli już istnieje tax_query w $q->get('tax_query'), łączymy
//        $existing = (array) $q->get('tax_query');
//        $tax_query = array_merge( $existing, $tax_query );
//        $q->set('tax_query', $tax_query);
//    }
//}
//// KONIEC FILTROWANIE


add_filter( 'woocommerce_quantity_input_args', function( $args, $product ) {
    // Działaj tylko na pojedynczej karcie produktu (również dla wariantów)
    if ( is_product() ) { 
        if ( isset( $args['classes'] ) && is_array( $args['classes'] ) ) {
            $args['classes'][] = 'w-full'; // np. żeby wrapper miał szerokość 100%
            $args['classes'][] = 'max-w-full px-6 py-4 mb-0 w-full text-left rounded-full shadow-2xl border border-gray-200 text-sm font-medium text-black bg-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-black/10 ';
        }
    }

    return $args;
}, 10, 2 );

add_action( 'woocommerce_before_add_to_cart_quantity', 'custom_quantity_label_before_input_single' );
function custom_quantity_label_before_input_single() {
    if ( is_product() ) {
        echo '<label for="quantity" class="block mb-2 text-sm font-semibold text-black">Ilość</label>';
    }
}

add_filter( 'woocommerce_continue_shopping_redirect', 'zmien_tekst_przycisku_koszyka' );
add_filter( 'gettext', 'zmien_tekst_zobacz_koszyk', 20, 3 );

function zmien_tekst_zobacz_koszyk( $translated, $text, $domain ) {
    if ( 'woocommerce' === $domain && $text === 'View cart' ) {
        $translated = 'Zobacz swoje produkty';
    }
    return $translated;
}

add_filter( 'gettext', 'zmien_tekst_order_summary_wc', 20, 3 );
add_filter( 'woocommerce_gettext', 'zmien_tekst_order_summary_wc', 20, 3 );
function zmien_tekst_order_summary_wc( $translated, $original, $domain ) {

    // Oryginalny tekst z WooCommerce Blocks
    if ( $original === 'Order summary' ) {
        return 'Podsumowanie';
    }

    return $translated;
}
add_filter( 'gettext', 'zamien_zamowienie_na_zapytanie', 20, 3 );
function zamien_zamowienie_na_zapytanie( $translated_text, $untranslated_text, $domain ) {

    if ( strpos( $untranslated_text, 'Zamówienie' ) !== false ) {
        $translated_text = str_replace( 'Zamówienie', 'Zapytanie ofertowe', $translated_text );
    }

    return $translated_text;
}

add_filter( 'woocommerce_checkout_fields', 'hoxa_customize_checkout_fields' );
function hoxa_customize_checkout_fields( $fields ) {
        if ( isset( $fields['billing'] ) ) {

        // POZOSTAWIAMY: imię, nazwisko, e-mail, telefon
        $allowed = [ 'billing_first_name', 'billing_last_name', 'billing_email', 'billing_phone' ];

        foreach ( $fields['billing'] as $key => $field ) {
            if ( in_array( $key, $allowed, true ) ) {
                // tych pól NIE chowamy
                continue;
            }

            // wszystko inne: niewymagane + schowane
            $fields['billing'][ $key ]['required'] = false;

            if ( isset( $fields['billing'][ $key ]['class'] ) && is_array( $fields['billing'][ $key ]['class'] ) ) {
                $fields['billing'][ $key ]['class'][] = 'wc-offer-hidden-field';
            } else {
                $fields['billing'][ $key ]['class'] = [ 'wc-offer-hidden-field' ];
            }

            $fields['billing'][ $key ]['priority'] = isset( $fields['billing'][ $key ]['priority'] )
                ? $fields['billing'][ $key ]['priority'] + 1000
                : 1000;
        }

        // Imię
        if ( isset( $fields['billing']['billing_first_name'] ) ) {
            $fields['billing']['billing_first_name']['label']       = __( 'Imię', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_first_name']['placeholder'] = __( 'Imię', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_first_name']['priority']    = 10;
            $fields['billing']['billing_first_name']['class']       = [ 'form-row-wide' ];
        }

        // Nazwisko
        if ( isset( $fields['billing']['billing_last_name'] ) ) {
            $fields['billing']['billing_last_name']['label']       = __( 'Nazwisko', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_last_name']['placeholder'] = __( 'Nazwisko', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_last_name']['priority']    = 20;
            $fields['billing']['billing_last_name']['class']       = [ 'form-row-wide' ];
        }

        // E-mail
        if ( isset( $fields['billing']['billing_email'] ) ) {
            $fields['billing']['billing_email']['label']       = __( 'Adres e-mail', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_email']['placeholder'] = __( 'Adres e-mail', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_email']['priority']    = 30;
            $fields['billing']['billing_email']['class']       = [ 'form-row-wide' ];
            $fields['billing']['billing_email']['required']    = true;
        }

        // Telefon
        if ( isset( $fields['billing']['billing_phone'] ) ) {
            $fields['billing']['billing_phone']['label']       = __( 'Numer telefonu', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_phone']['placeholder'] = __( 'Numer telefonu', 'woo-catalog-offer-mode' );
            $fields['billing']['billing_phone']['priority']    = 40;
            $fields['billing']['billing_phone']['class']       = [ 'form-row-wide' ];
            $fields['billing']['billing_phone']['required']    = false;
        }
    }

    // nic nie wysyłamy, nie zakładamy kont
    if ( isset( $fields['shipping'] ) ) {
        $fields['shipping'] = [];
    }

    if ( isset( $fields['account'] ) ) {
        $fields['account'] = [];
    }

    // notatki do zamówienia zostają
    if ( isset( $fields['order']['order_comments'] ) ) {
        $fields['order']['order_comments']['priority'] = 50;
    }

    return $fields;
}

add_filter( 'woocommerce_order_button_text', 'hoxa_quote_order_button_text' );
function hoxa_quote_order_button_text( $text ) {
    return __( 'Wyślij zapytanie', 'yourtheme' );
}

function hoxa_is_quote_stage() {
    if ( ! function_exists( 'is_checkout' ) ) {
        return false;
    }

    if ( is_checkout() || is_cart() ) {
        return true;
    }

    return function_exists( 'is_order_received_page' ) && is_order_received_page();
}

add_filter( 'woocommerce_cart_item_price', 'hoxa_hide_quote_prices', 10, 3 );
add_filter( 'woocommerce_cart_item_subtotal', 'hoxa_hide_quote_prices', 10, 3 );
function hoxa_hide_quote_prices( $value, $cart_item = null, $cart_item_key = null ) {
    if ( hoxa_is_quote_stage() ) {
        return '';
    }

    return $value;
}

add_filter( 'woocommerce_cart_subtotal', 'hoxa_hide_quote_cart_subtotal', 10, 3 );
function hoxa_hide_quote_cart_subtotal( $subtotal, $compound, $cart ) {
    if ( hoxa_is_quote_stage() ) {
        return '';
    }

    return $subtotal;
}

add_filter( 'woocommerce_cart_totals_order_total_html', 'hoxa_hide_quote_totals_html', 10, 1 );
add_filter( 'woocommerce_cart_totals_fee_html', 'hoxa_hide_quote_totals_html', 10, 1 );
add_filter( 'woocommerce_cart_totals_tax_html', 'hoxa_hide_quote_totals_html', 10, 1 );
add_filter( 'woocommerce_cart_totals_shipping_html', 'hoxa_hide_quote_totals_html', 10, 1 );
function hoxa_hide_quote_totals_html( $value ) {
    if ( hoxa_is_quote_stage() ) {
        return '';
    }

    return $value;
}

add_filter( 'woocommerce_order_item_subtotal', 'hoxa_hide_quote_order_item_subtotal', 10, 4 );
function hoxa_hide_quote_order_item_subtotal( $subtotal, $item, $order, $tax_display ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $subtotal;
    }

    if ( hoxa_is_quote_stage() || ( function_exists( 'is_account_page' ) && is_account_page() ) ) {
        return '';
    }

    return '';
}

add_filter( 'woocommerce_get_order_item_totals', 'hoxa_hide_quote_order_totals', 10, 2 );
function hoxa_hide_quote_order_totals( $totals, $order ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $totals;
    }

    foreach ( $totals as $key => $total ) {
        if ( isset( $total['value'] ) && ! in_array( $key, [ 'payment_method', 'customer_note' ], true ) ) {
            $totals[ $key ]['value'] = '';
        }
    }

    return $totals;
}
// Remove billing address fields 

// Ikona koszyka + ikona użytkownika w głównym menu
add_filter( 'wp_nav_menu_items', 'ms_add_cart_and_account_icons_to_menu', 10, 2 );
function ms_add_cart_and_account_icons_to_menu( $items, $args ) {

    // Zmieniaj tylko główne menu – jeśli u Ciebie nazywa się inaczej niż 'primary', zmień to:
    if ( $args->theme_location !== 'primary' ) {
        return $items;
    }

    // Ikona koszyka (jeśli WooCommerce jest aktywne)
    if ( function_exists( 'wc_get_cart_url' ) ) {
        $cart_url = wc_get_cart_url();
        $count    = ( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;

        $items .= '<li class="menu-item menu-item-type-woocommerce menu-item-cart">';
        $items .= '<a href="' . esc_url( $cart_url ) . '" class="menu-cart-link">';
        $items .= '<span class="menu-icon menu-icon-cart dashicons dashicons-cart"></span>';

        // liczba produktów w koszyku
//        $items .= '<span class="cart-count">' . intval( $count ) . '</span>';

        $items .= '</a></li>';
    }

    // Ikona użytkownika / Moje konto
    $account_page_id = get_option( 'woocommerce_myaccount_page_id' );
    if ( $account_page_id ) {
        $account_url = get_permalink( $account_page_id );

        $items .= '<li class="menu-item menu-item-type-woocommerce menu-item-account">';
        $items .= '<a href="' . esc_url( $account_url ) . '" class="menu-account-link">';
        $items .= '<span class="menu-icon menu-icon-account dashicons dashicons-admin-users"></span>';
        $items .= '</a></li>';
    }

    return $items;
}
