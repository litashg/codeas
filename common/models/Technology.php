<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "technologies".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property $created_at
 * @property $updated_at
 *
 * @property Category[] $categories
 */
class Technology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technologies';
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
            [['title', 'slug'], 'required'],
            [['title', 'slug'], 'string', 'max' => 55],
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
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['technology_id' => 'id'])->with('articles');
    }

    public static function getCachedTechnologyBySlug($slug){
        $technology_id = \Yii::$app->cache->get('technology_id_by_slug_'.$slug);
        if ($technology_id === false)
        {
            $technology = Technology::find()->select(['id'])->where(['slug' => $slug])->one();
            $technology_id = $technology->id;
            \Yii::$app->cache->set('technology_id_by_slug_'.$slug, $technology_id, 60);
        }
        return $technology_id;
    }

    public static function getCachedTechnologyById($technology_id){
        $technology = \Yii::$app->cache->get('active_technology');
        if ($technology === false)
        {
            $technology = Technology::findOne($technology_id);
            \Yii::$app->cache->set('active_technology', $technology, 60);
        }
        return $technology;
    }

    public static function getCachedTechnologiesList(){
        $technologies = \Yii::$app->cache->get('technologies_list');
        if ($technologies === false)
        {
            $technologies = Technology::find()->select(['id', 'title', 'slug'])->asArray()->all();
            \Yii::$app->cache->set('technologies_list', $technologies, 60);
        }
        return $technologies;
    }
}
