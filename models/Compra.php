<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $id
 * @property string $data
 * @property float|null $valortotal
 * @property int|null $cliente_fk
 *
 * @property Cliente $clienteFk
 * @property ItensCompra[] $itensCompras
 * @property Produto[] $produtos
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
            [['data'], 'safe'],
            [['valortotal'], 'number'],
            [['cliente_fk'], 'integer'],
            [['cliente_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['cliente_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'valortotal' => 'Valor Total',
            'cliente_fk' => 'Cliente Fk',
        ];
    }

    /**
     * Gets query for [[ClienteFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'cliente_fk']);
    }

    /**
     * Gets query for [[ItensCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getItensCompras()
    // {
    //     return $this->hasMany(ItensCompra::class, ['id_compra' => 'id']);
    // }

    public function getItensCompras()
    {
        return $this->hasMany(ItensCompra::class, ['id_compra' => 'id'])->joinWith('produto');        
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id' => 'id_produto'])->viaTable('itens_compra', ['id_compra' => 'id']);
    }

    public function getProdutosCompras()
    {
        $query = Compra::findOne($this->id);
        $query = $query;
    }


}
