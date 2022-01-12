<?php
get_header(); ?>

<section class="hero_def hero_abt">

    <div class="wrp_1320 dflex_r">
        <div>
            
            <h2><?php esc_html_e( 'Search', 'EvolvingHome' );
                printf(
                /* translators: %s: Search term. */
                esc_html__( ' Results for "%s"', 'EvolvingHome' ),
                '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
            ); ?></h2>

        </div>
    </div>

</section><?php

if ( have_posts() ) : ?>

    <section class="blogpost_sec" >
        <div class="wrp_1320 dflex_c">
            
            <!-- Posts Style B - STart -->
            <div class="cdp_sta style_b_posts"><?php

                while ( have_posts() ) : the_post(); ?> 
                   
                    <a <?php post_class( 'cntrpost' ); ?> href="<?php echo esc_url( $work_post_link ); ?>">
                        <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                        <div>
                            <h3><?php echo esc_html( $work_post_title ); ?></h3>
                            <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                            <?php echo wp_sprintf( '<p class="">%s </p>', __( $work_post_content ) ); ?>
                        </div>
                    </a><?php 
                
                endwhile; ?>

            </div>
            <!-- Posts Style B - end -->
        </div>
        
    </section><?php 
                
else : ?>

    <section class="blogpost_sec">
        <div class="wrp_1320 dflex_c">

            <div class="pcontleft">
                <p class="nothing-found"><?php _e( 'Sorry, nothing matched your search criteria. Please try again with some different keywords.', 'EvolvingHome' ); ?></p>
            </div>

        </div>
    </section><?php 
    
endif; 

wp_reset_postdata();

get_footer(); ?>