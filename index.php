<!doctype html>
<!--
Sapful - Usage sample HTML/PHP
@author David Christ <dch_dev@genitopia.org>
@version 1.1
-->
<html>
  <head>
    <link rel="stylesheet" href="index.css" />
    <meta charset="UTF-8" />
    <title>SAPFUL</title>
  </head>
  <body>
    <h1>Welcome to Sapful</h1>
    <p>The <strong>S</strong>imple <strong>A</strong>jax and <strong>P</strong>HP <strong>F</strong>ile <strong>U</strong>p<strong>l</strong>oader uploads any file onto this server's <a href="/files" target="_blank">file storage</a>.</p>
    <?php require_once('sapful.php'); ?>
    <p>If you upload a file named as one already in place, the old one gets overwritten.</p>
  </body>
</html>
