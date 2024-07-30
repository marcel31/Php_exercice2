<?php

namespace Practica1;

require_once 'Car.php';
require_once 'ElectricCar.php';
require_once 'Motorbike.php';
require_once 'Rental.php';
require_once 'ParkingLot.php';

class FleetManager
{
    private $vehicles = array();
    private $rentals = array();
    private $parking = array();

    public function __construct($numPisos, $numPlaces)
    {
        for ($i = 0; $i < $numPisos; $i++) {
            for ($j = 0; $j < $numPlaces; $j++) {
                $this->parking[$i][$j] = new ParkingLot(null, $i, $j);
            }
        }
    }

    public function addVehicle($vehicleType, $id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, $fuelType, $batteryCapacity = 0, $range = 0, $type = "city")
    {
        switch ($vehicleType) {
            // Car
            case 1:
                $car = new Car($id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, $fuelType);
                $this->vehicles[] = $car;
                echo "<br>Vehiculo creado";
                $this->parkVehicle($car);
                break;
            // Electric Car
            case 2:
                $electricCar = new ElectricCar($id, $model, $brand, $licensePlate, $rentPricePerDay, $trunkSize, $batteryCapacity, $range);
                $this->vehicles[] = $electricCar;
                echo "<br>Vehiculo creado";
                $this->parkVehicle($electricCar);
                break;
            // Motorbike
            case 3:
                $motorbike = new Motorbike($id, $model, $brand, $licensePlate, $rentPricePerDay, $type);
                $this->vehicles[] = $motorbike;
                echo "<br>Vehiculo creado";
                $this->parkVehicle($motorbike);
                break;
            default:
                echo "<br>Opción vehicleType no válida, introduce un valor entre 1 i 3: (1=Car;2=ElectricCar;3=Motorbike)";
        }
    }

    public function removeVehicle($parametro)
    {
        //Elimina el vehiculo del array de vehiculos
        foreach ($this->vehicles as $i => $vehicle) {
            if ($vehicle->id == $parametro || $vehicle->matricula == $parametro) {
                unset($this->vehicles[$i]);
                echo "<br>El vehiculo se ha eliminado correctamente";
            }
        }
    }

    public function addRental($parametro, $clientName, $rentalStartDate, $rentalEndDate)
    {
        // El vehículo deseado se quita del catálogo y se renta
        foreach ($this->vehicles as $i => $vehicle) {
            if ($vehicle !== null && ($vehicle->getId() == $parametro || $vehicle->getLicensePlate() == $parametro)) {
                $this->rentals[] = new Rental($parametro, $clientName, $rentalStartDate, $rentalEndDate, $vehicle);
                unset($this->vehicles[$i]);
                echo "<br>El vehículo se ha rentado correctamente";
            }
        }

        // Hace que el valor del vehículo deseado en la plaza del parking en la que se encuentra se convierta en null en la posición anterior del mismo coche
        for ($i = 0; $i < count($this->parking); $i++) {
            for ($j = 0; $j < count($this->parking[$i]); $j++) {
                $vehicle = $this->parking[$i][$j]->vehicle;
                if ($vehicle !== null && ($vehicle->getId() == $parametro || $vehicle->getLicensePlate() == $parametro)) {
                    $this->parking[$i][$j]->vehicle = null;
                    echo "<br>Vehículo desaparcado";
                }
            }
        }
    }

    public function endRental($parametro)
    {
        foreach ($this->rentals as $i => $vehicle) {
            if ($vehicle !== null && ($vehicle->getId() == $parametro)) {
                $this->vehicles[] = $vehicle;
                unset($this->rentals[$i]);
                echo "<br>El vehículo se ha desrentado correctamente";
            }
        }
    }
    public function getAvailableVehicles()
    {
        foreach ($this->vehicles as $vehicle) {
            echo $vehicle . "\n";
        }
    }

    public function getTotalActiveRentalIncome($rentals)
    {
        $totalIncome = 0;
        foreach ($rentals as $rental) {
            print("<br>$rental");
            // $v = $rental->getVehicle();
            // $r = $v->calculateRentalPrice(($rental->getRentalStartDate() - $rental->getRentalEndDate()));
            $totalIncome += $rental->getVehicle()->calculateRentalPrice($rental->calculateDurationInDays());
        }
        return "Ingressos totals dels lloguers: $totalIncome €";
    }

    public function parkVehicle($vehicle)
    {
        foreach ($this->parking as $i => $floor) {
            foreach ($floor as $j => $parkingLot) {
                if ($parkingLot->getVehicle() === null) {
                    $parkingLot->setVehicle($vehicle);
                    echo "<br>Vehículo aparcado en Piso $i, Plaza $j";
                    return;
                }
            }
        }
    }

    public function unParkVehicle($matricula)
    {
        foreach ($this->parking as $piso => $floor) {
            foreach ($floor as $plazas => $parkingLot) {
                if ($parkingLot->getVehicle() !== null && $parkingLot->getVehicle()->getLicensePlate() === $matricula) {
                    $parkingLot->setVehicle(null);
                    return;
                }
            }
        }
    }

    public function findVehicle($matricula)
    {
        foreach ($this->parking as $piso => $floor) {
            foreach ($floor as $plazas => $parkingLot) {
                if ($parkingLot->getVehicle() !== null && $parkingLot->getVehicle()->getLicensePlate() === $matricula) {
                    echo "<br>El vehículo con matrícula $matricula se encuentra en el Piso $piso, Plaza $plazas.";
                    return;
                }
            }
        }
    }

    public function moveVehicle($matricula, $floor, $spot)
    {
        foreach ($this->parking as $piso => $floor) {
            foreach ($floor as $plazas => $parkingLot) {
                if ($parkingLot->getVehicle() !== null && $parkingLot->getVehicle()->getLicensePlate() === $matricula) {
                    if ($this->parking[$floor][$spot]->getVehicle() === null) {
                        $Coche = $this->parking[$piso][$plazas]->getVehicle();
                        $this->parking[$piso][$plazas]->setVehicle(null);
                        $this->parking[$floor][$spot]->setVehicle($Coche);
                    }
                    return;
                }
            }
        }
    }

    public function getRentals()
    {
        return $this->rentals;
    }
}
