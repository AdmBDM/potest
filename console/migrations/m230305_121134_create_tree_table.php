<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tree}}`.
 */
class m230305_121134_create_tree_table extends Migration
{
	/**
	 * @return void
	 */
    public function safeUp()
    {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

        $this->createTable('{{%tree}}', [
            'id' => $this->primaryKey(),
			'nameTree' => $this->string(100)->defaultValue('Tree')->notNull(),
			'border' => $this->integer()->defaultValue(5)->notNull(),
			'xTreeFrom' => $this->integer()->defaultValue(0)->notNull(),
			'xTreeTo' => $this->integer()->defaultValue(100)->notNull(),
			'yTreeFrom' => $this->integer()->defaultValue(0)->notNull(),
			'yTreeTo' => $this->integer()->defaultValue(100)->notNull(),
        ], $tableOptions);
    }



	/**
	 * @return void
	 */
    public function safeDown()
    {
        $this->dropTable('{{%tree}}');
    }
}
