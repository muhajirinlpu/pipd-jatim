<?php


switch(@$_GET['do']){
    case "getSlider":
        _response(200,_get(_run("SELECT * FROM ")));
        break;
}