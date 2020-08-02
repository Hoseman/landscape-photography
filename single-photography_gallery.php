<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Landscape_Photography
 */

get_header();
?>

	<hr>



		<div class="container-fluid page-detail">




			<section id="close-window" style="margin: 20px 0px 1px 0px; height:10px;">
				<div class="container-fluid ah-picture-container">

					<!-- Close Window -->
					<?php $ref_url = wp_get_referer(); ?>
					<a href="<?php echo $ref_url; ?>">
						<span class="close-window" style="border: 1px solid #fff; width: 26px; height: 26px; padding-top: 5px; display:block; float:right;">
							<span class="close-window-x-1"></span>
							<span class="close-window-x-2"></span>
						</span>
					</a>
					<!-- Close Window -->

				</div>
			</section>




			<!-- Large Picture -->
			<section id="about-singular" style="margin-top:0;">
				<div class="container-fluid ah-picture-container">
					<div class="row about">
						<div class="col-lg-12 large-picture">

							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
							<?php //$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<?php //the_field('single_page_gallery_image'); ?>
							<?php $backgroundImg = get_field('single_page_gallery_image');?>


							<?php if(!empty($backgroundImg)){ ?>
										<img src="<?php echo $backgroundImg['url']; ?>" alt="<?php echo $backgroundImg['alt']; ?>" width="100%" class="single-image-large">
							<?php } ?>




							<h2><span class="title-hyphen">&mdash;</span> <?php the_title(); ?> <span class="title-hyphen">&mdash;</span></h2>
<!--									<span>&mdash;</span>-->
									<?php the_content(); ?>
<!--									<span>&mdash;</span>-->



							<?php endwhile; ?>
							<?php endif; ?>

							<ul>
                                <?php if( get_field('camera_make') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-5.png" width="28" alt="icon" class="icon"><?php the_field('camera_make'); ?> <?php the_field('camera_lens'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('date') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-6.png" width="28" alt="icon" class="icon"><?php the_field('date'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('aperture') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-2.png" width="28" alt="icon" class="icon">ƒ/<?php the_field('aperture'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('focal_length') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-3.png" width="28" alt="icon" class="icon"><?php the_field('focal_length'); ?>mm</li>
                                <?php endif; ?>
                                <?php if( get_field('shutter_speed') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-1.png" width="28" alt="icon" class="icon"><?php the_field('shutter_speed'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('iso') ): ?>
								    <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon-4.png" width="28" alt="icon" class="icon"><?php the_field('iso'); ?></li>
                                <?php endif; ?>
							</ul>


							<!-- <small style="margin-top:30px; display:block; color:#666;">Your attention is drawn to the copyright disclaimer on this site <a style="color:#666;" href="#">here</a></small> -->


						</div>
					</div>
				</div>
			</section>
			<!-- Large Picture -->

			<?php
//			while ( have_posts() ) :
//				the_post();
//
//				get_template_part( 'template-parts/content', get_post_type() );
//
//				the_post_navigation(
//					array(
//						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'landscape-photography' ) . '</span> <span class="nav-title">%title</span>',
//						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'landscape-photography' ) . '</span> <span class="nav-title">%title</span>',
//					)
//				);
//
//
//			endwhile;
			?>

		</div>




	<!-- 4 tabbed section -->


<?php include get_template_directory() . '/includes/fourtabbed-blog.php'; ?>


	<!-- 4 tabbed section -->






<?php

get_footer();
