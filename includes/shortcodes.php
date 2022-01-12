<?php

/**
 * Getting all the Work CPT categories for Home Page
 */
add_shortcode( 'evolvinghome_all_categories', 'evolvinghome_categories' );

function evolvinghome_categories( ){
    
    ob_start(); ?>

    <section class="cat_hdns">

        <div class="wrp_1320">
            <div class="hdnsec">
                <h2 class="hdnh2"><?php the_field( 'category_heading' ); ?></h2>
                <p><?php the_field( 'category_description' ); ?></p>
            </div>
        </div>

        <ul class="catg_list"><?php
        
            $parent_category_arg    = array(
                'hide_empty'    => false, 
                'parent'        => 0,
                'exclude' 	    =>	array( 1 )
            );
            $parent_category    = get_terms( 'category', $parent_category_arg ); 

            foreach ( $parent_category as $category ) :

                $image = get_field('image', $category->taxonomy . '_' . $category->term_id ); ?>

                <li>
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php
                        
                        if( $image ) : ?>
                            <div style="background-image:url(<?php echo esc_url( $image['url'] ); ?>);"></div><?php 
                        endif; ?>
                        
                        <p><?php echo esc_html( $category->name ); ?></p>

                    </a>
                </li><?php 
            endforeach; ?>

        </ul>

    </section>

    <?php $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

/**
 * Get all the Posts from Work CPT
 * Exclude the same category in taxonomy Page
 * Exclude the Same Category Related Posts in taxonomy Page 
 * Also Quick fix section has been attached before every category section by using Shortcode [evolvinghome_quick_fix]
 */
add_shortcode( 'evolvinghome_work_posts', 'work_related_posts' );

function work_related_posts( ){

    ob_start(); 
     
    $taxonomy   = 'category';
    
    $queried_object     = get_queried_object();
    $get_category_id    = $queried_object->term_id;
    $get_name           = $queried_object->name;

    if( is_category( $get_name )  ):

        $eh_category_args   = array(
            'hide_empty'    => false, 
            'parent'        => 0,
            'exclude' 	    =>	array( $get_category_id )
        );
        $terms = get_terms( $taxonomy, $eh_category_args );
        
        if ( $terms ) :

            foreach( $terms as $key=>$term ) :

                $args = array(
                    'tax_query' => array( 
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 3,
                    'offset'            => 1,
                    'order'             => 'ASC',
                    'orderby'           => 'title'
                );

                $eh_work_query = new WP_Query( $args );

                $eh_work_query_latest = new WP_Query( $latest );

                if( $eh_work_query->have_posts() ) :

                    if( is_category( $get_name )  ):
                        echo do_shortcode('[evolvinghome_quick_fix]');
                    endif;

                    if( $key % 2 == 0 ): ?>

                        <section id="cat_d-<?php echo $term->slug; ?>" class="cat_det">

                            <div class="wrp_1320">

                                <div class="cd_head dflex_c">

                                    <div class="cd_nameico"><?php

                                        $image = get_field('image', $term->taxonomy . '_' . $term->term_id ); 

                                        if( $image ) : ?>

                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['title'] ); ?>"><?php
                                        
                                        endif; ?>

                                        <h3><?php echo esc_html( $term->name ); ?></h3>
                                    </div>

                                    <div class="cd_shlist">
                                        
                                        <ul><?php

                                            $child_category_arg = array( 
                                                'hide_empty'    => false, 
                                                'parent'        => $term->term_id
                                            );
                                            $child_category     = get_terms( $taxonomy, $child_category_arg );
                                            
                                            foreach( $child_category as $category ) : ?>
                                            
                                                <li><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
                                                <?php

                                            endforeach; ?>
                                        </ul>
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="seeall_btn"><?php echo esc_html_e( 'See all ', 'EvolvingHome' ) . esc_html( $term->name ); ?></a>
                                    </div>

                                </div>
                                <!-- Category Head -->

                                
                                <!-- Posts Style A - STart -->
                                <div class="cdp_sta style_a_posts"><?php

                                    while ( $eh_work_query_latest->have_posts() ) : $eh_work_query_latest->the_post(); ?>

                                        <a <?php post_class( 'bigpost_c div2c' ); ?> href="<?php echo esc_url( $work_post_link ); ?>">
                                            <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                            <div>
                                                <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                <p><?php echo $work_post_content; ?></p>
                                            </div>
                                        </a><?php 
                                    
                                    endwhile; ?>


                                    <div class="div2c"><?php 
                                    
                                        while ( $eh_work_query->have_posts() ) : $eh_work_query->the_post(); ?>

                                            <a class="rht_post" href="<?php echo esc_url( $work_post_link ); ?>">
                                                <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                                <div>
                                                    <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                    <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                    <p><?php //echo $work_post_content; ?></p>
                                                    <p><?php echo $work_post_content; ?></p>
                                                </div>
                                            </a><?php 

                                        endwhile; ?>

                                    </div>

                                </div>

                            </div>

                        </section><?php
                    
                    else: ?>

                        <section id="cat_d-<?php echo $term->slug; ?>" class="cat_det">
                            <div class="wrp_1320">
                                <div class="cd_head dflex_c">
                                    <div class="cd_nameico"><?php

                                        $image = get_field('image', $term->taxonomy . '_' . $term->term_id ); 

                                        if( $image ) : ?>

                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['title'] ); ?>"><?php

                                        endif; ?>

                                        <h3><?php echo esc_html( $term->name ); ?></h3>
                                        
                                    </div>
                                    <div class="cd_shlist">
                                        <ul><?php

                                            $child_category_arg = array( 
                                                'hide_empty'    => false, 
                                                'parent'        => $term->term_id
                                            );
                                            $child_category     = get_terms( $taxonomy, $child_category_arg );

                                            foreach( $child_category as $category ) : ?>

                                                <li><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li><?php

                                            endforeach; ?>

                                        </ul>
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="seeall_btn"><?php echo esc_html_e( 'See all ', 'EvolvingHome' ) . esc_html( $term->name ); ?></a>
                                    </div>
                                </div>
                                <!-- Category Head -->

                                <!-- Posts Style B - STart -->
                                <div class="cdp_sta style_b_posts"><?php

                                    while ( $eh_work_query->have_posts() ) : $eh_work_query->the_post(); ?>

                                        <a <?php post_class( 'cntrpost' ); ?> href="<?php echo esc_url( $work_post_link ); ?>">
                                            <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                            <div>
                                                <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                <p><?php echo $work_post_content; ?></p>
                                            </div>
                                        </a><?php 
                                    
                                    endwhile; ?>

                                </div>
                                <!-- Posts Style B - end -->
                            </div>
                            
                        </section>
                    
                    <?php endif;
                    
                endif;

                wp_reset_postdata();
                
            endforeach; 
            
        endif;
        
    else:

        $eh_category_args   = array(
            'hide_empty'    => false, 
            'parent'        => 0 
        );
        $terms = get_terms( $taxonomy, $eh_category_args ); 

        if ( $terms ) :

            foreach( $terms as $key=>$term ) :
                $args = array(
                    'tax_query' => array( 
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                    'post_type'         => '',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 3,
                    'order'             => 'ASC',
                );

                $eh_work_query = new WP_Query( $args );

                $eh_work_query_latest = new WP_Query( $latest );

                if( $eh_work_query->have_posts() ) :

                    if( is_category( $get_name )  ):
                        echo do_shortcode('[evolvinghome_quick_fix]');
                    endif;

                    if( $key % 2 == 0 ): ?>

                        <section id="cat_d-<?php echo $term->slug; ?>" class="cat_det">

                            <div class="wrp_1320">

                                <div class="cd_head dflex_c">

                                    <div class="cd_nameico"><?php

                                        $image = get_field('image', $term->taxonomy . '_' . $term->term_id ); 

                                        if( $image ) : ?>

                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['title'] ); ?>"><?php
                                        
                                        endif; ?>

                                        <h3><?php echo esc_html( $term->name ); ?></h3>
                                    </div>

                                    <div class="cd_shlist">
                                        
                                        <ul><?php

                                            $child_categry_arg = array( 
                                                'hide_empty'    => false, 
                                                'parent'        => $term->term_id
                                            );
                                            $child_category     = get_terms( $taxonmy, $child_catgory_arg );
                                            
                                            foreach( $child_catgory as $category ) : ?>
                                            
                                                <li><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
                                                <?php

                                            endforeach; ?>
                                        </ul>
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="seeall_btn"><?php echo esc_html_e( 'See all ', 'EvolvingHome' ) . esc_html( $term->name ); ?></a>
                                    </div>

                                </div>
                                <!-- Category Head -->

                                
                                <!-- Posts Style A - STart -->
                                <div class="cdp_sta style_a_posts"><?php

                                    while ( $eh_work_query_latest->have_posts() ) : $eh_work_query_latest->the_post(); ?>

                                        <a <?php post_class( 'bigpost_c div2c' ); ?> href="<?php echo esc_url( $work_post_link ); ?>">
                                            <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                            <div>
                                                <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                <p><?php echo $work_post_content; ?></p>
                                            </div>
                                        </a><?php 
                                    
                                    endwhile; ?>


                                    <div class="div2c"><?php 
                                    
                                        while ( $eh_work_query->have_posts() ) : $eh_work_query->the_post(); ?>

                                            <a class="rht_post" href="<?php echo esc_url( $work_post_link ); ?>">
                                                <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                                <div>
                                                    <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                    <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                    <p><?php echo $work_post_content; ?></p>
                                                </div>
                                            </a><?php 

                                        endwhile; ?>

                                    </div>

                                </div>

                            </div>

                        </section><?php
                    
                    else: ?>

                        <section id="cat_d-<?php echo $term->slug; ?>" class="cat_det">
                            <div class="wrp_1320">
                                <div class="cd_head dflex_c">
                                    <div class="cd_nameico"><?php

                                        $image = get_field('image', $term->taxnomy . '_' . $term->term_id ); 

                                        if( $image ) : ?>

                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['title'] ); ?>"><?php

                                        endif; ?>

                                        <h3><?php echo esc_html( $term->name ); ?></h3>
                                        
                                    </div>
                                    <div class="cd_shlist">
                                        <ul><?php

                                            $child_category_arg = array( 
                                                'hide_empty'    => false, 
                                                'parent'        => $term->term_id
                                            );
                                            $child_catgory     = get_terms( $taxomy, $child_categry_arg );

                                            foreach( $child_category as $category ) : ?>

                                                <li><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li><?php

                                            endforeach; ?>

                                        </ul>
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="seeall_btn"><?php echo esc_html_e( 'See all ', 'EvolvingHome' ) . esc_html( $term->name ); ?></a>
                                    </div>
                                </div>
                                <!-- Category Head -->

                                <!-- Posts Style B - STart -->
                                <div class="cdp_sta style_b_posts"><?php

                                    while ( $eh_query->have_posts() ) : $eh_query->the_post();?>

                                        <a <?php post_class( 'cntrpost' ); ?> href="<?php echo esc_url( $work_post_link ); ?>">
                                            <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_post_title ); ?>">
                                            <div>
                                                <h3><?php echo esc_html( $work_post_title ); ?></h3>
                                                <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                                <p><?php echo $work_post_content; ?></p>
                                            </div>
                                        </a><?php 
                                    
                                    endwhile; ?>

                                </div>
                                <!-- Posts Style B - end -->
                            </div>
                            
                        </section>
                    
                    <?php endif;
                    
                endif;

                wp_reset_postdata();
                
            endforeach; 
            
        endif;
    
    endif;
    
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

