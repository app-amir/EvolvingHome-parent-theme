<?php get_header();
$work_single_ID         = get_the_ID();
$work_single_title      = get_the_title();
$work_single_content    = get_the_content();
$work_single_excerpt    = get_the_excerpt();
$eh_thumbnail_image     = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
$eh_thumbnail_image ? $work_single_thumbnail = $eh_thumbnail_image[0] : $work_single_thumbnail = get_stylesheet_directory_uri(). '/assets/images/featured_img_portrait.png'; ?>

<section class="blogpost_sec">
    <div class="wrp_1320 dflex_c">

        <div class="pcontleft">

            <div class="breadcrumb_top"><?php
                echo do_shortcode('[evolvinghome_breadcrumb]'); ?>
            </div>

            <h1 <?php post_class( 'posttitle' ) ?>><?php echo esc_html( $work_single_title ); ?></h1>

            <div class="auth_det"><?php 
                echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                <span><?php echo get_the_author_meta( 'display_name' ); ?></span>
            </div>

            <hr class="black_bar" />

            <div class="fea_img_post">
                <img src="<?php echo esc_url( $work_single_thumbnail ); ?>" alt="<?php echo esc_attr( $work_single_title ); ?>">
            </div>

            <div class="content_pst">
                <p class="bigtxt"><?php echo $work_single_excerpt; ?></p>
                <?php echo $work_single_content; ?>
            </div>
            
            <div class="share_btns">

                <p><?php esc_html_e( 'Share', 'EvolvingHome' ); ?></p>

                <ul class="soc_btns"><?php

                    if ( have_rows( 'social_button_links' ) ) :

                        while ( have_rows( 'social_button_links' ) ) : the_row();

                            if ( $facebook_link ) : ?>
                                <li><a href="<?php echo esc_url( $facebook_link['url'] ); ?>" target="<?php echo esc_attr( $facebook_link['target'] ); ?>" class="fab fa-facebook-f"></a></li><?php 
                            endif; 

                            if ( $twitter_link  ) : ?>
                                <li><a href="<?php echo esc_url( $twitter_link['url'] ); ?>" target="<?php echo esc_attr( $twitter_link['target'] ); ?>" class="fab fa-twitter"></a></li><?php
                            endif;

                            if ( $linkdin_link ) : ?>
                                <li><a href="<?php echo esc_url( $linkdin_link['url'] ); ?>" target="<?php echo esc_attr( $linkdin_link['target'] ); ?>" class="fab fa-linkedin-in"></a></li><?php
                            endif;

                        endwhile;

                    endif; ?>

                </ul>

            </div>

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
                    <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/ad_ph.jpg'; ?>" alt="<?php echo esc_attr( $work_single_title ); ?>"><?php 
                endif; ?>

            </div>

        </div>
        <!-- Sidebar - end -->

    </div>
</section><?php

get_footer(); ?>

