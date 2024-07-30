<?php

namespace Practica1;

require_once 'Vehiculo.php';

class ElectricCar extends Car
{
    private $batteryCapacity;
    private $range;
    private $fuelType;

    public function __construct($id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, $batteryCapacity, $range)
    {
        parent::__construct($id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, "Electricity");
        $this->batteryCapacity = $batteryCapacity;
        $this->range = $range;
    }

    public function getBatteryCapacity()
    {
        return $this->batteryCapacity;
    }

    public function setBatteryCapacity($batteryCapacity)
    {
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getRange()
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
    }

    public function __toString()
    {
        return parent::__toString() .
        ", Capacidad de Bateria: {$this->batteryCapacity}, Rango: {$this->range}";
    }

    public function calcEfficiency()
    {
        return ($this->range / $this->batteryCapacity);
    }

    public function calculateRentalPrice($days)
    {
        $discountedPrice = $this->rentPricePerDay - (0.25 * $this->rentPricePerDay);
        return $discountedPrice * $days;
    }
}
