<?php

//This function accepts a post ID number, and adds the custom field "ShouldBeIgnored". There is no error checking.

function markPostAsIgnored($postID){
    update_post_meta($postID, 'ShouldBeIgnored', true);
}

?>