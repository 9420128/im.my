<?php

namespace core\user\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected $name;

    protected function inputData(){

        $model = Model::instance();

        $res = $model->get('goods g', [
            'where' =>['id' => '1,2'],
            'operand' => ['IN'],
            'join' => [
                'goods_filters' => [
//                    'fields' => null,
                    'on' => ['id', 'teachers']
                ],
                'filters f' => [
                    'fields' => ['name as student_name', 'content'],
                    'on' => ['students', 'id']
                ],
                'filters' => [
                    'on' => ['parent_id', 'id']
                ]
            ],
            'join_structure' => true,
//            'order' => 'RAND()'
        ]);

        exit();
    }

}
