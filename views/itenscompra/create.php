<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Itenscompra $model */

$this->title = 'Create Itenscompra';
$this->params['breadcrumbs'][] = ['label' => 'Itenscompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itenscompra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,        
    ]) ?>

</div>
