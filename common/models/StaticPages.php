<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "static_pages".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 */
class StaticPages extends \yii\db\ActiveRecord
{

    public static $static_page_list = [
        'main_page' => 1,
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'static_pages';
    }

    public function behaviors()
    {
        return [
            [ 'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getStaticPageById($id)
    {
        $static_page = \Yii::$app->cache->get('static_page_where_title_' . $id);
        if ($static_page === false)
        {
            $static_page = StaticPages::find()->select(['body'])->where(['id' => $id])->one();
            $static_page = $static_page->body;
            \Yii::$app->cache->set('static_page_where_title_' . $id, $static_page, 60);
        }
        return $static_page;
    }
}
