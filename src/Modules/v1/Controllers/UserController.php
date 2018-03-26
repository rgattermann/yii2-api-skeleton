<?php

namespace App\Modules\v1\Controllers;

use yii\rest\Controller;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        return 'AAA';
    }
}
