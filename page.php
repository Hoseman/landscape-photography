<?php
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

	<main id="primary" class="site-main xxx">
	<section id="about-generic">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
<?php
						//get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
//						if ( comments_open() || get_comments_number() ) :
//							comments_template();
//						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>

	</section>
	</main><!-- #main -->


	<!-- 4 tabbed section -->


	<?php include get_template_directory() . '/includes/fourtabbed-blog.php'; ?>


	<!-- 4 tabbed section -->

<?php



get_footer();
