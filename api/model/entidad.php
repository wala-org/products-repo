<?php


interface entidad{

	function __construct($arrayOfData='');
	
	public function getSelectQuery();
	
	public function getInsertQuery();
	
	public function getUpdateQuery();

	public function getDeleteQuery();
	
}


?>