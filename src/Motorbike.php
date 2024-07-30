<?php

namespace Practica1;

require_once 'Vehiculo.php';

class Motorbike extends Vehiculo
{
    private $type;

    public function __construct($id, $model, $brand, $licensePlate, $rentPricePerDay, $type)
    {
        parent::__construct($id, $model, $brand, $licensePlate, $rentPricePerDay);
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function __toString()
    {
        return parent::__toString() . ", Tipo: {$this->type}";
    }
    public function calculateRentalPrice($days)
    {
        return $this->rentPricePerDay * $days;
    }
}
