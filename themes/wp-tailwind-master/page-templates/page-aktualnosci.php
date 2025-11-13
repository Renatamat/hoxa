<?php
/**
 * Template name: Aktualnosci
 */

get_header(); 
headSVG();
?>
<div class="container mx-auto  flex flex-wrap  relative z-20 lg:px-0 justify-between items-center">
    <h1 class="font-bold text-3xl lg:text-5xl mb-8 mt-16 pt-2 lg:pl-32"><?php echo get_the_title();?></span></h1>

</div>

<div class="container mx-auto">

    <div class="flex flex-wrap lg:-mx-3 mt-4 lg:mt-20 ">

        <?php
                // WP_Query arguments
                $args = array(
                    'post_type'              => array( 'post' ),
                    'posts_per_page' => 12,
                    'paged' => $paged,
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post(); 
                        postItem(true);

                    }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();

                ?>

    </div>
    <?php echo pag($query);?>



</div>




<?php
get_footer();