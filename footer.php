<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @package Evolving Home
 */

?>
<footer id="ftrsec" class="darkb_bg">
    <div class="wrp_1320">

        <div class="widarea">
            <div class="fixwid">
                <a href="<?php echo home_url(); ?>" class="logo_hdr"><?php
                    if ( has_custom_logo() ):
                        the_custom_logo();
                    else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/logo-evolving-home.svg'?>" alt="<?php echo get_bloginfo( 'name' ); ?>"><?php
                    endif;?>
                    
                    <div><?php

                        $site_description   = get_bloginfo( 'description', 'display' );
                        $site_name          = get_bloginfo( 'name' );

                        // for other post pages
                        if ( !( is_home() ) && ! is_404() ):

                            esc_html_e( 'Evolving', 'EvolvingHome' ); ?><span><?php esc_html_e( 'Home', 'EvolvingHome' ); ?></span><?php

                        else:

                            esc_html_e( 'Evolving', 'EvolvingHome' ); ?><span><?php esc_html_e( 'Home', 'EvolvingHome' ); ?></span><?php

                        endif; ?>
                    </div>
                </a><?php

                    if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                        <p><?php dynamic_sidebar( 'sidebar-1' ); ?></p><?php
                    endif;
                    
                    if ( is_active_sidebar( 'sidebar-2' ) ) :
                       dynamic_sidebar( 'sidebar-2' );
                    endif; ?>
            </div>
            <div class="fsidew">
                <div class="widf">
                    <h3><?php esc_html_e( 'Categories', 'EvolvingHome' );?></h3>
                    <ul><?php
                        $parent_category_arg    = array(
                            'hide_empty'    => false, 
                            'parent'        => 0 
                        );
                        $parent_category    = get_terms( 'category', $parent_category_arg );
                        foreach ( $parent_category as $category ) : ?>

                            <li><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
                            
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="widf">
                    <h3><?php esc_html_e( 'By Area', 'EvolvingHome' ); ?></h3><?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_area_menu',
                            'menu_id'        => 'footer-menu',
                        )
                    ); ?>
                    
                </div>
            </div>

        </div>

        <div class="ftrtxt"><?php
            if ( is_active_sidebar( 'sidebar-3' ) ) :
                dynamic_sidebar( 'sidebar-3' );
            endif; ?>
        </div>

    </div>
</footer>