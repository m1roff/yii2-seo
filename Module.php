<?php

namespace mirkhamidov\seo;

use Yii;
/**
 * seo module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mirkhamidov\seo\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['mirkhamidov/seo/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-RU',
            'basePath' => '@mirkhamidov/seo/message',
            'fileMap' => [
                'mirkhamidov/seo/app' => 'app.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('mirkhamidov/seo/' . $category, $message, $params, $language);
    }
}
