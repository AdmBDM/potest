<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property int|null $tree_id
 * @property string $createTime
 * @property string $dropTime
 * @property int $coordX
 * @property int $coordY
 * @property int $radius
 * @property string $color
 * @property int $reminder
 * @property int $status
 */
class Apple extends ActiveRecord
{
	public function __construct()
	{

		$this->tree_id = 1;
		$this->createTime = time();
		$this->dropTime = $this->createTime + (60 * 60 * 24 * 7);
		$this->coordX = -7;
		$this->coordY = -7;
		$this->radius = mt_rand(7, 17);
		$this->color = $this->setAppleColor();
		$this->reminder = 100;
		$this->status = 0;
	}

	/**
	 * @return string
	 */
    public static function tableName(): string
	{
        return 'apple';
    }

	/**
	 * @return array
	 */
    public function rules(): array
	{
        return [
            [['tree_id', 'coordX', 'coordY', 'radius', 'reminder', 'status'], 'integer'],
            [['createTime', 'dropTime'], 'required'],
            [['createTime', 'dropTime'], 'safe'],
            [['color'], 'string', 'max' => 7],
        ];
    }

	/**
	 * @return string[]
	 */
    public function attributeLabels(): array
	{
        return [
            'id' => 'ID',
            'tree_id' => 'Tree ID',
            'createTime' => 'Созрело',
            'dropTime' => 'Упадёт/Упало',
            'coordX' => 'Coord X',
            'coordY' => 'Coord Y',
            'radius' => 'Радиус',
            'color' => 'Цвет',
            'reminder' => 'Осталось (%)',
            'status' => 'Статус',
        ];
    }

	/**
	 * @return string
	 */
	private function setAppleColor(): string
	{
		$green = ['00', '33', '66', '99', 'CC', 'FF'];
		return '#FF' . $green[mt_rand(0, 5)] . '00';
	}

	/**
	 * @return string
	 */
	public function getDivAppleOnTree(): string
	{
		return '<div ' .
			'style="position: absolute; display: inline-block; margin: 0; padding: 0;
				width: ' . $this->radius * 2 . 'px; 
				height: ' . $this->radius * 2 . 'px; 
				left: ' . $this->coordX . 'px; 
				top: ' . $this->coordY . 'px; 
				border-radius: 50%;
				background-color: ' . $this->color .
			';" id="apple' . $this->id . '"' .  $this->getOnclickStr($this->id) . '></div>';
	}

	/**
	 * @param string $tree
	 *
	 * @return void
	 */
	public function setAppleOnTree($tree) {
		if (is_null($tree)) {
			$this->coordX = 0;
			$this->coordY = 0;
		} else {
			$this->coordX = $this->coordX > 0 ?: $tree->setAppleX();
			$this->coordY = $this->coordY > 0 ?: $tree->setAppleY();
		}
	}

	/**
	 * @return string
	 */
	public function getDivDropApple(): string
	{
		return '<div ' .
				'style="position: relative; display: inline-block; margin: 0; padding: 0;
				width: ' . $this->radius * 2 . 'px; 
				height: ' . $this->radius * 2 . 'px; 
				left: ' . $this->coordX . 'px; 
				bottom: ' . $this->radius * 2 . 'px; 
				border-radius: 50%;
				background-color: ' . $this->color .
				';" id="apple' . $this->id . '"' .  $this->getOnclickStr($this->id) . '></div>';
	}

	/**
	 * @param $id
	 *
	 * @return string
	 */
	private function getOnclickStr($id): string
	{
		return ' onclick="clickApple(' . $id . ')"';
	}
}
