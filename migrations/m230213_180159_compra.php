<?php

use yii\db\Migration;

/**
 * Class m230213_180159_compra
 */
class m230213_180159_compra extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('compra', [
            'id' => $this->primaryKey(),
            'data' => $this->date()->notNull(),
            'valortotal' => $this->money(),
            'cliente_fk' => $this->integer()
        ]);

        $this->addForeignKey('fk_cliente_compra','compra','cliente_fk','cliente','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_cliente_compra');
        $this->dropTable('compra');
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230213_180159_compra cannot be reverted.\n";

        return false;
    }
    */
}
