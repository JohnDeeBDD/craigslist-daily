<?php


//This is the page that pops up when logged in as an administrator in Wordpress:
class  CraigslistAdminPage{

	//An item is added to the admin area, which can be clicked:
	function __construct(){
		add_action('init', array( $this, 'checkForAdmindOrEditor' ) );
	}
	
	public function checkForAdmindOrEditor(){
		if( current_user_can('edit_others_pages') ){
			add_action( 'admin_menu', array( $this, 'CraigslistMenuItem' ) );
		}
	}
	
	//The hook to actually run the plugin:
	public function CraigslistMenuItem(){
		$slug = plugin_basename( __FILE__ );
		add_menu_page( "CL Scrape", "CL Scrape", 'delete_posts', $slug, array($this, 'doAdminPage') );
	}
	
	//This method actually does the admin page.
	public function doAdminPage(){
		include_once('DailyOutputView.class.php');
		$DailyOutputView = new DailyOutputView();
		$output = $DailyOutputView->getHTML();
		
		//Prints out the HTML into the output buffer:
		echo $output;
	}
	
}