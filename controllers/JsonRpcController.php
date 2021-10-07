<?php

namespace app\controllers;

use georgique\yii2\jsonrpc\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class JsonRpcController extends Controller {

	// Practically you don't need anything else in this controller, 
	// unless you want to customize entry point somehow.
	
    // Disable CSRF validation for JSON-RPC POST requests
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['http://landind.loc'],
                    'Access-Control-Allow-Methods' => ['POST'],
                    'Access-Control-Allow-Headers' => ['Content-Type, Authorization'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 3600,
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ],
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ]);
    }
}