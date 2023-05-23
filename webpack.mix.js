const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('tailwindcss'),
        ],
    })
    .sourceMaps()
    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css'
    ], 'public/css/bootstrap.css')
    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
    ], 'public/js/bootstrap.js')


if (mix.inProduction()) {
    mix.version();
}
