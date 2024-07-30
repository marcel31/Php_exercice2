<?php

namespace Practica1;

require_once 'Vehiculo.php';

class Car extends Vehiculo
{
    private $trunkSize;
    private $fuelType;

    public function __construct($id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, $fuelType)
    {
        parent::__construct($id, $model, $brand, $licensePlate, $rentPricePerDay);
        $this->trunkSize = $trunkSize;
        $this->fuelType = $fuelType;
    }

    public function getTrunkSize()
    {
        return $this->trunkSize;
    }

    public function setTrunkSize($trunkSize)
    {
        $this->trunkSize = $trunkSize;
    }

    public function getFuelType()
    {
        return $this->fuelType;
    }

    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
    }

    public function __toString()
    {
        return parent::__toString() .
        ", Tamaño del maletero: {$this->trunkSize}, Tipo de combustible: {$this->fuelType}";
    }

    public function calculateRentalPrice($days)
    {
        if ($this->fuelType == "Gasolina") {
            return ($this->rentPricePerDay * 2 * $days);
        } elseif ($this->fuelType == "Diesel") {
            return ($this->rentPricePerDay * 3 * $days);
        }
        return "Tipo de combustible NO VALIDO";
    }
}
