<?php

class Example extends DTModel{
	protected static $storage_table = "examples";
	public $deleted = 0;
	public $name;

	/**
		You can also place functions within the model
	**/
	
	public $functionname;
	public function functionname(){
		return "Does Stuff";
	}
}
