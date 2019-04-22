<?php

namespace app\components;

use yii\base\Widget;
use Yii;

class Menu extends Widget
{  
	public $page;  
    public function run(){    	
    	return $this->render('menu', ['page'=>$this->page]);
    }
}