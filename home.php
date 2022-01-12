<?php 
/**
 * Template Name: Evolving Home Template
 */
get_header();

$eh_hero_image      = get_field('hero_image'); 
$eh_hero_image_size = 'full';
$eh_hero_heading    = get_field('hero_heading');
$eh_hero_desc       = get_field('hero_description'); ?>


<section class="hero_home" style="background-image: url(<?php echo $eh_hero_image['url']; ?>);" >
    <div class="wrp_1320">
        
        <div class="herocnt"><?php

            if( $eh_hero_heading ) : ?>
                <h2><?php echo esc_html( $eh_hero_heading ); ?></h2><?php    
            endif;
            
            if( $eh_hero_desc ) : ?>
                <p><?php echo esc_html( $eh_hero_desc ); ?></p><?php 
            endif; 
            
            echo do_shortcode( '[evolvinghome_contact_newsletter]' ); ?>

        </div>

    </div>
</section>

<section class="featured_in">
    <div class="wrp_1320">
        
        <h4><?php esc_html_e( 'Featured in', 'EvolvingHome' ); ?></h4><?php
 
        $featured_images = get_field('gallery_images');

        if( $featured_images ): ?>
            <ul>
                <?php foreach( $featured_images as $image ): ?>
                    
                    <li>
                        <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </li><?php 
                
                endforeach; ?>

            </ul><?php
        endif; ?>

    </div>
</section><?php 

echo do_shortcode( '[]' );

echo do_shortcode('[]');

echo do_shortcode('[]');

get_footer(); ?>
