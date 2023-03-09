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
 * @property string $ruinTime
 * @property int $coordX
 * @property int $coordY
 * @property int $radius
 * @property string $color
 * @property int $reminder
 * @property int $status
 */
class Apple extends ActiveRecord
{
	const RUIN_TIME = 60 * 60 * 5;
	const DROP_TIME = 60 * 60 * 24 * 5;
	const GOOD_APPLES = 0;
	const DROP_APPLES = 1;
	const BAD_APPLES = 2;

	public function __construct()
	{

		$this->tree_id = 1;
		$this->createTime = time();
		$this->dropTime = $this->createTime + self::DROP_TIME;
		$this->ruinTime = $this->dropTime + self::RUIN_TIME;
		$this->coordX = -7;
		$this->coordY = -7;
		$this->radius = mt_rand(7, 17);
		$this->color = $this->setAppleColor();
		$this->reminder = 100;
		$this->status = self::GOOD_APPLES;
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
            [['createTime', 'dropTime', 'ruinTime'], 'required'],
            [['createTime', 'dropTime', 'ruinTime'], 'safe'],
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
            'ruinTime' => 'Испортится',
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
			';" id="apple' . $this->id . '"' .  $this->getOnclickStr($this->id,$this->status,$this->reminder) . '></div>';
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
				border-radius: 50%;
				left: ' . $this->coordX . 'px; 
				bottom: -17px; 
				background-color: ' . $this->color .
				';" id="apple' . $this->id . '"' .  $this->getOnclickStr($this->id,$this->status,$this->reminder) . '></div>';
	}

	/**
	 * @return string
	 */
	public function getDivRuinApple(): string
	{
		return '<div class="apple-area" ' .
				'style="margin: 0; padding: 0;
				width: ' . $this->radius * 2 . 'px; 
				height: ' . $this->radius * 2 . 'px; 
				border-radius: 50%;' .
				'" id="apple' . $this->id . '"' .  $this->getOnclickStr($this->id,$this->status,$this->reminder) . '></div>';
	}

	/**
	 * @param $id
	 * @param $status
	 * @param $reminder
	 *
	 * @return string
	 */
	private function getOnclickStr($id, $status, $reminder): string
	{
//		return ' onclick="clickApple(' . $id . ')"';
		return ' onclick="openAppleForm(' . $id . ', ' . $status . ', ' . $reminder . ')"';
	}

	/**
	 * @return mixed
	 */
	public static function getGoodApples() {
		return Apple::find()->where('status = ' . self::GOOD_APPLES)->all();
	}

	/**
	 * @return mixed
	 */
	public static function getDropApples() {
		return Apple::find()->where('status = ' . self::DROP_APPLES)->all();
	}

	/**
	 * @return mixed
	 */
	public static function getBadApples() {
		return Apple::find()->where('status = ' . self::BAD_APPLES)->all();
	}
}
