<?php

defined('VG_ACCESS') or die ('Access denied');

const MS_MOD = false;

const TEMPLATE = 'templates/default/';
const ADMIN_TEMPLATE = 'core/admin/view/';
const UPLOAD_DIR = 'userfiles/';

const COOKIE_VERSION = '1.0.0';
const CRYPT_KEY = 'F-JaNdRgUjXn2r5u$ C & F) J @ NcRfUjWnZv9y $ B & Е) Н @ McQfTh2s5v8y / Б? Е (Н + МБкjXn2r5u8x / А? D (G +RfTjWnZr4u7x! A% D@ McQfThWmZq4t7w!Е (Н + MbQeShVmYq3t';
const COOKIE_TIME = 60;
const BLOCK_TIME = 3;

// постраничная навигация
const QTY = 8;
const QTY_LINKS = 3;

const ADMIN_CSS_JS = [
    'styles' => ['/css/main.css'],
    'scripts' => [
        '/js/fremworkfunctions.js', 'js/scripts.js', 'js/tinymce/tinymce.min.js', 'js/tinymce/tinymce_init.js'
    ]
];

const USER_CSS_JS = [
    'styles' => ['/css/style.css'],
    'scripts' => []
];

// путь для загрузки классов

use core\base\exceptions\RouteException;

function autoloadMainClasses($class_name){

    $class_name = str_replace('\\','/',$class_name);

    if(!@include_once $class_name . '.php'){
        throw new RouteException('Не верное имя файла для подключения - '. $class_name);
    }
}

spl_autoload_register('autoloadMainClasses');

