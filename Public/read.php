<?php

require_once __DIR__ .'/../ vendor/autoload.php';

use App\Model\motorcycle;

$motorcycle = new motorcycle();
$motorcycles = $motorcycle->getAll();
?><nav>
    <a href="read.php">View All Motorcycle Details</a>
    <a href="create.php">Add Motorcycle Details</a>
    <a href="update.php">Edit Motorcycle Details</a>
    <a href="delete.php">delete Motorcycle Details</a>
</nav>
<hr><?php
foreach ($motorcycle as $m){
    echo "ID:{$m['id']} | Model:{$m['model']} | CC: {$m['cc']} | Transmission: {$m['transmission']} | Brakes: {'brakes']}<br>";
}

