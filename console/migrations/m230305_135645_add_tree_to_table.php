<?php

use yii\db\Migration;

/**
 * Class m230305_135645_add_tree_to_table
 */
class m230305_135645_add_tree_to_table extends Migration
{
	/**
	 * @return void
	 */
    public function safeUp()
    {
		$this->batchInsert('tree', ['nameTree', 'border', 'xTreeFrom', 'xTreeTo', 'yTreeFrom', 'yTreeTo'], [
				['Apple Tree', 5, 0, 500, 0, 100],
		]);

    }

	/**
	 * @return false
	 */
    public function safeDown()
    {
        echo "m230305_135645_add_tree_to_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230305_135645_add_tree_to_table cannot be reverted.\n";

        return false;
    }
    */
}
