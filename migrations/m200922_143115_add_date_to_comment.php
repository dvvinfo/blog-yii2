<?php

use yii\db\Migration;

/**
 * Class m200922_143115_add_date_to_comment
 */
class m200922_143115_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200922_143115_add_date_to_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200922_143115_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
