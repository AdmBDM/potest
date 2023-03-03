<?php

namespace common\models;

use yii\base\Model;

class Apple extends Model
{
	public $createTime;
	public $dropTime;
	public $crdX;
	public $crdY;
	public $radius;
//	public $color;
	public $status;


	public function __construct()
	{
		$this->crdX = 0;
		$this->crdY = 0;

		$this->createTime = time();
		$this->dropTime = $this->createTime + (60 * 60 * 24 * 7);
		$this->radius = mt_rand(10, 20);
		$this->status = 0;
	}

	private function setAppleColor() {
		$green = ['00', '33', '66', '99', 'CC', 'FF'];
		return '#FF' . $green[mt_rand(0, 5)] . '00';
	}


	public function getApple() {
		return '<div class="apple-area" ' .
			'style="
				width: ' . $this->radius . 'px; 
				height: ' . $this->radius . 'px; 
				background-color: ' . $this->setAppleColor() .
			';"></div>';
	}
}
