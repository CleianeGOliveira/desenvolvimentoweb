<?php

use yii\db\Migration;

/**
 * Class m230213_132223_tabelacliente
 */
class m230213_132223_tabelacliente extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cliente', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'endereco' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cliente');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230213_132223_tabelacliente cannot be reverted.\n";

        return false;
    }
    */
}
