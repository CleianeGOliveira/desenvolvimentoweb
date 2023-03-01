<?php

use yii\db\Migration;

/**
 * Class m230213_175809_produto
 */
class m230213_175809_produto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produto', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'valor' => $this->money(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('produto');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230213_175809_produto cannot be reverted.\n";

        return false;
    }
    */
}
