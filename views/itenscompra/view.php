<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Itenscompra $model */

$this->title = $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Itenscompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="itenscompra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto], [
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
            //'id_compra',
            [
               'attribute' => 'produto.nome',
               'label' => 'Produto' 
            ],
            'valor',
            'quantidade',
        ],
    ]) ?>

</div>
