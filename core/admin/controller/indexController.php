<?php

namespace core\admin\controller;

use core\base\controller\BaseController;
use core\admin\model\Model;
use core\base\settings\Settings;

class IndexController extends BaseController
{
    protected function inputData(){

        $model = Model::instance();

        $arr = $model->get('test', [
            'order' => ['parent_id'],
            'order_direction' => ['desc']
        ]);

        $res = $this->recursiveArr($arr, 1);

        $redirect = PATH . Settings::get('routes')['admin']['alias'] . '/show';
        $this->redirect($redirect);


    }


}

