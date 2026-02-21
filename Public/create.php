<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\motorcycle;

$motorcycle = new motorcycle();
$message = "";

if 
($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST ['model'] ;
    $cc = $_POST ['cc'] ;
    $transmission = $_POST ['transmission'] ;
    $brakes = $_POST ['brakes'] ;
if ($motorcycle->create($model,$cc,$transmission,$brakes)){
    $message = "Motorcycle Created Successfully!";
}else{
    $message = "Failed to Create Motorcycle.";
}
}

?><nav>
    <a href="index.php" class="back" style="background-color: grey;">Back</a>
    
  </nav>
  <hr>
  <h2>Create Motorcycle Details</h2>
  <p><?= $message?> </p>
  <form method="POST"> Model: <input type="text" name="model" required><br>
  CC: <input type="text" name="cc" required><br>
  Transmission: <input type="text" name="transmission" required><br>
  brakes: <input type="text" name="brakes" required><br>  
  <button type="submit">Create</button>
  </form>

  <!DOCTYPE html>
  <html>
<head>
    <link rel="stylesheet" href="create.css">
    <title>Edit Motorcycle Details</title>

</head>
<body>