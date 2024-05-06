<?php

// Submit form pemasukan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idbarang = $_POST["idbarang"];
    $qtymasuk = $_POST["qtymasuk"];
    
    // Call the function to submit the form
    $result = InsertIntoPemasukan($idbarang, $qtymasuk);
    $updatedStock = UpdateStock($idbarang, $qtymasuk);

    // Handle the result if needed
    if ($result) {
        header('location: pemasukan.php');
    } else {
        // Handle the error
        header('location: pemasukan.php');
    }
}

function InsertIntoPemasukan($idbarang, $qtymasuk) {
    global $conn;
    // Prepare and execute the SQL query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO masuk (idbarang, jumlah_masuk) VALUES (?, ?)");
    $stmt->bind_param("ii", $idbarang, $qtymasuk);
    $result = $stmt->execute();
    // Return the result of the execution
    return $result;
}

function UpdateStockMasuk($idbarang, $qtymasuk) {
    global $conn;
    // Prepare and execute the SQL query to update the stock in the database
    $stmt = $conn->prepare("UPDATE stock SET stock = stock + ? WHERE kodebarang = ?");
    $stmt->bind_param("ii", $qtymasuk, $idbarang); // Reversed the order of parameters
    $result = $stmt->execute();
    // Return the result of the execution
    return $result;
}    