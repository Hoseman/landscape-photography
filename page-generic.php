<?php

/* Template Name: Photography-GenericPage */

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Landscape_Photography
 */

get_header();
?>



<hr>




<!--About Us-->
<section id="about-generic">
<div class="container">
    <div class="row about">
        <div class="col-lg-12">
            <h2><?php the_title(); ?></h2>

            <?php
                while ( have_posts() ) :
                    the_post();

                    the_content();
            ?>


            <?php

                endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>
</section>
<!--About Us-->






<!-- Gallery -->
<section id="home-gallery">
    <div class="container-fluid home-gallery-container">
        <div class="row home-gallery-row">

            <?php
            $slug = basename(get_permalink());
            //('category_name' => 'Home') = select * from photography_gallery where category = home
            $loop = new WP_Query(array('post_type' => 'photography_gallery', 'category_name' => $slug, 'posts_per_page' => -1, 'orderby' => 'post_id', 'order' => 'ASC'));
            ?>
            <?php while( $loop->have_posts() ) : $loop->the_post(); ?>

                <?php $gallerybackgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                        <div class="col-md-4 col-sm-6 img-hover-zoom">
                            <a href="<?php echo get_permalink(); ?>">
                                <h5><i class="fa fa-search" aria-hidden="true"></i> Click To View</h5>
                                <img src="<?php echo $gallerybackgroundImg[0]; ?>" alt="<?php the_title(); ?>">
                            </a>
                        </div>

            <?php endwhile; ?>
            
        </div>

    </div>
</section>
<!-- Gallery -->





<!-- 4 tabbed section -->


<?php include get_template_directory() . '/includes/fourtabbed.php'; ?>


<!-- 4 tabbed section -->








<?php
get_footer();
