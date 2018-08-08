<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180717_203915_create_static_page
 */
class m180717_203915_create_static_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%static_pages}}', [
            'id'                    => Schema::TYPE_PK,
            'title'                 => Schema::TYPE_STRING . '(55) NOT NULL',
            'body'                  => Schema::TYPE_TEXT,
            'created_at'            => Schema::TYPE_DATETIME,
            'updated_at'            => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%static_pages}}');
    }
}
