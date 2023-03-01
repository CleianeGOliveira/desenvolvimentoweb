<?php

use yii\db\Migration;

/**
 * Class m230213_180449_itens_compra
 */
class m230213_180449_itens_compra extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('itenscompra', [            
            'id_compra' => $this->integer(),
            'id_produto' => $this->integer(),
            'valor' =>$this->money(),
            'quantidade' =>$this->float()
        ]);


        $this->addPrimaryKey('pk-itens-compra', 'itenscompra', ['id_compra', 'id_produto']);
        $this-> addForeignKey('idx_itenscompra_compra','itenscompra','id_compra','compra','id');
        $this-> addForeignKey('idx_itenscompra_produto','itenscompra','id_produto','produto','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk-itens-compra', 'itenscompra');
        $this->dropForeignKey('idx_itenscompra_compra', 'itenscompra');
        $this->dropForeignKey('idx_itenscompra_produto', 'itenscompra');   
        $this->dropTable('itenscompra');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230213_180449_itens_compra cannot be reverted.\n";

        return false;
    }
    */
}
