<?php
	/**
	 * PHP Template Engine Class
	 *
	 * @author   Malik Umer Farooq <lablnet01@gmail.com>
	 * @author-profile https://www.facebook.com/malikumerfarooq01/
	 * @license MIT 
	 *
	 * **NOTE**
	 * -This Class requires that ini file setting for fopen be set to true
	 */
Class Template{

	//file
	private $file;

	//key for template data
	private $keys = [];

	//value for template data
	private $values = [];
	
	/**
	 * __construct
	*
	* @param $arrays
	*
	 * @return booleans
	 */	
	public function __construct($file){

		self::SetFile($file);

	}
	/**
	 * Set file
	*
	* @param $file name of files
	*
	 * @return void
	 */		
	private function SetFile($file){

		$this->file = $file;

	}
	/**
	 * Set attributes for template
	*
	* @param $arrays
	*
	 * @return booleans
	 */			
	public function SetAttributes($params){

		if(is_array($params)){

				$keys = array_keys($params);

				$value = array_values($params);

				$this->keys = $keys;

				$this->values = $value;


		}else{

			return false;

		}
	}
		
	/**
	 * Get content form file
	*
	 * @return raw-data
	 */			
	public function FetchFile(){

		return file_get_contents( $this->file );

	}
	
	/**
	 * Rander template
	*
	 * @return raw-data
	 */		
	public function Rander(){

		$file = self::FetchFile();

		$counter = count($this->keys);

		for ( $i = 0; $i<$counter; $i++){

			$keys = $this->keys[$i];

			$values = $this->values[$i];

			$tag = "{% $keys %}";

			$pattern = "/$tag/";

			$file =  preg_replace("/$tag/", $values, $file);
			
		}
		return $file;
	}		
}