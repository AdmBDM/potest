<?php

namespace common\models;

use yii\base\Model;

class Tree extends Model
{
	public $xTreeFrom;
	public $xTreeTo;
	public $yTreeFrom;
	public $yTreeTo;

	public function __construct($xFrom = 0, $xTo = 500, $yFrom = 0, $yTo = 100)
	{
		$this->xTreeFrom = $xFrom;
		$this->xTreeTo = $xTo;
		$this->yTreeFrom = $yFrom;
		$this->yTreeTo = $yTo;
	}

	public function getCoordNewApple() {
		return [
			'x' => mt_rand($this->xTreeFrom, $this->xTreeTo),
			'y' => mt_rand($this->yTreeFrom, $this->yTreeTo),
		];
	}

	public function getTreeWidth() {
		return $this->xTreeTo - $this->xTreeFrom;
	}

	public function getTreeHeight() {
		return $this->yTreeTo - $this->yTreeFrom;
	}

}