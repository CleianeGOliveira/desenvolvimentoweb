<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\controllers\ActiveDataProvider;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */

$this->title = $model->cliente->nome.' - Compra: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data',
            'valortotal',
            [
                'attribute'=>'cliente.nome',
                'label'=>'Cliente',
            ],
                
        ],
    ]) ?>

    <p>
        <?= Html::a('Adicionar produtos', ['itenscompra/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>        
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,            
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],  
                'produto.nome',                
                'quantidade',                
                'valor',                                
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to(['itenscompra/'.$action, 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]);
                    }
                ],
            ],
    ]); ?>
</div>
