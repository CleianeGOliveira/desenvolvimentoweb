<?php


namespace app\controllers;


class RelatoriosController extends \yii\web\Controller
{
   public function actionIndex()
   {
       return $this->render('index');
   }

   public function actionFaturamentocliente()
   {
        return $this->render('faturamentocliente');
   }


}
