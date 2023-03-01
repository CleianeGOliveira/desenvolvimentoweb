<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property float|null $valor
 *
 * @property Compra[] $compras
 * @property ItensCompra[] $itensCompras
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['valor'], 'number'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'valor' => 'Valor',
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::class, ['id' => 'id_compra'])->viaTable('itens_compra', ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[ItensCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItensCompras()
    {
        return $this->hasMany(ItensCompra::class, ['id_produto' => 'id']);
    }
}
