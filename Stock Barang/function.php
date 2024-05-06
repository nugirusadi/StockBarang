<?php
    // Membuat koneksi ke database
    $conn = mysqli_connect("localhost","root","","Stock Barang");

    function GetStock() {
        global $conn; // Use the global keyword to access the $conn variable inside the function
        $data_stock = mysqli_query($conn, "SELECT * FROM stock");
        return $data_stock; // Return the result
    }

    function GetPemasukan() {
        global $conn;
        $data_pemasukan = mysqli_query($conn, "SELECT * FROM masuk JOIN stock WHERE masuk.idbarang = stock.kodebarang");
        return $data_pemasukan; // Return the result
    }

    function GetPengeluaran() {
        global $conn;
        $data_pengeluaran = mysqli_query($conn, "SELECT * FROM keluar JOIN stock WHERE keluar.idbarang = stock.kodebarang");
        return $data_pengeluaran; // Return the result
    }
?>