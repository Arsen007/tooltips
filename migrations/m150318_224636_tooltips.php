<?php

use yii\db\Schema;
use yii\db\Migration;

class m150318_224636_tooltips extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tooltips}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . " NOT NULL",
            'pr_lang_id' => Schema::TYPE_INTEGER.'(11) NULL',
            'category_id' => Schema::TYPE_INTEGER.'(11) NULL',
            'code' => Schema::TYPE_TEXT.' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
        ], $tableOptions);
        $this->addForeignKey('pr_lang_id_id_fk1','tooltips','pr_lang_id','pr_lang','id');
        $this->addForeignKey('categories_id_fk2','tooltips','category_id','categories','id');
    }

    public function down()
    {
        $this->delete('{{%tooltips}}');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
