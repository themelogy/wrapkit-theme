'use strict';

const gulp      = require('gulp'),
    shell       = require('gulp-shell'),
    sass        = require('gulp-sass'),
    clean       = require('gulp-clean'),
    del         = require('del'),
    concat      = require('gulp-concat'),
    browserSync = require('browser-sync').create(),
    runSequence = require('run-sequence'),
    sourcemaps  = require('gulp-sourcemaps'),
    minify      = require('gulp-minify'),
    less        = require('gulp-less'),
    minifyCss   = require('gulp-minify-css'),
    merge       = require('merge-stream'),
    themeInfo   = require('./theme.json');

let path, theme, assets, resource = {};

path = {
    "public"      : "../../public",
    "theme"       : "../../public/themes/" + themeInfo.name.toLowerCase(),
    "assets"      : "assets",
    "resource"    : "resources",
    "css"         : "/css",
    "js"          : "/js",
    "sass"        : "/sass",
    "video"       : "/videos",
    "image"       : "/images",
    "fonts"       : "/fonts",
    "vendor"      : "/vendor",
    "maps"        : "../maps"
};

theme = {
    "name"      : themeInfo.name,
    "path"      : path.theme,
    "js"        : path.theme + path.js,
    "css"       : path.theme + path.css,
    "maps"      : path.maps
};

assets = {
    "path"      : path.assets,
    "css"       : path.assets + path.css,
    "js"        : path.assets + path.js,
    "image"     : path.assets + path.image,
    "video"     : path.assets + path.video,
    "vendor"    : path.assets + path.vendor,
    "maps"      : path.maps
};

resource = {
    "path"      : path.resource,
    "vendor"    : path.resource + path.vendor,
    "extVendor" : path.resource + '/ext-vendor',
    "assets"    : path.resource + '/' + path.assets
};

resource.asset = {
    "css"       : resource.assets + path.css,
    "js"        : resource.assets + path.js,
    "image"     : resource.assets + path.image,
    "video"     : resource.assets + path.video,
    "vendor"    : resource.assets + path.vendor,
    "sass"      : resource.assets + path.sass,
    "fonts"     : resource.assets + path.fonts,
    "maps"      : path.maps
};

let vendorCopy = {
    src: [
        resource.vendor+'/owl.carousel/dist/**',
        resource.vendor+'/flag-icon-css/css/**',
        resource.vendor+'/flag-icon-css/flags/**',
        resource.vendor+'/jquery/dist/**',
        resource.vendor+'/bootstrap/dist/**',
        resource.vendor+'/bootstrap-select/dist/**',
        resource.vendor+'/gsap/src/minified/**',
        resource.vendor+'/aos/dist/**',
        resource.vendor+'/smartmenus/dist/**',
        resource.vendor+'/glyphicons/styles/**',
        resource.vendor+'/glyphicons/fonts/**',
        resource.extVendor+'/bootstrap-touch-slider/**',
        resource.extVendor+'/revolution/**',
        resource.vendor+'/fontIconPicker/**',
        resource.vendor+'/lightbox2/dist/**',
        resource.vendor+'/font-awesome/web-fonts-with-css/webfonts/**'
    ],
    dest: [
        resource.asset.vendor+'/owl.carousel',
        resource.asset.vendor+'/flag-icon-css/css',
        resource.asset.vendor+'/flag-icon-css/flags',
        resource.asset.vendor+'/jquery',
        resource.asset.vendor+'/bootstrap',
        resource.asset.vendor+'/bootstrap-select',
        resource.asset.vendor+'/tweenmax',
        resource.asset.vendor+'/aos',
        resource.asset.vendor+'/smartmenus',
        resource.asset.vendor+'/glyphicons/styles',
        resource.asset.vendor+'/glyphicons/fonts',
        resource.asset.vendor+'/bootstrap-touch-slider',
        resource.asset.vendor+'/revolution',
        resource.asset.vendor+'/fonticonpicker',
        resource.asset.vendor+'/lightbox2',
        resource.asset.fonts+'/fontawesome'
    ]
};

gulp.task('sass', function () {
    return gulp.src([
        resource.asset.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(resource.asset.maps))
        .pipe(gulp.dest(resource.asset.css))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('sass-public', function () {
    return gulp.src([
        resource.asset.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(theme.maps))
        .pipe(gulp.dest(theme.css))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('revolution.combine', function() {
    return gulp.src([
        resource.extVendor + "/revolution/js/jquery.themepunch.tools.min.js",
        resource.extVendor + "/revolution/js/jquery.themepunch.revolution.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.actions.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.carousel.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.kenburn.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.migration.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.navigation.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.parallax.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.slideanims.min.js",
        resource.extVendor + "/revolution/js/extensions/revolution.extension.video.min.js"
    ])
        .pipe(minify())
        .pipe(concat('jquery.revolution.min.js'))
        .pipe(gulp.dest(resource.extVendor+"/revolution/js"));
});

gulp.task('clear-vendor', function(){
    return del(resource.asset.vendor+"/**/*", {force: true});
});

gulp.task('vendor-copy', function () {
   for (let i = 0; i < vendorCopy.src.length; i++) {
       gulp.src(vendorCopy.src[i])
           .pipe(gulp.dest(vendorCopy.dest[i]));
   }
   return;
});

gulp.task('scripts', function(){
    del(resource.asset.js+'/custom.min.js',{force:true});
    return gulp.src(resource.asset.js+'/custom.js')
        .pipe(minify({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(gulp.dest(resource.asset.js));
});


gulp.task('scripts-copy', ['scripts'], function(){
    return gulp.src(resource.asset.js+'/**/*')
        .pipe(gulp.dest(theme.js))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('clear-assets', function(){
    return del(assets.path+"/**/*", {force: true});
});

gulp.task('copy', ['clear-assets'], function () {
    return gulp.src(resource.assets+'/**/*')
        .pipe(gulp.dest(assets.path));
});

gulp.task('stylistPublish', function(){
    return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + theme.name));
});

gulp.task('clear-public', function(){
    return del(theme.path+"/**/*", {force: true});
});

gulp.task('production', ['clear-public'], function(){
    runSequence('sass', 'scripts', 'vendor-copy', 'copy', 'stylistPublish');
});

// Configure the proxy server for livereload
var proxyServer = "http://dev.netgd.com";

var arrAddFiles = [
    'views/**/*.php'
];

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: proxyServer,
        files: arrAddFiles,
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: true,
        open: false
    });
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch([resource.asset.sass + '/**/*.scss'], ['sass-public']);
    gulp.watch([resource.asset.js + '/**/*.js'], ['scripts-copy']);
    gulp.watch('views/**/*.php', browserSync.reload);
});