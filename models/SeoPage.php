<?php

namespace mirkhamidov\seo\models;

use Yii;
use mirkhamidov\seo\Module;

/**
 * This is the model class for table "seo_page".
 *
 * @property integer $id
 * @property string $route
 */
class SeoPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route'], 'required'],
            [['route'], 'string', 'max' => 255],
            [['route'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('app', 'ID'),
            'route' => Module::t('app', 'Route'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoAttributes()
    {
        return $this->hasMany(SeoPageAttribute::className(), ['page_id' => 'id']);
    }
    
    /**
     * Возвращается список всех страниц
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function listAll()
    {
        return self::find()->asArray()->all();
    }
}
