// webpack.mix.js

let mix = require('laravel-mix');

mix.disableSuccessNotifications();

// Compile
mix.js('src/js/blocks.js', 'js')
.js('src/js/front.js', 'js')
.sass('src/scss/blocks.scss', 'css')
.sass('src/scss/editor.scss', 'css')
.setPublicPath('assets');

// Minify
mix.minify('assets/js/blocks.js');
mix.minify('assets/js/front.js');
mix.minify('assets/css/blocks.css');
mix.minify('assets/css/editor.css');