/**
 * Generate Shortcode for Newsletter section which is repeatedly used on every page
 */
add_shortcode( 'evolvinghome_newsletter', 'eh_newsletter_section' );

function eh_newsletter_section( ){

    ob_start(); ?>

    <section class="ftrcta">
        <div class="wrp_1320 dflex_c">
            <div class="ctleft"><?php

                if ( is_active_sidebar( 'newsletter' ) ) :
                    dynamic_sidebar( 'newsletter' );
                endif; ?>
                <div class="frmcode"><?php 
                    echo do_shortcode( '[contact-form-7 id="477" title="Newsletter"]' ) ?>
                </div>
            </div>
            <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/cta_image.svg'; ?>" alt="">
        </div>
    </section><?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

/**
 * Get the Contact Form
 */
add_shortcode( 'evolvinghome_contact_newsletter', 'eh_newsletter_contact_form_newsletter' );

function eh_newsletter_contact_form_newsletter( ){

    ob_start(); ?>

    <div class="frmcode"><?php
        //Contact form 7 Shortcode
        echo do_shortcode( '[contact-form-7 id="477" title="Newsletter"]' ) ?>
    </div><?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

/**
 * Create shortcode for Quick Fix Section which is exist in Work Details page
 */
add_shortcode( 'evolvinghome_quick_fix', 'quick_fix_function' );

function quick_fix_function( ){

    ob_start(); ?>

    <section id="" class="cat_det">
        <div class="wrp_1320">
            <div class="cd_head dflex_c">
                <div class="cd_nameico">
                    <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/electrical_ico.svg' ?>" alt="<?php echo esc_attr( $archive_template_name ); ?>">
                    <h3><?php esc_html_e( 'Quick Fix', 'EvolvingHome' ); ?></h3>
                </div>
            </div><?php

            $args = array(
                'post_type'         => '',
                'posts_per_page'    => 4,
                'orderby'           => '',
                'order'             => '',
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) : ?>

                <div class="cdp_sta style_d_posts">
                    <div class="div2c"><?php

                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <a class="f4c_post" href="<?php echo esc_url( $work_archive_post_link ); ?>">
                                <div>
                                    <h3><?php echo esc_html( $work_archive_post_title ); ?></h3>
                                    <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                    <p><?php echo $work_archive_post_content; ?></p>

                                </div>
                            </a>

                        <?php endwhile; ?>

                    </div>

                </div><?php 
            
            endif; 
            
            wp_reset_postdata(); ?>

        </div>
        
    </section>
    
    <?php $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
 
/**
 * Add Breadcrumb by using Yoast Plugin
 */
add_shortcode( 'evolvinghome_breadcrumb', 'evolvinghome_bread_crumb' );

function evolvinghome_bread_crumb( ) {

    ob_start();

    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }

    $output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}

/**
 * Generate Shortcode for Related posts which is exist in Work Details page at bottom
 */
add_shortcode( 'evolvinghome_you_may_also_like', 'evolvinghome_related_post' );

function evolvinghome_related_post( ) {

    ob_start(); ?>

    <section id="cat_d-ventilation" class="cat_det">

        <div class="wrp_1320">
            <div class="cd_head dflex_c">
                <div class="cd_nameico">
                    <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/ventilation_ico.svg' ?>" alt="<?php echo esc_attr_e( 'You may also like', 'EvolvingHome' ); ?>">
                    <h3><?php echo esc_html_e( 'You may also like', 'EvolvingHome' ); ?></h3>
                </div>
            </div>
            <!-- Category Head -->

            <!-- Posts Style B - STart --><?php
            $exclude_ids = get_the_ID();
            $args = array(
                'post_type'         => '',
                'posts_per_page'    => 3,
                'orderby'           => 'date',
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) : ?>

                <div class="cdp_sta style_b_posts"><?php

                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        
                        <a <?php post_class( 'cntrpost' ); ?> href="<?php echo esc_url( $work_single_post_link ); ?>">
                            <img src="<?php echo esc_url( $work_thumbnail ); ?>" alt="<?php echo esc_attr( $work_single_post_title ); ?>">
                            <div>
                                <h3><?php echo esc_html( $work_single_post_title ); ?></h3>
                                <div class="auth_det"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span></div>
                                <p><?php echo $work_single_post_content; ?></p>
                            </div>
                        </a>
                    <?php endwhile; ?>
            
                </div><?php
            
            endif;
            wp_reset_postdata(); ?>

        </div>

    </section><?php

    $output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
