const mix = require("laravel-mix");
const fs = require("fs");
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

mix

    .react("resources/js/main.js", "public/js")
    .js("resources/js/admin.js", "public/js")
    .sass("resources/sass/app.scss", "public/css");

Mix.listen("build", () => {
    fs.writeFileSync(
        "data.json",
        JSON.stringify(require("laravel-mix/setup/webpack.config.js"))
    );
});
