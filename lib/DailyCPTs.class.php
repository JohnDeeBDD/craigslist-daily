<?php

namespace CRG_Daily;

//This class creates the CPTs for the Daily type:

class DailyCPTs{
	
	public $pluginDirectory; 
	public function __construct() {
		$this->pluginDirectory = plugin_dir_url(dirname( __FILE__ ));
		add_action( 'init', array( $this, 'create_taxonomies' ) );
		add_action('init', array( $this, 'createDailyCustomPostType' ) );
	} 
	public function activate() {
		$this->create_taxonomies();

	}
	function create_taxonomies() {
		$Daily_type_args = array( 
			'hierarchical' => true,  
			'labels' => array(
				'name'=> _x('Daily Types', 'taxonomy general name' ),
				'singular_name' => _x('Daily Type', 'taxonomy singular name'),
				'search_items' => __('Search Daily Types'),
				'popular_items' => __('Popular Daily Types'),
				'all_items' => __('All Daily Types'),
				'edit_item' => __('Edit Daily Type'),
				'edit_item' => __('Edit Daily Type'),
				'update_item' => __('Update Daily Type'),
				'add_new_item' => __('Add New Daily Type'),
				'new_item_name' => __('New Daily Type Name'),
				'separate_items_with_commas' => __('Seperate Daily Types with Commas'),
				'add_or_remove_items' => __('Add or Remove Daily Types'),
				'choose_from_most_used' => __('Choose from Most Used Daily Types')
			),
			'query_var' => true,  
            		'rewrite' => array('slug' =>'Daily-type')        
           	);
		register_taxonomy('Daily-type', 'Daily',$Daily_type_args);
	}
	function createDailyCustomPostType(){
		//$menu_icon = $this->pluginDirectory . "/assets/images/Daily.gif";
		$labels = array(
			'name'                => _x( 'Dailys', 'Post Type General Name', 'crg_text_domain' ),
			'singular_name'       => _x( 'Daily', 'Post Type Singular Name', 'crg_text_domain' ),
			'menu_name'           => __( 'Dailys', 'crg_text_domain' ),
			'parent_item_colon'   => __( 'Parent Daily:', 'crg_text_domain' ),
			'all_items'           => __( 'All Dailys', 'crg_text_domain' ),
			'view_item'           => __( 'View Daily', 'crg_text_domain' ),
			'add_new_item'        => __( 'Add New Daily', 'crg_text_domain' ),
			'add_new'             => __( 'Add New', 'crg_text_domain' ),
			'edit_item'           => __( 'Edit Daily', 'crg_text_domain' ),
			'update_item'         => __( 'Update Daily', 'crg_text_domain' ),
			'search_items'        => __( 'Search Daily', 'crg_text_domain' ),
			'not_found'           => __( 'Not found', 'crg_text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'crg_text_domain' ),
		);
		$args = array(
			'label'               => __( 'Daily', 'crg_text_domain' ),
			'description'         => __( 'Dailys', 'crg_text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields'),
			'taxonomies'          => array( 'Daily-type' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			//'menu_icon'           => $menu_icon,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type('Daily', $args);

		wp_insert_term( __('Wordpress'),'Daily-type', array( 'description' => __('A link to a Wordpress ad'),'slug' => 'feature'));
	}
}
?>
