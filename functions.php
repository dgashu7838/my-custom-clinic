<?php 
if(!defined("ABSPATH")) exit;

$files = [
    "assets",
    "resource",
    "setup",
    "logo",
    "logoStyle",
    "menu",
    "topNav",
];

foreach($files as $file){
    $path = get_template_directory()."/inc/{$file}.php";

    if(file_exists($path)){
        require_once $path;
    }
}







