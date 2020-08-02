<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Landscape_Photography
 */

get_header();
?>




	<hr>


	<section id="blog-title">
		<div class="container-fluid blog-container">
			<div class="row">
				<div class="col-lg-12">
					<h1>News & Reviews</h1>
					<p>News, reviews and discussions on everything in the world of photography. Have you got any comments or feedback? Why not drop me a message <a style="color:#c6c6c6; text-decoration:underline;" href="/contact/">here</a></p>
				</div>
			</div>
		</div>
	</section>

	<section  id="blog">
		<div class="container-fluid blog-container">
				<div class="row">

					<?php if ( have_posts() ) : ?>
					<?php endif; ?>
					<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

						<?php $blogbackgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

						<div class="col-12 col-lg-4 col-md-6 col-sm-6" >
							<div class="blogbox">
								<a href="<?php echo the_permalink(); ?>">
									<img src="<?php echo $blogbackgroundImg[0]; ?>" alt="<?php the_title(); ?>">
									<div class="blog-heading">
										<h5><?php the_title() ?></h5>
										<p><?php the_field('short_description'); ?></p>
									</div>
								</a>
							</div>
						</div>

					<?php endwhile; ?>



				</div>
		</div>
	</section>




<!-- Gallery -->
<section id="home-gallery">
	<div class="container-fluid home-gallery-container">
		<div class="row home-gallery-row">

			<?php
			//('category_name' => 'Home') = select * from photography_gallery where category = home
			$loop = new WP_Query(array('post_type' => 'photography_gallery', 'category_name' => 'Home', 'orderby' => 'post_id', 'order' => 'ASC'));
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


<?php include get_template_directory() . '/includes/fourtabbed-blog.php'; ?>


<!-- 4 tabbed section -->



	<!--Blog Content-->
<!--	<section id="about-generic">-->
<!--	<div class="container">-->
<!--	<div class="row about">-->
<!--	<div class="col-lg-12">-->
<!---->
<!---->
<!--		--><?php
//		if ( have_posts() ) :
//
//			if ( is_home() && ! is_front_page() ) :
//				?>
<!--				<header>-->
<!--					<h1 class="page-title screen-reader-text">--><?php //single_post_title(); ?><!--</h1>-->
<!--				</header>-->
<!--				--><?php
//			endif;
//
//			/* Start the Loop */
//			while ( have_posts() ) :
//				the_post();
//			?>
<!--				<h2>--><?php //the_title(); ?><!--</h2>-->
<!---->
<!--				--><?php //the_content(); ?>
<!---->
<!--				--><?php //the_post_ ?>
<!---->
<!--			--><?php
//				//get_template_part( 'template-parts/content', get_post_type() );
//
//			endwhile;
//
//			the_posts_navigation();
//
//		else :
//
//			get_template_part( 'template-parts/content', 'none' );
//
//		endif;
//		?>
<!---->
<!---->
<!--	</div>-->
<!--	</div>-->
<!--	</div>-->
<!--	</section>-->

	<!-- Blog Content -->






<?php



get_footer();
