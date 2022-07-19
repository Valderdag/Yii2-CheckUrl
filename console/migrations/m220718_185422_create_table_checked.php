<?php

use yii\db\Migration;

/**
 * Class m220718_185422_create_table_checked
 */
class m220718_185422_create_table_checked extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checked}}',
            [
                'id' => $this->primaryKey(),
                'url' => $this->string(),
                'delay' => $this->integer(),
                'attemp' => $this->integer(),
                'status' => $this->integer(),
                'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->dropTable('{{%checked}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220718_185422_create_table_checked cannot be reverted.\n";

        return false;
    }
    */
}
