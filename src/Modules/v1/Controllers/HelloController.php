<?php

namespace App\Modules\v1\Controllers;

use yii\rest\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        return "Hello World";
    }

    public function actionView($id)
    {
        return "Hello " . ($id ? : "world");
    }
}
