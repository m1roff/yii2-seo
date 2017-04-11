<?php

namespace mirkhamidov\seo\models;

use Yii;
use mirkhamidov\seo\Module;

/**
 * This is the model class for table "seo_attribute".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $description
 */
class SeoAttribute extends \yii\db\ActiveRecord
{
    const TAG = 'tag';
    const META = 'meta';
    
    const TITLE = 'title';
    const H1 = 'h1';
    const META_DESCRIPTION = 'description';
    const META_KEYWORDS = 'keywords';
    
    public static $types = [
        self::TAG => 'tag',
        self::META => 'meta'
    ];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'type', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('app', 'ID'),
            'name' => Module::t('app', 'Name'),
            'type' => Module::t('app', 'Type'),
            'description' => Module::t('app', 'Description'),
        ];
    }
    
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getMetaTags()
    {
        return self::find()->select(['name'])->where(['type' => self::META])->all();
    }
    
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getTags()
    {
        return self::find()->select(['name'])->where(['type' => self::TAG])->all();
    }
    
    /**
     * Возвращает список всех атрибутов доступных для страницы
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function listAll()
    {
        return self::find()->asArray()->all();
    }
}
