<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itenscompra".
 *
 * @property int $id_compra
 * @property int $id_produto
 * @property float|null $valor
 * @property float|null $quantidade
 *
 * @property Compra $compra
 * @property Produto $produto
 */
class Itenscompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itenscompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compra', 'id_produto'], 'required'],
            [['id_compra', 'id_produto'], 'integer'],
            [['valor', 'quantidade'], 'number'],
            [['id_compra', 'id_produto'], 'unique', 'targetAttribute' => ['id_compra', 'id_produto']],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::class, 'targetAttribute' => ['id_compra' => 'id']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_compra' => 'Id Compra',
            'id_produto' => 'Id Produto',
            'valor' => 'Valor',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::class, ['id' => 'id_compra']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['id' => 'id_produto']);
    }
}
