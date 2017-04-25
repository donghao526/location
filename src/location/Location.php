<?php
namespace Saltedfish\Location;

class Location {

	private $longitude;
	private $latitude;

	public function __construct($longitude, $latitude)
	{
		$this->longitude = $longitude;
		$this->latitude  = $latitude;
	}

	public function transformToAddress()
	{
		$longitude = $this->longitude;
		$latitude  = $this->latitude;
		echo "The address is $longitude and $latitude\n";
	}	
}