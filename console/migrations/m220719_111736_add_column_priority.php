<?php

use yii\db\Migration;

/**
 * Class m220719_111736_add_column_priority
 */
class m220719_111736_add_column_priority extends Migration
{
    public $tableName = '{{%queue}}';


    public function up()
    {
        $this->addColumn($this->tableName, 'priority', $this->integer()->unsigned()->notNull()->defaultValue(1024)->after('delay'));
        $this->createIndex('priority', $this->tableName, 'priority');
    }

    public function down()
    {
        $this->dropIndex('priority', $this->tableName);
        $this->dropColumn($this->tableName, 'priority');
    }
}
