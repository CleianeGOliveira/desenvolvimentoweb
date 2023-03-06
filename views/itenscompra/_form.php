<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produto;


/** @var yii\web\View $this */
/** @var app\models\Itenscompra $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="itenscompra-form">

    <?php $form = ActiveForm::begin(); ?>    

    <?= $form->field($model, 'id_produto')->
       dropDownList(ArrayHelper::map(Produto::find()
           ->orderBy('nome')
           ->all(),'id','nome'),
           ['prompt' => 'Selecione um produto'] )
    ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
