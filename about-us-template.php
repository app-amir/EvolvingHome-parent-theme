<?php 
/**
 * Template Name: Archive About Template
 */
get_header(); 

$work_hero_image        = get_field( 'work_hero_image' );
$archive_about_des      = get_field( 'about_us_description' ); 
$archive_template_name  = get_the_title();
$team_heading           = get_field( 'team_heading' );
$team_description       = get_field( 'team_description' );
$about_images_images    = get_field( 'about_images' ); ?>
<style>
    .hero_def:after { <?php
        if ( $work_hero_image ) : ?>
            background-image: url(<?php echo $work_hero_image['url']; ?>);
            <?php
        endif; ?>
    }
</style>

<section class="hero_def hero_abt">
    <div class="wrp_1320 dflex_r">
        <div>
            <h2><?php echo esc_html( $archive_template_name ); ?></h2><?php
            echo wp_sprintf( '<p>%s</p>', $archive_about_des );?>
        </div>
    </div>
</section>

<section class="featured_in optim">
    <div class="wrp_1320">
        <h4><?php esc_html_e( 'Featured in', 'EvolvingHome' ); ?></h4><?php
 
        $about_images_images = get_field('about_images');
        if( $about_images_images ): ?>
            <ul>
                <?php foreach( $about_images_images as $image ): ?>
                    
                    <li>
                        <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>

<section class="meettheteam_sec">

    <div class="hdn_sec wrp_1320"><?php
        if( $team_heading ): ?>
            <h2 class="hdnh2_n"><?php echo esc_html( $team_heading ); ?></h2><?php
        endif;

        if( $team_description ): ?>
            <p class="prgh_n"><?php echo esc_html( $team_description ); ?></p><?php
        endif; ?>

    </div><?php
     $args = array(
        'post_type'         => 'eh-team',
        'posts_per_page'    => 8,
        'orderby'           => 'date',
        'order'             => 'DESC',
    );
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) : ?>

        <div class="team_mems">
            <ul><?php
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                            
                    $about_us_post_link      = get_the_permalink();
                    $about_us_post_title     = get_the_title();
                    $about_us_designation    = get_field( 'designation' );
                    $team_author_image       = get_field( 'team_author_image' ); ?>
                    
                    <li><?php
                        if ( $team_author_image ) : ?>
                            <img src="<?php echo esc_url( $team_author_image['url'] ); ?>" alt="<?php echo esc_attr( $about_us_post_title ); ?>"><?php
                        else: ?>
                           <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/author_img.png'?>" alt="<?php echo esc_attr( $about_us_post_title ); ?>"><?php
                        endif; ?>
                        <h3><?php echo esc_html( $about_us_post_title ); ?></h3>
                        <p><?php echo esc_html( $about_us_designation ); ?></p>
                        <a href="<?php echo esc_url( $about_us_post_link ); ?>" class="btno"><?php esc_html_e( 'Read full bio', 'EvolvingHome' ); ?></a>
                    </li>
                    <?php

                endwhile; ?>
                
            </ul>
        </div><?php 
        
    endif; 
    wp_reset_postdata(); ?>

    <hr class="bluebar">

</section>

<section class="ourstats_sec">

    <h2 class="hdnh2_n"><?php esc_html_e( 'Our Stats', 'EvolvingHome' ); ?></h2><?php
    
    if ( have_rows( 'stats_details' ) ) : ?>

        <ul class="ourstats_wids"><?php

            while ( have_rows( 'stats_details' ) ) : the_row();

                $stats_image = get_sub_field( 'stats_image' ); 
                $stats_years =  get_sub_field( 'stats_years' );
                $stats_experience__reviews =  get_sub_field( 'stats_experience__reviews' ); ?>

                <li>
                    <div class="stat_ico" style="background-image:url('<?php echo esc_url( $stats_image['url'] ); ?>');"></div>
                    <div class="stat_cnt">
                        <h3><?php echo esc_html( $stats_years ); ?></h3>
                        <p><?php echo esc_html( $stats_experience__reviews ); ?></p>
                    </div>
                </li><?php
            endwhile; ?>
        </ul><?php 
    
    endif; ?>

    <div class="wrp_1330">
        <h2 class="hdnh2_n"><?php esc_html_e( 'The Evolving Home Editorial Process', 'EvolvingHome' ); ?></h2><?php 
        if ( have_rows( 'editorial_details' ) ) : ?>
            <ul class="editr_proc"><?php

                while ( have_rows( 'editorial_details' ) ) : the_row();

                    $editorial_image = get_sub_field( 'editorial_image' ); 
                    $editorial_title = get_sub_field( 'editorial_title' ); ?>

                    <li>
                        <div><img src="<?php echo esc_url( $editorial_image['url'] ); ?>" alt="<?php echo esc_attr( $editorial_image['alt'] ); ?>">
                            <p><?php echo esc_html( $editorial_title ); ?></p>
                        </div>
                    </li><?php

                endwhile; ?>
            </ul><?php
        endif; ?>
    </div>

    <hr class="bluebar">
</section>

<section class="abt_last_sec">
    <div class="wrp_1330 dflex_c"><?php

        $seo_heading        = get_field( 'seo_heading' );
        $seo_description    = get_field( 'seo_description' ); ?>

        <h2 class="hdnh2_n"><?php echo esc_html( $seo_heading ); ?></h2>
        <div>
            <p><?php echo esc_html( $seo_description ); ?></p>
        </div>
    </div>
</section><?php

echo do_shortcode('[evolvinghome_newsletter]');

get_footer(); ?> 