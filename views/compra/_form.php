<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;


/** @var yii\web\View $this */
/** @var app\models\Compra $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'valortotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente_fk')->
       dropDownList(ArrayHelper::map(Cliente::find()
           ->orderBy('nome')
           ->all(),'id','nome'),
           ['prompt' => 'Selecione um cliente'] )
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
