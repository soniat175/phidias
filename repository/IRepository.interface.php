<?php
interface IRepository{
	
	public function findAll();
	
	public function findById( $id );
}
?>