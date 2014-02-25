<?php
// Load config.
require_once('sapful.config.php');

// Do the magic.
if (isset($_FILES['sapfulUploadFiles'])) {
  // Escape filename.
  $destfile = preg_replace(
    '/[^\w\d _\-]/',
    '_',
    basename($_FILES['sapfulUploadFiles']['name']
  );

  // Move file to destination.
	$success = move_uploaded_file(
    $_FILES['sapfulUploadFiles']['tmp_name'],
    DESTDIR . '/' . $destfile)
  );

	// If the post field "submit" exist, the form was submited directly (not via JS).
	if (isset($_POST['submit'])) {
    // In this case, we need to display the template with the needed status.
    if ($success)
		  $status = SAPFUL_FINISHED;
    else
      $status = SAPFUL_ERROR;

    require_once('sapful.html');
	}
  else {
    // Else we give a JSON response, parsable by JS.
    print('{"sapfulUploadSuccess": ' . ($success?'true':'false') . '}')
  }
}
else {
  // Just load template in ready state.
	$status = SAPFUL_READY;
  require_once('sapful.html');
}
?>
