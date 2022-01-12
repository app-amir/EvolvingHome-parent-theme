<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

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

				<div class="content_pst"><?php
					the_content(); ?>
				</div>

			</div>
		</section><?php
	
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile;

get_footer();
