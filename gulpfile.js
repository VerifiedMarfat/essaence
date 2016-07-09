'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    sourcemaps = require('gulp-sourcemaps'),
    imageOptim = require('gulp-imageoptim'),
    browserify = require('gulp-browserify'),
    livereload = require('gulp-livereload');

livereload({ start: true })


gulp.task('styles', function () {
    return gulp.src('./src/sass/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./wordpress/wp-content/themes/token/library/css'));
});

gulp.task('scripts', function() {
    gulp.src('./src/js/app.js')
        .pipe(sourcemaps.init())
        .pipe(browserify({
            insertGlobals : true,
            debug : !gulp.env.production
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./wordpress/wp-content/themes/token/library/js'))
});

gulp.task('images', function() {
    return gulp.src('./src/images/**/*')
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest('./wordpress/wp-content/themes/token/library/images'));
});

gulp.task('fonts', function() {
   gulp.src('./src/fonts/**/*')
    .pipe(gulp.dest('./wordpress/wp-content/themes/token/library/fonts'));

});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./src/js/**/*.js', ['scripts']);
    gulp.watch('./src/sass/**/*.scss', ['styles']);
    gulp.watch('./src/images/**/*', ['images']);
    gulp.watch('./src/fonts/**/*', ['fonts']);
});


gulp.task('default', ['styles', 'scripts', 'images', 'fonts', 'watch']);
