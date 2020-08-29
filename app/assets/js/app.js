/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import '../css/app.scss'
import '../css/dashboard.scss'


const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

var dashboard = require('./dashboard');

$(document).ready(function () {
    //    $('[data-toggle="popover"]').popover();
});