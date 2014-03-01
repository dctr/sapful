<?php
  // Path to where the uploaded files should be stored.
  // Ensure, that the http process has write permissons here.
  define('SAPFUL_DESTDIR', '/var/local/lib/sapful');

  // Name of the php script, in which the upload should be handed.
  // Can be 'filename.php' or &$_SERVER['PHP_SELF'] (same script as download).
  define('SAPFUL_UL_HANDLER', &$_SERVER['PHP_SELF']);

  // Maximum file size in byte declared in the HTML.
  // Ensure, that php's file size limit is at least this value (maybe through htaccess).
  define('SAPFUL_MAX_FILE_SIZE', 100000000);

  // Localization of information strings.
  define('SAPFUL_CANCLED', 'Cancled.');
  define('SAPFUL_ERROR', 'Error!');
  define('SAPFUL_FINISHED', 'Finished!');
  define('SAPFUL_UPLOADING', 'Uploading...');
  define('SAPFUL_READY', 'Ready!');
?>
