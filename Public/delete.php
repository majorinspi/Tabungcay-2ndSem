<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\motorcycle;

$motorcycle = new motorcycle();
$message = "";

if 
($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST ['id'] ??'';
if ($motorcycle->delete($id)){
    $message = "Motorcycle deleted successfully!";
}else{
    $message = "Failed to delete Motorcycle details.";
}
}
?><nav>
<a href="index.php" class="back">Back</a>

</nav>
<hr>
<h2>Delete Motorcycle Details</h2>
<p><?= $message ?></p>
<form method = "POST">
    Enter Motorcycle ID to Delete:
    <input type = "number"
    name = "id" required><button
    type = "submit">Delete</button>
</form>



<html>
<head>
    <link rel="stylesheet" href="delete.css">
    <title>Edit Motorcycle Details</title>

</head>
<body>
