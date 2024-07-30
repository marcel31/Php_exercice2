<?php

namespace Practica1;

require_once "Interfaz.php";

abstract class Vehiculo implements Interficie1
{
    protected $id;
    protected $model;
    protected $brand;
    protected $licensePlate;
    protected $rentPricePerDay;

    protected function __construct($id, $model, $brand, $licensePlate, $rentPricePerDay)
    {
        $this->id = $id;
        $this->model = $model;
        $this->brand = $brand;
        $this->licensePlate = $licensePlate;
        $this->rentPricePerDay = $rentPricePerDay;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;
    }

    public function getRentPricePerDay()
    {
        return $this->rentPricePerDay;
    }

    public function setRentPricePerDay($rentPricePerDay)
    {
        $this->rentPricePerDay = $rentPricePerDay;
    }

    public function __toString()
    {
        return "Modelo: {$this->model}, Marca: {$this->brand}, Matrícula: {$this->licensePlate}";
    }

    abstract public function calculateRentalPrice($days);
}
