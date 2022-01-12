<?php
get_header();
$team_post_title        = get_the_title();
$team_post_content      = get_the_content();
$team_author_designation   = get_field( 'designation' );
$team_author_image      = get_field( 'team_author_image' ); 
$size = 'full'; ?>

<section class="blogpost_sec">
    <div class="wrp_1320 dflex_c">

        <div class="pcontleft">

            <div class="breadcrumb_top"><?php
                echo do_shortcode('[evolvinghome_breadcrumb]'); ?>
            </div>

            <h1 class="posttitle"><?php echo esc_html( $team_post_title ); ?></h1>

            <div class="auth_det">
                <span><?php echo esc_html( $team_author_designation ); ?></span>
            </div>

            <hr class="black_bar" />

            <div><?php
                if ( $team_author_image ) : ?>
                    <img width="200" height="200" src="<?php echo esc_url( $team_author_image['url'] ); ?>" alt="<?php echo esc_attr( $team_post_title ); ?>"><?php
                else: ?>
                    <img width="200" height="200" src="<?php echo get_stylesheet_directory_uri(). '/assets/images/author_img.png'?>" alt="<?php echo esc_attr( $team_post_title ); ?>"><?php
                endif; ?>
            </div>

            <div class="content_pst">
                <?php echo $team_post_content; ?>
            </div>

        </div>

        <!-- Left Side Content - end -->
        
        <div class="psidebar">

            <div class="widrs"><?php
            
                if ( is_active_sidebar( 'details_menu' ) ) :
                    dynamic_sidebar( 'details_menu' );
                endif; ?>
                
            </div>

            <div class="widrs">
                /

            </div>

        </div>
        <!-- Sidebar - end -->

    </div>
</section><?php

echo do_shortcode('[evolvinghome_newsletter]');

get_footer(); ?>