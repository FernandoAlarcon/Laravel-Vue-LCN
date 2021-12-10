const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('resources/assets/rubick/src/js/app.js', 'public/js')
   
   .js("resources/assets/rubick/src/js/ckeditor-classic.js",       'public/js')
   .js("resources/assets/rubick/src/js/ckeditor-inline.js",        'public/js')
   .js("resources/assets/rubick/src/js/ckeditor-balloon.js",       'public/js')
   .js("resources/assets/rubick/src/js/ckeditor-balloon-block.js", 'public/js')
   .js("resources/assets/rubick/src/js/ckeditor-document.js",      'public/js')

   .vue()
    //.sass([ 'resources/sass/app.scss', 'resources/assets/rubick/src/sass/app.scss' ], 'public/css');
//    .sass( 'resources/sass/app.scss', 'public/css')
//    .sass( 'resources/assets/rubick/src/sass/app.scss', 'public/css')

    .css( 'resources/assets/css/bootstrap.min.css',      'public/css')
//    .css( 'resources/assets/css/now-ui-kit.css?v=1.3.0', 'public/css')

//    .css( 'resources/assets/demo/demo.css', 'public/css')
   .css( 'resources/assets/rubick/dist/css/app.css', 'public/css')
   
   .options({
        processCssUrls: false,
        postCss: [tailwindcss("./tailwind.config.js")],
    }).autoload({
        "cash-dom": ["cash"],
    })
    .copyDirectory("resources/assets/rubick/src/json", "public/json")
    .copyDirectory("resources/assets/rubick/src/fonts", "public/fonts")
    .copyDirectory("resources/assets/rubick/src/images", "public/images");
    // .browserSync({
    //     proxy: "rubick-html.test",
    //     files: ["src/**/*.*"],
    // });