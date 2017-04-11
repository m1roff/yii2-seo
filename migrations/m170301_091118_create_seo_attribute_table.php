<?php

namespace mirkhamidov\seo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `seo_attribute`.
 */
class m170301_091118_create_seo_attribute_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seo_attribute', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->string(255)->notNull(),
            'description' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seo_attribute');
    }
}
