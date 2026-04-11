<?php

if( isset( $_POST[ 'Upload' ] ) ) {
	// Where are we going to be writing to?
	$target_path  = DVWA_WEB_PAGE_TO_ROOT . "hackable/uploads/";
	$target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );

	// Validate file type and extension
	$allowed_types = array( 'image/jpeg', 'image/png', 'image/gif' );
	$allowed_exts  = array( 'jpg', 'jpeg', 'png', 'gif' );
	$file_type = $_FILES[ 'uploaded' ][ 'type' ];
	$file_ext  = strtolower( pathinfo( $_FILES[ 'uploaded' ][ 'name' ], PATHINFO_EXTENSION ) );

	if( !in_array( $file_type, $allowed_types ) || !in_array( $file_ext, $allowed_exts ) ) {
		$html .= '<pre>Only image files (jpg, png, gif) are allowed.</pre>';
	}
	// Can we move the file to the upload folder?
	else if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $target_path ) ) {
		// No
		$html .= '<pre>Your image was not uploaded.</pre>';
	}
	else {
		// Yes!
		$html .= "<pre>{$target_path} succesfully uploaded!</pre>";
	}
}

?>
