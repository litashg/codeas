<?php

use yii\db\Migration;

/**
 * Class m180717_211247_update_technology_table
 */
class m180717_211247_update_technology_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->addColumn('{{%technologies}}','body', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropColumn('{{%technologies}}','body');
    }
}
