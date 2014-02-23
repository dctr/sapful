<?php
require_once('sapful.config.php');

if (isset($_FILES['sapfulUploadFiles'])) {
	// todo: verify file name for bad chars
	move_uploaded_file($_FILES['sapfulUploadFiles']['tmp_name'], DESTDIR . basename($_FILES['sapfulUploadFiles']['name']));

	// If the post field exist, the form was submited directly (not with AJAX) and a redirect to page should be done.
	if (isset($_POST['submit'])) {
		$status = 'Done';
		require('sapful.html');
	}
}
else {
	$status = 'Ready';
	require('sapful.html');
}
?>
