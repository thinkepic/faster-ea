require("select2");
import $ from "jquery";
// Jquery
window.$ = window.jQuery = $;
const bootstrap = require('bootstrap')
window.bootstrap = bootstrap

// datatables
import dt from "datatables.net";
window.$.DataTable = dt;

// dayjs
const dayjs = require('dayjs')
const relativeTime = require('dayjs/plugin/relativeTime')
const isSameOrBefore = require('dayjs/plugin/isSameOrBefore')
require('dayjs/locale/id')
dayjs.locale('id') // use locale globally
dayjs.extend(isSameOrBefore)
dayjs.extend(relativeTime)
window.dayjs = dayjs


import { initFormAjax, initDatatable, initSelect2 } from "./helpers";
window.initFormAjax = initFormAjax
window.initDatatable = initDatatable
window.initSelect2 = initSelect2