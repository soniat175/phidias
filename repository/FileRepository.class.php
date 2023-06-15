<?php
include_once("./IRepository.interface.php");

abstract class FileRepository implements IRepository{
	
	protected $file;
	protected $hasHeader;
	protected $linesFile;
	protected $delimiter;
	protected $columnSearch;
	
	function __construct( $file, $hasHeader=false, $delimiter = ";", $columnSearch = 0 ) {
		$this->file = $file;
		$this->hasHeader = $hasHeader;
		$this->delimiter = $delimiter;
		$this->columnSearch = $columnSearch;
		$this->linesFile = $this->read( $file, $hasHeader );
	}
	
	public function findAll(){
		return $this->linesFile;
	}
	
	public function findById( $id ){
		return $this->search( $id, $this->delimiter, $this->columnSearch = 0 );
	}
		
	private function read( $file, $hasHeader=false ){
		$linesFile = array();
		$file = fopen($file, "r");
		while(($line=fgets($file))!==false) { 
			if( $hasHeader ){
				$hasHeader = false;
				continue;
			}
			array_push($linesFile, $line);			
		}
		return $linesFile;
	}
	
	private function search( $valueSearched, $delimiter=";", $columnSearch = 0 ){
		foreach ($this->linesFile as $line){
			$fields = explode($delimiter, trim($line));
			if( $fields[$columnSearch] == $valueSearched ){		
				return $fields;
			}
		}
		return array();
	}
}	
?>