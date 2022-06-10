<?php

use yii\db\Migration;

/**
 * Class m220606_051831_countryes
 */
class m220606_051831_countryes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'country_name' => $this->string()->notNull()->unique()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    // public function safeDown()
    // {
    //     echo "m220606_051831_countryes cannot be reverted.\n";

    //     return false;
    // }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
     */

    public function down()
    {
        $this->dropTable('{{%countryes}}');
    }
   
}
