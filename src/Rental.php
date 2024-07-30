<?php

namespace Practica1;

require_once 'Interfaz.php';

require_once 'Vehiculo.php';

use DateTime;

class Rental implements Interficie1
{
    private $id;
    private $clientName;
    private $rentalStartDate;
    private $rentalEndDate;
    private $vehicle;

    public function __construct($id, $clientName, $rentalStartDate, $rentalEndDate, $vehicle)
    {
        $this->id = $id;
        $this->clientName = $clientName;
        $this->rentalStartDate = $rentalStartDate;
        $this->rentalEndDate = $rentalEndDate;
        $this->vehicle = $vehicle;
    }

    public function getClientName()
    {
        return $this->clientName;
    }

    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    public function getRentalStartDate()
    {
        return $this->rentalStartDate;
    }

    public function setRentalStartDate($rentalStartDate)
    {
        $this->rentalStartDate = $rentalStartDate;
    }

    public function getRentalEndDate()
    {
        return $this->rentalEndDate;
    }

    public function setRentalEndDate($rentalEndDate)
    {
        $this->rentalEndDate = $rentalEndDate;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }

    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function calculateTotalPrice()
    {
        $days = $this->calculateDurationInDays();
        return $this->vehicle->calculateRentalPrice($days);
    }

    public function calculateDurationInDays()
    {
        $startDate = new DateTime($this->rentalStartDate);
        $endDate = new DateTime($this->rentalEndDate);
        $interval = $startDate->diff($endDate);
        return $interval->days;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return "ID: {$this->id}, Nom Client: {$this->clientName}, Inici de l'arrendament: {$this->rentalStartDate},
        Final de l'arrendament: {$this->rentalEndDate}, Vehicle: {$this->vehicle}";
    }
}
