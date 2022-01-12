<?php get_header(); 

$work_category_name	        = $queried_object->name;
$get_category_description   = $queried_object->description;
!($get_category_description) ? $get_category_description : "";
$get_category               = $queried_object->slug;
$taxonomy                   = $queried_object->taxonomy;
$get_category_id            = $queried_object->term_id;  
$term_id_prefixed           = $taxonomy .'_'. $get_category_id;
$hero_image                 = get_field( 'hero_image', $term_id_prefixed );
$category_underneath_desc   = get_field( 'category_description', $term_id_prefixed );  ?>

<style>

    .hero_def:after { <?php
        if ( $hero_image ) : ?>
            background-image: url(<?php echo esc_url( $hero_image['url'] ); ?>);<?php
        endif; ?>
    }
    
</style>

<section class="hero_def hero_abt arch_hero">
    <div class="wrp_1320 dflex_r">
        <div>
            <h2><?php echo esc_html( $work_category_name ); ?></h2>
            <?php echo wpautop( $get_category_description ); ?>
        </div>
    </div>
</section>

<section class="arch_sec1">

    <ul class="catg_list"><?php

        $term_args	= array(
            'hide_empty'    => false, 
            'parent'        => 0,
            'exclude' 	    =>	array( $get_category_id, 1 ),
            'orderby'       => 'name',
            'order'         => 'ASC'
        );
        $terms		= get_terms( $taxonomy, $term_args ); 
       
        foreach( $terms as $term ) :

            $image = get_field('image', $term->taxonomy . '_' . $term->term_id ); ?>

            <li>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php
                if( $image ) :?>

                    <div style="background-image:url(<?php echo esc_url( $image['url'] ); ?>);"></div><?php

                endif; ?>
                    <p><?php echo esc_html( $term->name ); ?></p>
                </a>
            </li><?php

        endforeach; ?>

    </ul>

    <div class="wrp_1320"><?php
        if( $category_underneath_desc ): ?>
            <p><?php echo esc_html( $category_underneath_desc ); ?></p><?php
        endif; ?>
    </div>


</section><?php

get_footer(); ?> 