<?php
  // Path to where the uploaded files should be stored.
  // Ensure, that the http process has write permissons here.
  define('DESTDIR', '/path/to/files/');

  // Name of the php script, in which the upload should be handed.
  // Can be 'filename.php' or &$_SERVER['PHP_SELF'] (same script as download).
  define('UL_HANDLER', &$_SERVER['PHP_SELF']);

  // Maximum file size in byte declared in the HTML.
  // Ensure, that php's file size limit is at least this value (maybe through htaccess).
  define('MAX_FILE_SIZE', 100000000);
?>
