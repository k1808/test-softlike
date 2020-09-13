<?php

use \yii\db\Migration;

class m190124_110200_add_user_id_column_to_order_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%order}}', 'user_id', $this->integer()->notNull());
    }

    public function down()
    {
        $this->dropColumn('{{%order}}', 'User_id');
    }
}
