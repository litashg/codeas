<?php

namespace common\models;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $category_id
 * @property string $slug
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 */
class Article extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['category_id'], 'integer'],
            [['body'], 'string'],
            [['title', 'slug'], 'string', 'max' => 55],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [ 'class' => TimestampBehavior::className(),
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function getCachedArticleBodyBySlug($slug){
        $article = Yii::$app->cache->get('article_'.$slug);
        if ($article === false)
        {
            $article = Article::find()->select(['body'])->where(['slug' => $slug])->one();
            $article = $article->body;
            Yii::$app->cache->set('article_'.$slug, $article, 60);
        }
    }
}
