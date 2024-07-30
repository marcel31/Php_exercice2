<?php

//Marcel y Mateo
namespace Practica1;

require_once 'Car.php';
require_once 'ElectricCar.php';
require_once 'Motorbike.php';
require_once 'Rental.php';
require_once 'ParkingLot.php';
require_once 'FleetManager.php';

$car = new Car(1, 'C1', 'Toyota', 'XYZ456', 50, 'Compacto', 'Gasolina');
$car2 = new Car(2, 'C2', 'Ford', 'JKL123', 55, 'Compacto', 'Gasolina');
$car3 = new Car(3, 'C3', 'Volkswagen', 'MNO456', 60, 'Compacto', 'Gasolina');

$moto = new Motorbike(4, 'M1', 'Honda', 'ABC123', 30, 'Sport');
$moto2 = new Motorbike(5, 'M2', 'Suzuki', 'DEF456', 35, 'Sport');
$moto3 = new Motorbike(6, 'M3', 'Kawasaki', 'GHI789', 40, 'Sport');

$electricCar = new ElectricCar(7, 'E1', 'Tesla', 'XYZ457', 80, 'Grande', 75, 250);
$electricCar2 = new ElectricCar(8, 'E2', 'Nissan', 'XYZ458', 70, 'Mediano', 60, 200);
$electricCar3 = new ElectricCar(9, 'E3', 'Chevrolet', 'XYZ459', 75, 'Mediano', 65, 220);

  //Rental

$rental = new Rental(1, "Juan", "2023-10-10", "2023-10-15", $moto);
$totalPrice = $rental->calculateTotalPrice();

print("<br>$rental");
print("<br>Total price: $totalPrice €");

$rentalCar = new Rental(2, "Carlos", "2023-10-16", "2023-10-23", $car);
$totalPrice = $rentalCar->calculateTotalPrice();
print("<br>$rentalCar");
print("<br>Total price: $totalPrice €");


$rentalElectricCar = new Rental(3, "Pedro", "2023-10-12", "2023-10-17", $electricCar);
$totalPrice = $rentalElectricCar->calculateTotalPrice();
print("<br>$rentalElectricCar");
print("<br>Total price: $totalPrice €");

$fleetManager = new FleetManager(3, 10);

// Agregar vehículos de prueba
$fleetManager->addVehicle(1, 1, 'Model1', 'Brand1', 'ABC123', 50.0, 500, 'Gasolina');
$fleetManager->addVehicle(2, 2, 'Model2', 'Brand2', 'XYZ456', 60.0, 400, 'Electricity', 100, 200);
$fleetManager->addVehicle(3, 3, 'Model3', 'Brand3', 'DEF789', 40.0, 0, 'Gasolina', 0, 0, 'off-road');

// Listar vehículos disponibles
print("<br>");
echo "Vehículos disponibles:\n";
$fleetManager->getAvailableVehicles();

// Realizar una simulación de alquiler
print("<br>");
echo "Simulación de alquiler:\n";
$fleetManager->addRental(1, "Paco", "2023-10-12", "2023-10-17");
$fleetManager->addRental(2, "Pedro", "2023-10-13", "2023-10-18");

// Listar vehículos disponibles después del alquiler
print("<br>");
echo "Vehículos disponibles después del alquiler:\n";
$fleetManager->getAvailableVehicles();

// Calcular ingresos totales de alquileres activos
$incomeMessage = $fleetManager->getTotalActiveRentalIncome($fleetManager->getRentals());
print("<br>");
echo $incomeMessage;

$fleetManager->endRental(1);

$incomeMessage = $fleetManager->getTotalActiveRentalIncome($fleetManager->getRentals());
print("<br>");
echo $incomeMessage;

$fleetManager->parkVehicle(1, 1, 'Model1', 'Brand1', 'ABC123', 50.0, 500, 'Gasolina');
