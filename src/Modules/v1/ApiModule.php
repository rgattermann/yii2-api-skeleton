<?php

namespace App\Modules\v1;

use Yii;
use yii\base\Module;

class ApiModule extends Module
{
    public $controllerNamespace = 'App\Modules\v1\Controllers';
    
    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
    }
}
