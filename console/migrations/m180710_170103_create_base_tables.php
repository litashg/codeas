<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m180710_170103_create_base_tables
 */
class m180710_170103_create_base_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%technologies}}', [
            'id'                   => Schema::TYPE_PK,
            'title'                => Schema::TYPE_STRING . '(55) NOT NULL',
            'slug'                 => Schema::TYPE_STRING . '(55) NOT NULL',
            'created_at'           => Schema::TYPE_DATETIME,
            'updated_at'           => Schema::TYPE_DATETIME,
        ]);

        $this->createTable('{{%categories}}', [
            'id'                    => Schema::TYPE_PK,
            'title'                 => Schema::TYPE_STRING . '(55) NOT NULL',
            'technology_id'         => Schema::TYPE_INTEGER,
            'slug'                  => Schema::TYPE_STRING . '(55) NOT NULL',
            'created_at'            => Schema::TYPE_DATETIME,
            'updated_at'            => Schema::TYPE_DATETIME,
        ]);

        $this->addForeignKey('fk_categories_technologies', '{{%categories}}', 'technology_id', '{{%technologies}}', 'id');

        $this->createTable('{{%articles}}', [
            'id'                    => Schema::TYPE_PK,
            'title'                 => Schema::TYPE_STRING . '(55) NOT NULL',
            'body'                  => Schema::TYPE_TEXT,
            'category_id'           => Schema::TYPE_INTEGER,
            'slug'                  => Schema::TYPE_STRING . '(55) NOT NULL',
            'created_at'            => Schema::TYPE_DATETIME,
            'updated_at'            => Schema::TYPE_DATETIME,
        ]);

        $this->addForeignKey('fk_articles_categories', '{{%articles}}', 'category_id', '{{%categories}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%articles}}');
        $this->dropTable('{{%categories}}');
        $this->dropTable('{{%technologies}}');
    }
}
