<?php

use yii\db\Migration;

/**
 * Class m220719_110729_add_field_later_table_quenue
 */
class m220719_110729_add_field_later_table_quenue extends Migration
{
    public $tableName = '{{%queue}}';


    public function up()
    {
        $this->addColumn($this->tableName, 'timeout', $this->integer()->defaultValue(0)->notNull()->after('created_at'));
    }

    public function down()
    {
        $this->dropColumn($this->tableName, 'timeout');
    }
}
