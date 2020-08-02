<section  id="fourtabbed">
    <div class="container-fluid fourtabbed-container">
        <div class="row">

            <?php $loop = new WP_Query(array('post_type' => 'box_menu_alt', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
            <?php while( $loop->have_posts() ) : $loop->the_post(); ?>

                <?php $fourboxesbackgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                <div class="col-12 col-lg-3 col-md-6 col-sm-6" >
                    <div class="fourtabbedbox">
                        <a href="<?php the_field('box_url'); ?>">
                            <img src="<?php echo $fourboxesbackgroundImg[0]; ?>" alt="<?php the_title(); ?>">
                            <h5 class="fourtabbed-heading"><?php the_title() ?></h5>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>