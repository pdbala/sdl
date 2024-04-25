<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Information</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
   body{
    background-image:url("cars.webp");
   }
</style>

</head>
<body>
<div class="container bg-white d-flex justify-content-center flex-column mw-400 my-3 mt-5 card" style="max-width: 600px;">
    <h1 class="text-center mt-3">
        Inheritance with Vehicles 🚗
    </h1>
    <form method="POST" class="p-3 m-3">
        <label for="brand">Select Brand:</label>
        <select class="form-select mb-3" name="brand">
        <option value="Toyota">Tata</option>
            <option value="Toyota">Mahindra</option>
            <option value="Honda">Honda</option>
            <option value="Ford">Ford</option>
            <!-- Add more options as needed -->
        </select>

        <label for="model">Model:</label>
        <input class="form-control mb-3" type="text" name="model">

        <label for="year">Year:</label>
        <input class="form-control mb-3" type="text" name="year">

        <label for="engineType">Select Engine Type:</label>
        <select class="form-select mb-3" name="engineType">
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <!-- Add more options as needed -->
        </select>

        <button class="btn btn-outline-info text-dark" type="submit">Search</button>
    </form>

<?php
// Parent class
class Vehicle
{
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getInfo()
    {
        return "<strong>Brand: </strong> {$this->brand} <br><strong>Model : </strong> {$this->model}<br><strong>Year:</strong>: {$this->year}<br>";
    }
}

// Engine class
class Engine
{
    protected $engineType;

    public function __construct($engineType)
    {
        $this->engineType = $engineType;
    }

    public function getEngineType()
    {
        return "{$this->engineType}";
    }
}

// Child class inheriting from Vehicle and Engine
class Car extends Vehicle
{
    protected $engine;

    public function __construct($brand, $model, $year, $engineType)
    {
        parent::__construct($brand, $model, $year);
        $this->engine = new Engine($engineType);
    }

    public function getType()
    {
        return "Type: Car";
    }

    public function getEngineType()
    {
        return $this->engine->getEngineType();
    }
}

// Function to display vehicle information
function displayVehicleInfo($vehicle)
{
    ?>
        <div class='container card'>
        <h2 class='mt-1 mb-4'>Vehicle Information:</h2>
        <div class='row'>
        <div class='col-md-6'>
        <p class='mb-2'><strong>Type:</strong><?php echo $vehicle->getType(); ?> </p>
        <p class='mb-2'><?php echo $vehicle->getInfo(); ?></p>
        </div>
        <div class='col-md-6'>
        <p class='mb-2'><strong>Engine Type: </strong> <?php echo $vehicle->getEngineType(); ?></p>
        </div>
        </div>
        </div>
       <?php
}
// Function to display vehicle information with Bootstrap styling

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $engineType = $_POST["engineType"];

    // Create instance of Car
    $car = new Car($brand, $model, $year, $engineType);

    // Display vehicle information
    displayVehicleInfo($car);
}
?>
</div>