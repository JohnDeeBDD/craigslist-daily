<?php

namespace CRGDaily;

class LiveDailyCounter{
	
	public function returnNumberOfLiveDailys(){
		global $wpdb;
		global $post;
		$str = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE post_type = 'daily'";
		$result = $wpdb->get_results($str);
		$numberOfLiveDailys = 0;
		foreach($result as $post):
			setup_postdata($post);
			//the_permalink();
			//the_title();
			$ID = get_the_ID();
			$ShouldBeIgnored = get_post_meta($ID, 'ShouldBeIgnored', TRUE);
			if (!($ShouldBeIgnored === '1')){
				$numberOfLiveDailys = $numberOfLiveDailys + 1;
			}
		endforeach;
		//wp_reset_query();
		
		return $numberOfLiveDailys;
	}
}