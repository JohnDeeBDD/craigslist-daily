<?php

function clearDatabaseOf1000DailyTypes(){
	query_posts( array( 'post_type' => 'daily', 'posts_per_page' => 1000 ) );
  		if ( have_posts() ) : while ( have_posts() ) : the_post();
			    $postid = get_the_ID();
			    wp_delete_post( $postid, true);
			endwhile; 
		endif;
	wp_reset_query();
}