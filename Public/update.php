<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\motorcycle;

$motorcycle = new motorcycle();
$motorcycleData = null;
$message = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $motorcycleData = $motorcycle->getById($id);
}

if
($_SERVER['REQUEST_METHOD']=== 'POST'){
    $id = $_POST ['id'] ??'';
    $model = $_POST ['model'] ??'';
    $cc = $_POST['cc'] ??'';
    $transmission = $_POST ['transmission'] ??'';
    $brakes = $_POST['brakes'] ??'';

    if($motorcycle->update($id,$model,$cc,$transmission,$brakes)){
        $message = "Motorcycle Details updated successfuly!";
    }else{
        $message = "Failed to uppdate Motorcycle Details.";
    }
}
?><nav>
<a href="index.php" class="back">Back</a>

</nav>
    <hr>
    <h2>update Motorcycle Details</h2>
    <p><?= $message ?></p>
    <?php if (!$motorcycleData): ?>
        <form method = "GET">
            Enter Motorcycle ID to Edit: <input type = "number"
            name = "id" required><button type = "submit"> Load Motorcycle Details</button>
    </form>
    <?php else: ?>
        <form method = "POST"><input type = "hidden" name = "id" value = "<?= $motorcycleData['id']?>">
        Model: <input type = "text" name = "model" value ="<?= htmlspecialchars($motorcycleData['model']) ?>"required><br>
        CC: <input type = "text" name = "cc" value ="<?= htmlspecialchars($motorcycleData['cc']) ?>"required><br>
        Transmission: <input type = "text" name = "transmission" value ="<?= htmlspecialchars($motorcycleData['transmission']) ?>"required><br>
        Brakes: <input type = "text" name = "brakes" value ="<?= htmlspecialchars($motorcycleData['brakes']) ?>"required><br>
        <button type = "submit"><a href="index.php">Update</a></button>
        </form 
        <?php endif; ?>

    
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Update.css">
    <title>Edit Motorcycle Details</title>

</head>
<body>