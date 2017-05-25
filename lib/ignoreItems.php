<?php

function ignoreItems(){
	include_once('markPostAsIgnored.php');
	query_posts( array( 'post_type' => 'daily', 'posts_per_page' => 1000 ) );
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$postid = get_the_ID();	
	markPostAsIgnored($postid);
	endwhile;
	endif;
	wp_reset_query();
}