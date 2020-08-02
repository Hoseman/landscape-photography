<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landscape_Photography
 */

?>






    <!-- My Footer -->
    <footer id="footer">
        <div class="container-fluid footer-container">
            <div class="row">
                <div class="col-sm-12">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="col-md-9 col-sm-12">
                    <span class="footer-copyright">
                      Copyright <?php echo date("Y");  ?>  <a target="_blank" href="https://achcreative.info" >ACH Creative</a>. All rights reserved. All images &copy; 2017-<?php echo date("Y");  ?> Andrew Hosegood<br><br>
                       All images on this website are under the copyright of Andrew Hosegood. You may not sell, publish, licence, copy, store digitally or otherwise distribute any of these images without the written permission of the photographer. Copyright in all Material is retained worldwide by the Photographer at all times and nothing shall be deemed as a release, transfer, assignment or other disposal of the Photographer’s rights in the Material.
                    </span>
                </div>
                <div class="col-md-3 col-sm-12">
                    <ul class="pull-right">
                        <li><a target="_blank" href="https://www.instagram.com/andrewhosegood2019/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/watch?v=vGSNPcp40a4"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.flickr.com/photos/30641500@N07/albums/72157680953265284"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                    </ul>


                </div>
                <div class="col-sm-12 mt-5">
                    <a class="scrolltop pull-right" onclick='window.scrollTo({top: 0, behavior: "smooth"});'><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- My Footer -->



<?php wp_footer(); ?>

</body>
</html>
