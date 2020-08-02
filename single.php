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

	<section id="blog-detail">

		<div class="container-fluid page-detail blog-detail-container">
			<div class="row">
				<div class="col-12 col-sm-8 col-lg-9 blog-story">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<h2><?php the_title(); ?></h2>


						<p><?php landscape_photography_posted_on(); landscape_photography_posted_by(); ?></p>

						<?php
							$post_banner = get_field('post_banner');
							if(!empty($post_banner)){
						?>
							<img class="wp-post-image" src="<?php echo $post_banner['url']; ?>" alt="<?php echo $post_banner['alt']; ?>">
						<?php
							}
						?>
						<p><?php the_content(); ?></p>

						<?php
//				get_template_part( 'template-parts/content', get_post_type() );
//
//				the_post_navigation(
//					array(
//						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'landscape-photography' ) . '</span> <span class="nav-title">%title</span>',
//						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'landscape-photography' ) . '</span> <span class="nav-title">%title</span>',
//					)
//				);

						// If comments are open or we have at least one comment, load up the comment template.
//				if ( comments_open() || get_comments_number() ) :
//					comments_template();
//				endif;

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-12 col-sm-4 col-lg-3">
					<h2 class="widget-title"><a href="<?php echo get_bloginfo('url') ?>/blog/">Recent Posts</a></h2>
<!--					<h2 class="widget-title">XXXXXX XXXXX</h2>-->
					<?php get_sidebar(); ?>
				</div>
			</div>



		</div>

	</section>







<?php

get_footer();
