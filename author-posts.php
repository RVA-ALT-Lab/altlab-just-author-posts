<?php 

/*
Plugin Name: ALT Lab - Show Authors Only Their Own Posts
Plugin URI: 
Description: In a site with multiple authors restricts the posts view to only posts they wrote
Author: Tom Woodward
Version: 1.5
Author URI: http://bionicteaching.com/
*/

function posts_for_current_author($query) {
    global $pagenow;
 
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
 
    if( !current_user_can( 'edit_others_posts' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');