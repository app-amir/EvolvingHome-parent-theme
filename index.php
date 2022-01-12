<?php
/**
 * The main template file
*/
get_header();

if ( have_posts() ) { ?>

    <section class="hero_def hero_abt"> 
        <div class="wrp_1320 dflex_r">
            <div>
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </section><?php

    while ( have_posts() ) :
        the_post(); ?>
        
        <section>
            <div class="wrp_1320 dflex_c">

                <div class="content_pst">
                </div>

            </div>
        </section><?php
        
    endwhile;
} else { ?>
    <h2><?php esc_html_e( 'Nothing here', 'EvolvingHome' ); ?></h2>
<?php }

get_footer();