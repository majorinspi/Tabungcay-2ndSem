<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Model\motorcycle;

$motorcycle = new motorcycle();
$motorcycles = $motorcycle->getAll();
?>
<hr>
<!DOCTYPE html>
<html>
<head> 
    <title>Motorcycle Details</title>
    <link rel="stylesheet" href="Read.css">
    <style>
        button, .add {
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 0px;
            width: 40px;
            color: white;
            text-decoration: none;
        }

        .add:link {
            color: white;
            }
        add:visited {
            color: white;
            }
    </style>
    <nav>
   
    <a href="create.php" class="edit" style="background-color: grey;">Add Motorcycle Details</a>
  
    
  </nav>
    <table border="1">
        <tr><th>ID</th><th>Model</th><th>CC</th><th>Transmissions</th><th>Brakes</th><th>Actions</th></tr>

        <?php foreach ($motorcycles as $m): ?>
        <tr>
            <td>
            <?= $m['id'] ?>
            </td>
            <td><?= htmlspecialchars($m['model'])?></td>
            <td><?= htmlspecialchars($m['cc']) ?></td>
            <td><?= htmlspecialchars($m['transmission']) ?></td>
            <td><?= htmlspecialchars($m['brakes'])?></td>
            <td>
            <a class="edit" href="update.php?id=<?= $m['id'] ?>">Edit</a>
            <a class="delete" href="delete.php?id=<?= $m['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</head>

<body>