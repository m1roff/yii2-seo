<?php

namespace mirkhamidov\seo\migrations;

use yii\db\Migration;

class m170301_092827_insert_default_attributes extends Migration
{
    public $tableName = '{{%seo_attribute}}';
    
    public function safeUp()
    {
        $this->batchInsert(
            $this->tableName,
            [
                'name',
                'type',
                'description',
            ],
            [
                [
                    'title',
                    \mirkhamidov\seo\models\SeoAttribute::TAG,
                    'Page title',
                ],
                [
                    'h1',
                    \mirkhamidov\seo\models\SeoAttribute::TAG,
                    'Page title',
                ],
                [
                    'keywords',
                    \mirkhamidov\seo\models\SeoAttribute::META,
                    'Page keywords'
                ],
                [
                    'description',
                    \mirkhamidov\seo\models\SeoAttribute::META,
                    'Page description'
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->truncateTable($this->tableName);
    }
    
}
