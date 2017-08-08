<?php
Class ArtistTest{
	private $firstName;
	private $lastName;
	
	function ArtistTest($fn, $ln){
		$this -> firstName = $fn;
		$this -> lastName = $ln;
	}
	
	function serialize(){
		//use the build in php serialize function
		return serialize(
			array(
			"first" => $this -> firstName,
			"last" => $this -> lastName,
			)
		);
	}
	
	function unserialize($data){
		//use the build in php unserialize function
		$data = unserialize($data);
		$this -> firstName = $data['first'];
		$this -> lastName = $data['last'];
	}
}
?>