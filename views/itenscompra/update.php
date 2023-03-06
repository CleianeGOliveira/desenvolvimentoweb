<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Itenscompra $model */

$this->title = 'Update Itenscompra: ' . $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Itenscompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_compra, 'url' => ['view', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itenscompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id_compra' =>$model->id_compra,
    ]) ?>

</div>
