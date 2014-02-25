# Sapful

I wrote the **S**imple **A**jax **P**HP **F**ile **U**p**l**oader because i needed a modular, yet versatile and dynamic (read: JavaScript) uploader, but the existing solutions were too overpowered for my needs.

# Usage

- Move all files starting with "sapful" into one directory in below you document root.
- Copy sapful.sample.config.php to sapful.config.php and adjust it to your needs.
- Add <?php require('sapful.php'); ?> to you PHP-parsed site.

Now a form will get inserted at the place you `require`d it.

See index.php for a sample including, index.css for a sample styling and htaccess for a sample server configuration.

# What it does

If JavaScript is active in the browser, the Upload gets done via XMLHttpRequest and a progress bar is shown.

Without JavaScript, a normal POST is performed and the progress bar is not available. In that case, a status message is displayed when the page is reloaded after the upload.