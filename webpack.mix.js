const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js');

// Combine Admin Css Vendor 
mix.combine([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/ionicons/dist/css/ionicons.min.css',
    'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css',
    'node_modules/sweetalert2/dist/sweetalert2.min.css',
    'node_modules/chosen-js/chosen.css',
    'node_modules/datatables-all/media/css/dataTables.bootstrap.min.css',
    'node_modules/admin-lte/dist/css/AdminLTE.min.css',
    'node_modules/bootstrap-rtl/dist/css/bootstrap-rtl.min.css',
    'node_modules/icheck/skins/square/blue.css',
    'node_modules/admin-lte/dist/css/skins/_all-skins.min.css'
    ], 'public/css/admin-vendor.css')
.version();

// Combine Admin All CSS
mix.combine([
    'public/css/admin-vendor.css',
    'public/css/admin-custom.css',
  ], 'public/css/admin-all.css')
.version();

// Combine Admin JS Vendor
mix.combine([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js',
    'node_modules/datatables-all/media/js/jquery.dataTables.min.js', // not sure
    'node_modules/datatables-all/media/js/dataTables.bootstrap.js',
    'node_modules/sweetalert2/dist/sweetalert2.min.js',
    'node_modules/chosen-js/chosen.jquery.js',
    'node_modules/icheck/icheck.min.js',
    'node_modules/admin-lte/dist/js/app.min.js',
    'node_modules/chart.js/dist/Chart.min.js',
    'node_modules/clipboard/dist/clipboard.min.js',
    // 'node_modules/turbolinks/dist/turbolinks.js',
    ], 'public/js/admin-vendor.js')
.version();

// Combine Admin All CSS
mix.combine([
    'public/js/admin-vendor.js',
    'public/js/admin-custom.js',
  ], 'public/js/admin-all.js')
.version();



// Combine Site Css Vendor 
mix.combine([
  'node_modules/bootstrap/dist/css/bootstrap.min.css',
  'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css',
  'node_modules/font-awesome/css/font-awesome.min.css',
  'node_modules/bootstrap-rtl/dist/css/bootstrap-rtl.min.css',
  ], 'public/css/site-vendor.css')
.version();

// Combine site All CSS
mix.combine([
  'public/css/site-vendor.css',
  'public/css/site-custom.css',
], 'public/css/site-all.css')
.version();

// Combine site JS Vendor
mix.combine([
  'node_modules/jquery/dist/jquery.min.js',
  'node_modules/bootstrap/dist/js/bootstrap.min.js',
  'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js',
  ], 'public/js/site-vendor.js')
.version();

// Combine site All CSS
mix.combine([
    'public/js/site-vendor.js',
    'public/js/site-custom.js',
  ], 'public/js/site-all.js')
.version();


// Copy Fonts
/*mix.copy(
   'node_modules/font-awesome/fonts',
   'public/fonts'
);

// Copy images
mix.copy(
   'node_modules/admin-lte/dist/img',
   'public/img'
);


mix.copy(
   'node_modules/ckeditor/',
   'public/plugins/ckeditor'
);
*/

