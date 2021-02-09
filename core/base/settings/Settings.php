<?php

namespace core\base\settings;

use core\base\controller\Singleton;

class Settings
{

    use Singleton;

    private $routes = [
        'admin' => [
            'alias' => 'admin',
            'path' => 'core/admin/controller/',
            'hrUrl' => false, // понятные url - true
            'routes' => [

            ]
        ],
        'settings' => [
            'path' => 'core/base/settings/'
        ],
        'plugins' => [
            'path' => 'core/plugins/',
            'hrUrl' => false, // понятные url - true
            'dir' => false
        ],
        'user' => [
            'path' => 'core/user/controller/',
            'hrUrl' => true, // понятные url - true
            'routes' => [

            ]
        ],
        'default' => [
            'controller' => 'IndexController',
            'inputMethod' => 'inputData',
            'outputMethod' => 'outputData'
        ]
    ];

    private $expansion = 'core/admin/expansion/'; // путь к дериктории где хранятся расширения

    private $messages = 'core/base/messages/'; // путь где хронятся сообщения ошибок 50

    private $defaultTable = 'goods';

    private $formTemplates = PATH . 'core/admin/view/include/form_templates/'; // 45

    private $projectTables = [
        'articles' => ['name' => 'Статьи'],
        'pages' => ['name' => 'Страницы'],
        'goods' => ['name' => 'Товары', 'img' => 'pages.png'],
        'filters' => ['name' => 'Фильтры'],
        'test' => ['name' => 'Тест']
    ];

    private $templateArr = [
        'text' => ['name'],
        'textarea' => ['keywords', 'content'],
        'radio' => ['visible'],
        'checkboxlist' => ['filters'],
        'select' => ['menu_position', 'parent_id'],
        'img' => ['img', 'main_img'],
        'gallery_img' => ['gallery_img', 'new_gallery_img']
    ];

    private $fileTemplates = ['img', 'gallery_img'];

    private $translate = [
        'name' => ['Название', 'Не более 100 символов'],
        'keywords' => ['Ключевые слова', 'Не более 90 символов'],
        'content' => []
    ];

    private $radio = [
        'visible' => ['Нет', 'Да', 'default' => 'Да']
    ];

    private $rootItems = [
        'name' => 'Корневая',
        'tables' => ['articles', 'filters', 'test']
    ];
    // 81
    private $manyToMany = [
        'goods_filters' => ['goods', 'filters'] // 'type' => 'child' || 'root'
    ];

    private $blockNeedle = [
        'vg-rows' => [],
        'vg-img' => ['img', 'main_img'],
        'vg-content' => ['content']
    ];

    private $validation = [
        'name' => ['empty' => true, 'trim' => true],
        'price' => ['int' => true],
        'login' => ['empty' => true, 'trim' => true],
        'password' => ['crypt' => true, 'empty' => true],
        'keywords' => ['count' => 90, 'trim' => true],
        'description' => ['count' => 270, 'trim' => true],
    ];

    static public function get($property){
        return self::instance()->$property;
    }


    public function clueProperties($class){

        $baseProperties = [];

        foreach ($this as $name => $item) {
            $property = $class::get($name);

            if (is_array($property) && is_array($item)) {
                // склеиваем массив
                $baseProperties[$name] = $this->arrayMergeRecursive($this->$name, $property);
                continue;
            }

            if (!$property) $baseProperties[$name] = $this->$name;
        }

        return $baseProperties;

    }

    public function arrayMergeRecursive(){

        $arrays = func_get_args();

        $base = array_shift($arrays);

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value) && is_array($base[$key])) {
                    $base[$key] = $this->arrayMergeRecursive($base[$key], $value);
                } else {
                    if (is_int($key)) {
                        if (!in_array($value, $base)) array_push($base, $value);
                        continue;
                    }
                    $base[$key] = $value;
                }
            }
        }

        return $base;

    }

}