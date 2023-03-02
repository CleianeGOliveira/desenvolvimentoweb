<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Compra;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Cliente $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir este cliente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'endereco',
        ],
    ]) ?>

    <h4>Compras</h4>


<?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            
            'data',
            'valortotal',         
        ],
    ]); ?>

    



</div>
