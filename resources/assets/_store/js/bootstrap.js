
window._ = require('lodash');

try {
   // window.$ = window.jQuery = require('jquery');
    //require('materialize-css');

//    require('bootstrap-sass');
} catch (e) {}

window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
}
