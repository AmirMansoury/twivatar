<?php

function twivatar() {
	// Config
	$baseURL = "http://mydomain.com";
	
	// Get username and size of the avatar.
	$screenName = strip_tags($_GET['screen_name']);
	$size = strip_tags($_GET['size']);
	
	$originAvatar = "http://api.twitter.com/1/users/profile_image?screen_name={$screenName}&size={$size}";

	$storedAvatar = "avatars/{$screenName}_{$size}.png";
	
	// If the avatar was not exists, then we save it.
	if( !@file_exists($storedAvatar) ) {
		@copy($originAvatar, "avatars/{$screenName}_{$size}.png");
	}
	
	$userAvatar = "{$baseURL}/twivatar/avatars/{$screenName}_{$size}.png";
	
	header('Content-Type: image/png');
	@readfile($userAvatar);
}

return twivatar();

?>
