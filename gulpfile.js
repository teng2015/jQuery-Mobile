/*
 * @Author: jiajin
 * @Date:   2015-12-21 14:57:07
 * @Last Modified by:   Jaylon
 * @Last Modified time: 2016-02-15 15:15:31
 * npm install gulp-sourcemaps gulp-sass browser-sync gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-clean gulp-notify gulp-rename gulp-livereload gulp-cache --save-dev
 */


var gulp = require('gulp'),
  browserSync = require('browser-sync').create();

var sass = require('gulp-sass');








// 预设任务，执行清理后，

gulp.task('sass', function () {
  return gulp.src('*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('*.scss', ['sass']);
});



gulp.task('default', function() {
  gulp.start('sass','sass:watch','watch');
});

// 文档临听
gulp.task('watch', function() {
    browserSync.init({
server: {
            baseDir: "./"
        }
  });

  // 创建实时调整服务器 -- 在项目中未使用注释掉
  gulp.watch(['**/*.css', '**/*.html', '*.js']).on('change', browserSync.reload);

});

