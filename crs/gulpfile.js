'use strict';

/* пути к исходным файлам (src), к готовым файлам (build), а также к тем, за изменениями которых нужно наблюдать (watch) */
var path_main = {
    build: {
        js: '../App/View/main/assets/js/',
        css: '../App/View/main/assets/css/'
    },
    src: {
        js: 'View/main/assets/js/main.js',
        style: 'View/main/assets/css/main.css'
    }
};

var path_settings = {
    build: {
        js: '../App/View/settings/assets/js/',
        css: '../App/View/settings/assets/css/'
    },
    src: {
        js: 'View/settings/assets/js/main.js',
        style: 'View/settings/assets/css/main.css'
    }
};



/* подключаем gulp и плагины */
var gulp = require('gulp'),  // подключаем Gulp
    webserver = require('browser-sync'), // сервер для работы и автоматического обновления страниц
    plumber = require('gulp-plumber'), // модуль для отслеживания ошибок
    rigger = require('gulp-rigger'), // модуль для импорта содержимого одного файла в другой
    sourcemaps = require('gulp-sourcemaps'), // модуль для генерации карты исходных файлов
    sass = require('gulp-sass'), // модуль для компиляции SASS (SCSS) в CSS
    autoprefixer = require('gulp-autoprefixer'), // модуль для автоматической установки автопрефиксов
    cleanCSS = require('gulp-clean-css'), // плагин для минимизации CSS
    uglify = require('gulp-uglify'), // модуль для минимизации JavaScript
    cache = require('gulp-cache'), // модуль для кэширования
    imagemin = require('gulp-imagemin'), // плагин для сжатия PNG, JPEG, GIF и SVG изображений
    jpegrecompress = require('imagemin-jpeg-recompress'), // плагин для сжатия jpeg	
    pngquant = require('imagemin-pngquant'), // плагин для сжатия png
    del = require('del'), // плагин для удаления файлов и каталогов
    rename = require('gulp-rename');

/* задачи */



// сбор стилей main
gulp.task('css:build_main', function () {
    return gulp.src(path_main.src.style) // получим main.scss
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(sourcemaps.init()) // инициализируем sourcemap
        .pipe(sass()) // scss -> css
        .pipe(autoprefixer()) // добавим префиксы
        .pipe(gulp.dest(path_main.build.css))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS()) // минимизируем CSS
        .pipe(sourcemaps.write('./')) // записываем sourcemap
        .pipe(gulp.dest(path_main.build.css)) // выгружаем в build
        .pipe(webserver.reload({ stream: true })); // перезагрузим сервер
});

// сбор js main
gulp.task('js:build_main', function () {
    return gulp.src(path_main.src.js) // получим файл main.js
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(rigger()) // импортируем все указанные файлы в main.js
        .pipe(gulp.dest(path_main.build.js))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.init()) //инициализируем sourcemap
        .pipe(uglify()) // минимизируем js
        .pipe(sourcemaps.write('./')) //  записываем sourcemap
        .pipe(gulp.dest(path_main.build.js)) // положим готовый файл
        .pipe(webserver.reload({ stream: true })); // перезагрузим сервер
});







// сбор стилей main
gulp.task('css:build_settings', function () {
    return gulp.src(path_settings.src.style) // получим main.scss
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(sourcemaps.init()) // инициализируем sourcemap
        .pipe(sass()) // scss -> css
        .pipe(autoprefixer()) // добавим префиксы
        .pipe(gulp.dest(path_settings.build.css))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS()) // минимизируем CSS
        .pipe(sourcemaps.write('./')) // записываем sourcemap
        .pipe(gulp.dest(path_settings.build.css)) // выгружаем в build
        .pipe(webserver.reload({ stream: true })); // перезагрузим сервер
});

// сбор js main
gulp.task('js:build_settings', function () {
    return gulp.src(path_settings.src.js) // получим файл main.js
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(rigger()) // импортируем все указанные файлы в main.js
        .pipe(gulp.dest(path_settings.build.js))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.init()) //инициализируем sourcemap
        .pipe(uglify()) // минимизируем js
        .pipe(sourcemaps.write('./')) //  записываем sourcemap
        .pipe(gulp.dest(path_settings.build.js)) // положим готовый файл
        .pipe(webserver.reload({ stream: true })); // перезагрузим сервер
});











// сборка
gulp.task('build',
    gulp.series(
        gulp.parallel(
            'css:build_main',
            'js:build_main',
            'css:build_settings',
            'js:build_settings'
        )
    )
);



// задача по умолчанию
gulp.task('default', gulp.series(
    'build'     
));
