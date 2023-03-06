<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "tree".
 *
 * @property int $id
 * @property string $nameTree
 * @property int $border
 * @property int $xTreeFrom
 * @property int $xTreeTo
 * @property int $yTreeFrom
 * @property int $yTreeTo
 */
class Tree extends ActiveRecord
{
	const BORDER = 5;
	public int $countApple;

	/**
	 * @param int $xFrom
	 * @param int $xTo
	 * @param int $yFrom
	 * @param int $yTo
	 */
	public function __construct(int $xFrom = 0, int $xTo = 500, int $yFrom = 0, int $yTo = 100)
	{
		$this->xTreeFrom = $xFrom;
		$this->xTreeTo = $xTo;
		$this->yTreeFrom = $yFrom;
		$this->yTreeTo = $yTo;
	}

	/**
	 * @return string
	 */
    public static function tableName(): string
	{
        return 'tree';
    }

	/**
	 * @return array
	 */
    public function rules(): array
	{
        return [
            [['border', 'xTreeFrom', 'xTreeTo', 'yTreeFrom', 'yTreeTo'], 'integer'],
            [['nameTree'], 'string', 'max' => 100],
        ];
    }

	/**
	 * @return string[]
	 */
    public function attributeLabels(): array
	{
        return [
            'id' => 'ID',
            'nameTree' => 'Дерево',
            'border' => 'Border',
            'xTreeFrom' => 'X с',
            'xTreeTo' => 'X по',
            'yTreeFrom' => 'Y с',
            'yTreeTo' => 'Y по',
        ];
    }

	/**
	 * @return int
	 */
	public function getTreeWidth(): int
	{
		return $this->xTreeTo - $this->xTreeFrom;
	}

	/**
	 * @return int
	 */
	public function getTreeHeight(): int
	{
		return $this->yTreeTo - $this->yTreeFrom;
	}

	/**
	 * @return int
	 */
	public function setAppleX(): int
	{
		return mt_rand(self::BORDER, $this->getTreeWidth() - self::BORDER);
	}

	/**
	 * @return int
	 */
	public function setAppleY(): int
	{
		return mt_rand(self::BORDER, $this->getTreeHeight() - self::BORDER);
	}

}
