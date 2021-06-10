<?php
namespace core\entities;

class Test
{
	public $id;

	public $value;

	public function __construct($id, $value)
	{
		$this->id = $id;
		$this->value = $value;
	}
}