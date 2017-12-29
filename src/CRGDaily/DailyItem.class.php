<?php

namespace CRGDaily;

class DailyItem{
	
	public $ID = NULL;
	public function get_ID(){
		return $this->ID;
	}
	public function set_ID($ID){
		$this->ID = $ID;
	}
	
	public $email = "Fetch pending..";
	public function set_email($email){
		$this->email = $email;
		$ID = $this->ID;
		update_post_meta($ID, 'email', $email);
	}
	
	public $shouldBeIgnored = FALSE;
	public $phoneIsFetched = FALSE;
	
	public $anchorLink;
	public function set_anchorLink($anchorLink){
		$this->anchorLink = $anchorLink;
		$ID = $this->get_ID();
		if(!($ID === NULL)){
			update_post_meta($ID, "anchorLink", $anchorLink);
		}
	}
	use Ability_extractTextFromAnchorLink;
	public function get_title(){
		$anchorLink = $this->anchorLink;
		$title = $this->extractTextFromAnchorLink($anchorLink);
		return $title;
	}
	public function set_title($title){
		$ID = $this->get_ID();
		if(!($ID === NULL)){
			$my_post = array(
					'ID'           => $ID,
					'post_title'   => $title
			);
			
			// Update the post into the database
			wp_update_post( $my_post );
		}
	}
	public function get_anchorLink(){
		return $this->anchorLink;
	}
	public function get_anchorLinkURL(){
		$html = $this->anchorLink;
		preg_match('/href="([^\s"]+)/', $html, $match);
		$URL= $match[1];
		$URL= preg_replace("/^http:/i", "https:", $URL);
		return $URL;
	}
	
	public $phone = FALSE;
	public function set_phone($phone){
		$this->phone = $phone;
	}
	public function get_phone(){
		return $this->phone;
	}
	public function return_fetchThePhoneNumberAnchorLink($ID){
		if($this->phone === FALSE){
			return ("<span><a class = 'next-fetch-clicker' id = 'next-fetch-click-$ID' href = '/wp-admin/admin.php?page=Daily%2Flib%2FCraigslistAdminPage.class.php&fetch-phone-number=$ID'>Fetch pending...</a></span>");
		}else{
			return ($this->phone);
		}	
}
	public function get_phoneIsFetched(){
		return ($this->phoneIsFetched);
	}
	public function set_phoneIsFetched($bool){
		$ID = $this->ID;
		update_post_meta($ID, 'phoneIsFetched', $bool);
		$this->phoneIsFetched = $bool;
	}
	public function return_itemHTML(){
		$ID = $this->ID;
		$anchorLink = $this->get_anchorLink();
		$email = $this->email;
		$fetchThePhoneNumberAnchorLink = $this->return_fetchThePhoneNumberAnchorLink($ID);
		
		$output = 
<<<OUTPUT
<div id = 'item-number-$ID' class = 'daily-anchor-list'>
	$anchorLink
	<br />
	<form method = 'post'>
		<input type = 'button' id = 'clear-item-number-$ID' class = 'daily-anchor-clear-button' value = 'IGNORE' />
		<input type = 'button' id = 'email-item-number-$ID' class = 'daily-emailt-item-button' value = 'Email' />
		<input type = 'text' name = 'craigslist-send-email' id = 'craigslist-send-email-text-box-$ID' class = 'email-text-box' placeholder = 'Enter email' />
		&nbsp; Email: $email &nbsp;&nbsp;&nbsp;&nbsp; Phone: $fetchThePhoneNumberAnchorLink
		<div id = 'email-message-$ID' style = 'display:none;' >
			<select id='email-title-$ID'>
				<option value='temp1'>Freelance American Developer</option>
				<option value='temp2'>Freelance American Content Writers</option>
				<option value='temp3'>test_email3</option>
				<option value='temp4'>test_email4</option>
				<option value='temp5'>test_email5</option>
			</select>
		<a id='mailto-$ID' href=''>Email This</a><br/>
		<textarea name='email-message' id='email-message-area-$ID' rows='15' cols='100'></textarea>
		</div>
		<br /><br />
	</form>
</div>
OUTPUT;
		return $output;
	}
	
	public function fetchDataFromDB($ID){
		//this function takes the ID, and pulls the data from the Wordpress DB, then
		//stores the data in this object
		$this->ID = $ID;
		$anchorLink = get_post_meta($ID, 'anchorLink');
		if (isset($anchorLink[0])){
			$this->anchorLink = $anchorLink[0];
		}
		$phone = get_post_meta($ID, 'phone');
		if (isset($phone[0])){
			$this->phone = $phone[0];
		}
		
		$email = get_post_meta($ID, 'email', TRUE);
		if (isset($email)){
			$this->email = $email;
		}
		$phoneIsFetched = get_post_meta($ID, 'phoneIsFetched', TRUE);
		if (isset($phoneIsFetched)){
			if ($phoneIsFetched === "TRUE"){$this->phoneIsFetched = TRUE;}
			if ($phoneIsFetched === "FALSE"){$this->phoneIsFetched = FALSE;}
		}
	}
	
	public function initializeDBrecordForThisObject($anchorLink){
		// Create post object
		$my_post = array(
				'post_title'=> "TEMPORARY TITLE",
				'post_content'  => 'This is a CL post',
				'post_status'   => 'draft',
				'post_type'		=> 'daily'
		);

		// Insert the post into the database
		$ID = wp_insert_post( $my_post );
		$this->set_ID($ID);
		$this->set_anchorLink($anchorLink);
		$title = $this->get_title();
		$my_post = array(
				'ID'		   => $ID,
				'post_title' => $title,
				'post_content' => "This is a CL Daily post.
$anchorLink"
		);
		
		// Update the post into the database
		wp_update_post( $my_post );
		$this->set_title($title);
	}
	
	public function dailyItemDBpropertySetter($property, $value){}
	
	public function __construct($anchorLinkOrID = NULL){
		// When a DailyItem is initialized, if an ID is passed, it pulls the 
		// data from the DB. If an anchorLink is passed, it creates a new record
		if (!($anchorLinkOrID === NULL)){
			//something has been passed
			if (is_numeric($anchorLinkOrID)){
				//that something is a number
				$ID = $anchorLinkOrID;
				$this->fetchDataFromDB($ID);
			   }else{
			   	//that something isn't a number, assume it's a link [todo: validation]
				$anchorLink = $anchorLinkOrID;
				$this->initializeDBrecordForThisObject($anchorLink);
			 }
		}
	}
}