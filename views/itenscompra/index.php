<?php

use app\models\Itenscompra;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItenscompraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Itenscompras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itenscompra-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Itenscompra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_compra',
            'id_produto',
            'valor',
            'quantidade',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Itenscompra $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]);
                 }
            ],
        ],
    ]); ?>


</div>
