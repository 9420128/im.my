<?php

namespace core\admin\controller;

use core\base\settings\Settings;
//use core\base\model\BaseModel;

class AddController extends BaseAdmin
{

    protected $action = 'add';

    protected function inputData(){

    	if(!$this->userId) $this->exectBase();

    	$this->checkPost();

        $this->createTableData();

        $this->createForeignData();

        $this->createMenuPosition();

        $this->createRadio();

        $this->createOutputData();

        $this->createManyToMany();
        // 88
        return $this->expansion();

	}
    // 88 переезд в BaseAdmin

}

