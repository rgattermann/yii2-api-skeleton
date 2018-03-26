<?php

namespace App\Modules\v1\Controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\LoginForm;
use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class CountryController extends ActiveController
{
    public $modelClass = 'App\Modules\v1\Models\Country';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            //'class' => CompositeAuth::className(),
            // 'authMethods' => [
            //     HttpBasicAuth::className(),
            //     HttpBearerAuth::className(),
            //     QueryParamAuth::className(),
            // ],
        ];
        return $behaviors;
    }
}
