<?php

namespace Practica1;

class ParkingLot
{
    public $vehicle;
    private $floor;
    private $spotNumber;

    public function __construct($vehicle, $floor, $spotNumber)
    {
        $this->vehicle = $vehicle;
        $this->floor = $floor;
        $this->spotNumber = $spotNumber;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }

    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function getSpotNumber()
    {
        return $this->spotNumber;
    }
}
