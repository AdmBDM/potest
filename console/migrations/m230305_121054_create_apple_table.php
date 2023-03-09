<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apple}}`.
 */
class m230305_121054_create_apple_table extends Migration
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

        $this->createTable('{{%apple}}', [
            'id' => $this->primaryKey(),
			'tree_id' => $this->integer()->defaultValue(1),
			'createTime' => $this->integer()->notNull(),
			'dropTime' => $this->integer()->notNull(),
			'ruinTime' => $this->integer()->notNull(),
			'coordX' => $this->integer()->defaultValue(0)->notNull(),
			'coordY' => $this->integer()->defaultValue(0)->notNull(),
			'radius' => $this->integer()->defaultValue(5)->notNull(),
			'color' => $this->string(7)->defaultValue('#000000')->notNull(),
			'reminder' => $this->integer()->defaultValue(100)->notNull(),
			'status' => $this->integer()->defaultValue(0)->notNull(),
		], $tableOptions);
    }

	/**
	 * @return void
	 */
    public function safeDown()
    {
        $this->dropTable('{{%apple}}');
    }
}
