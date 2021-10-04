<?php
namespace app\modules\api1\controllers;

use app\modules\api1\models\Log;
use app\modules\api1\models\LogSearch;

class LoggerController extends \yii\web\Controller {

    public function actionSaveLog($url, $datetime) {
        $model = new Log();
        $model->url = $url;
        $model->datetime = (string) $datetime;

        if($model->save()) {
            return true;
        }

        return $model->errors;
    }

    public function actionShowLogs() {
        $searchModel = new LogSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]; 
    }
 
}