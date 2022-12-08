<?php
// spl_autoload_register(function ($class) {
//     require_once dirname(__DIR__) . "/classes/{$class}.php";
// });

foreach (glob("classes/*.php") as $filename) {
    include $filename;
};

session_start();
