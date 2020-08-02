<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Landscape_Photography
 */

get_header();
?>

    <hr>

    <section>

        <div class="container e404-page no-fourtabbed-container">



            <h1 class="page-title"><?php esc_html_e( 'Oops...That page can&rsquo;t be found!', 'landscape-photography' ); ?></h1>
            <div class="row">
                <div class="col-md-12 col-lg-5"><h1 class="e404">404</h1></div>
                <div class="col-md-6 col-lg-3">
                    <h4><?php esc_html_e( 'Helpful Links', 'landscape-photography' ); ?></h4>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h4><?php esc_html_e( 'Search My Website', 'landscape-photography' ); ?></h4>
                    <p><?php esc_html_e( 'Cannot find what your looking for? Take a moment and do a search below!', 'landscape-photography' ); ?></p>

                    <?php get_search_form(); ?>
                </div>
            </div>





        </div>

    </section>







<?php
get_footer();
