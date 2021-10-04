<?php

/* @var $this yii\web\View */

use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4 mb-5">Activity page!</h1>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'datetime',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->datetime;
                    }
                ],
                [
                    'attribute' => 'url',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->url;
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
