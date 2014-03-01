<?php
/**
 * Sapful - Server PHP
 * @author David Christ <dch_dev@genitopia.org>
 * @version 1.1
 */

// Load config.
require_once('sapful.config.php');

// Check if a file was uploaded.
if (isset($_FILES['sapfulUploadFiles'])) {
  // Escape filename. Only allow word, digit, space, underscore, and dash chars.
  $destfile = preg_replace(
    '/[^\w\d _\-]/',
    '_',
    basename($_FILES['sapfulUploadFiles']['name']
  );

  // Move file to destination.
	$success = move_uploaded_file(
    $_FILES['sapfulUploadFiles']['tmp_name'],
    SAPFUL_DESTDIR . '/' . $destfile)
  );

	// If the post field "submit" exist, the submit action of the form triggered
  // the upload instead of the JavaScript.
	if (isset($_POST['submit'])) {
    // In this case, the complete website should be rendered.
    if ($success)
		  $status = SAPFUL_FINISHED;
    else
      $status = SAPFUL_ERROR;

    require_once('sapful.html');
	}
  else {
    // Else we give a JSON response to the XMLHttpRequest.
    print('{"sapfulUploadSuccess": ' . ($success?'true':'false') . '}')
  }
}
else {
  // Display the site with "ready for upload" status.
	$status = SAPFUL_READY;
  require_once('sapful.html');
}
?>
