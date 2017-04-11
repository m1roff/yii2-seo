<?php

namespace mirkhamidov\seo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `seo_page_attribute`.
 */
class m170301_091612_create_seo_page_attribute_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seo_page_attribute', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull()
        ]);
    
        $this->createIndex(
            'idx-seo_page_attribute-page_id-attribute_id',
            'seo_page_attribute',
            [
                'page_id',
                'attribute_id',
            ],
            true
        );

        $this->addForeignKey(
            'fk-page-page_id',
            'seo_page_attribute',
            'page_id',
            'seo_page',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seo_page_attribute');
    
        $this->dropIndex(
            'idx-seo_page_attribute-page_id-attribute_id',
            'seo_page_attribute'
        );
    }
}
