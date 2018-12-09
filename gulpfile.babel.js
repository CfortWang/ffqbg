'use strict';
//공통 module
import gulp from 'gulp';
import cache from "gulp-cached";
import gutil from 'gulp-util';
import reload from "gulp-livereload";

//js module
import sourcemaps from "gulp-sourcemaps";
import concat from "gulp-concat";
import uglify from "gulp-uglify";

//css module
import sass from "gulp-sass";
import cleanCss from "gulp-clean-css";

//img module
import imagemin from "gulp-imagemin";

const dirs = {
    src: "resources/assets",
    dist: "public"
};

const paths = {
    sass: {
        src: `${dirs.src}/sass/`,
        plugins: `${dirs.src}/sass/plugins`,
        dist: `${dirs.dist}/css`
    },
    js: {
        src: `${dirs.src}/js/`,
        dist: `${dirs.dist}/js`
    },
    image: {
        src: `${dirs.src}/img/**/*`,
        dist: `${dirs.dist}/img/`
    },
    vendor: {
        src: `${dirs.src}/vendor/`
    }
};

//gulp.task('default', () => {
//    return gutil.log('Gulp is running');
//});

gulp.task("sass", () => {
    return gulp.src([
            paths.sass.src + 'app.scss',
            paths.sass.src + 'custom.css'
        ])
        .pipe(sass())
        .pipe(cleanCss())
        .pipe(gulp.dest(paths.sass.dist));
});

gulp.task("sass-plugins", () => {
    return gulp.src([
            paths.sass.plugins + '/*.css'
        ])
        .pipe(sass())
        .pipe(cleanCss())
        .pipe(gulp.dest(paths.sass.dist + '/plugins'));
});

gulp.task("js", () => {
    return gulp.src([
            paths.vendor.src + "jquery/jquery-3.1.1.min.js",
            paths.vendor.src + "bootstrap/js/bootstrap.js",
            paths.vendor.src + "metisMenu/jquery.metisMenu.js",
            paths.vendor.src + "slimscroll/jquery.slimscroll.min.js",
            paths.vendor.src + "pace/pace.min.js",
            paths.js.src + "app.js"
        ])
        .pipe(sourcemaps.init())
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.js.dist));
});

gulp.task("js-plugins", () => {
    return gulp.src([
            paths.js.src + "plugins/*.js"
        ])
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(gulp.dest(paths.js.dist + '/plugins/'));
});

gulp.task("image", () => {
    return gulp.src(paths.image.src)
        .pipe(cache(
            imagemin([
                imagemin.gifsicle({
                    interlaced: true
                }),
                imagemin.optipng({
                    optimizationLevel: 5
                }),
                imagemin.svgo({
                    plugins: [{
                        removeViewBox: false
                    }]
                })
            ])
        ))
        .pipe(gulp.dest(paths.image.dist));
});

gulp.task("reload", () => {
    return gulp.src("public/index.php")
        .pipe(reload());
});

gulp.task("watch", () => {
    reload.listen();
    gulp.watch(paths.image.src, ['image'], () => {
        gulp.run("reload");
    });
    gulp.watch(`${dirs.src}/sass/**`, ['sass'], () => {
        gulp.run("reload");
    });
    gulp.watch(paths.js.src + '**', ['js'], () => {
        gulp.run("reload");
    });
});
