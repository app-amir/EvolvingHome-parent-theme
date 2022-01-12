<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>

<section class="blogpost_sec">
    <div class="wrp_1320 dflex_c">

        <div class="pcontleft error-page">

            <h1 class="posttitle"><?php esc_html_e( '404 Error!', 'EvolvingHome' ); ?></h1>
			<p><?php esc_html_e( 'Page not found. Please try again later', 'EvolvingHome' ); ?></p>

        </div>
        <!-- Left Side Content - end -->
        
        <div class="psidebar">

            <div class="widrs"><?php 
            
                if ( is_active_sidebar( 'details_menu' ) ) :
                    dynamic_sidebar( 'details_menu' );
                endif; ?>
                
            </div>

            <div class="widrs"><?php

                if ( is_active_sidebar( 'details_image' ) ) :
                    dynamic_sidebar( 'details_image' );
                else: ?>
                    <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/ad_ph.jpg'; ?>" alt="<?php echo esc_attr( $blog_single_title ); ?>"><?php 
                endif; ?>
            
            </div>

        </div>
        <!-- Sidebar - end -->

    </div>
</section>


<?php get_footer();
