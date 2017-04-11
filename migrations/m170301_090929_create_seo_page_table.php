<?php

namespace mirkhamidov\seo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `seo_page`.
 */
class m170301_090929_create_seo_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seo_page', [
            'id' => $this->primaryKey(),
            'route' =>$this->string()->notNull()->unique(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seo_page');
    }
}
