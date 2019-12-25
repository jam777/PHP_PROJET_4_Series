/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../../css/wild_scss/wild_show.scss');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('bootstrap');

console.log('Hello Webpack show.js Encore! Edit me in assets/js/app.js');

$(".description").click(function() {

    let i = $(".description i");

    if (i.hasClass("fa-sort-down")) {
        i.addClass("fa-sort-up");
        i.removeClass("fa-sort-down");
    } else {
        i.addClass("fa-sort-down");
        i.removeClass("fa-sort-up");
    }



});