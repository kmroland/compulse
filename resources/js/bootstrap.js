import Popper from "popper.js";
import $ from "jquery";

import autosize from "autosize";

import "bootstrap/js/dist/dropdown";

window.Popper = Popper;

window.$ = $;

autosize($("textarea"));
