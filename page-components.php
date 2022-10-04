<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<!-- React JS -->
<script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
<section id="app"></section>


<!-- Don't use this in production: -->
<script src="https://unpkg.com/@babel/standalone@7.17.9/babel.min.js"></script>

<script type="text/babel" data-presets="react" data-type="module" src="<?php echo get_stylesheet_directory_uri() ?>/yc_custom/ReactJS/index.js"></script>


<?php get_footer();
