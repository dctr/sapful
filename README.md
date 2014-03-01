# Sapful

I wrote the **S**imple **A**jax **P**HP **F**ile **U**p**l**oader because i needed a modular, yet versatile and dynamic (read: JavaScript) uploader, but the existing solutions were too overpowered for my needs.

# What it does

If JavaScript is active in the browser, the upload gets done via XMLHttpRequest. A progress bar is shown to indicate the upload status.

Without JavaScript, a normal POST is performed and the dynamic progress bar is hidden. In that case, a status message is displayed when the page is reloaded after the upload.

# Usage

- The files starting is "index" contain a usage example.
- Move all files starting with "sapful" into a directory in your document root.
- Copy `sapful.sample.config.php` to `sapful.config.php` and adjust it to your needs.
- Add <?php require('sapful.php'); ?> to you PHP-parsed site.

Now a form will get inserted at the place you `require()`d it.