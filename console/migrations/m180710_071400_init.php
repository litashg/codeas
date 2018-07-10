<?php

use yii\db\Migration;

/**
 * Class m180710_071400_init
 */
class m180710_071400_init extends Migration
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
        echo "m180710_071400_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180710_071400_init cannot be reverted.\n";

        return false;
    }
    */
}
