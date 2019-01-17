webpackHotUpdate(0,{

/***/ "./node_modules/babel-runtime/core-js/set.js":
false,

/***/ "./node_modules/core-js/library/fn/set.js":
false,

/***/ "./node_modules/core-js/library/modules/_array-from-iterable.js":
false,

/***/ "./node_modules/core-js/library/modules/_array-methods.js":
false,

/***/ "./node_modules/core-js/library/modules/_array-species-constructor.js":
false,

/***/ "./node_modules/core-js/library/modules/_array-species-create.js":
false,

/***/ "./node_modules/core-js/library/modules/_collection-strong.js":
false,

/***/ "./node_modules/core-js/library/modules/_collection-to-json.js":
false,

/***/ "./node_modules/core-js/library/modules/_collection.js":
false,

/***/ "./node_modules/core-js/library/modules/_set-collection-from.js":
false,

/***/ "./node_modules/core-js/library/modules/_set-collection-of.js":
false,

/***/ "./node_modules/core-js/library/modules/_validate-collection.js":
false,

/***/ "./node_modules/core-js/library/modules/es6.set.js":
false,

/***/ "./node_modules/core-js/library/modules/es7.set.from.js":
false,

/***/ "./node_modules/core-js/library/modules/es7.set.of.js":
false,

/***/ "./node_modules/core-js/library/modules/es7.set.to-json.js":
false,

/***/ "./resources/assets/_store/js/filters/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (immutable) */ __webpack_exports__["timeAgo"] = timeAgo;
/* harmony export (immutable) */ __webpack_exports__["phoneFormat"] = phoneFormat;
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment__ = __webpack_require__("./node_modules/moment/moment.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_moment__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_numeral__ = __webpack_require__("./node_modules/numeral/numeral.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_numeral___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_numeral__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_moment_locale_pt_br__ = __webpack_require__("./node_modules/moment/locale/pt-br.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_moment_locale_pt_br___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_moment_locale_pt_br__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_numeral_locales_pt_br__ = __webpack_require__("./node_modules/numeral/locales/pt-br.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_numeral_locales_pt_br___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_numeral_locales_pt_br__);
// set function parseTime,formatTime to filter






__WEBPACK_IMPORTED_MODULE_0_moment___default.a.locale('pt-br');
__WEBPACK_IMPORTED_MODULE_1_numeral___default.a.locale('pt-br');

function pluralize(time, label) {
    if (time === 1) {
        return time + label;
    }
    return time + label + 's';
}

function timeAgo(time) {
    time = __WEBPACK_IMPORTED_MODULE_0_moment___default()(time);
    if (time.isValid()) {
        return time.fromNow();
    }
    return 'time invalid!';
}
function phoneFormat(num) {
    if (num === null) return;
    var texto = num;
    // Tiro tudo que não é numero
    texto = texto.replace(/[^\d]/g, '');
    // Se tiver alguma coisa
    if (texto.length > 0) {
        // Ponho o primeiro parenteses do DDD    
        texto = "(" + texto;
        if (texto.length > 3) {
            // Fecha o parenteses do DDD
            texto = [texto.slice(0, 3), ") ", texto.slice(3)].join('');
        }
        if (texto.length > 12) {
            // Se for 13 digitos ( DDD + 9 digitos) ponhe o traço no quinto digito            
            if (texto.length > 13) texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');else
                // Se for 12 digitos ( DDD + 8 digitos) ponhe o traço no quarto digito
                texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
        }
        // Não adianta digitar mais digitos!
        if (texto.length > 15) texto = texto.substr(0, 15);
    }
    // Retorna o texto
    return texto;
}

/***/ }),

/***/ "./resources/assets/_store/js/utils/index.js":
false

})
//# sourceMappingURL=0.48b544d2cb7a8b660563.hot-update.js.map