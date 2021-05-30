<?php

    $conn = mysqli_connect("localhost", "root", "", "dbreject");

    // menambah barang baru
    if(isset($_POST['tambahbarang'])){
        $hasil_produksi = $_POST['hasil'];
        $quality_control = $_POST['qc'];
        $good_quality = $_POST['gq'];
        $barang_reject = $_POST['br'];
        $jenis_reject = $_POST['jr'];
        $tanggal = $_POST['tgl'];

        $add_data = mysqli_query($conn,
        "INSERT INTO barang (
            hasil, 
            qc, 
            gq,
            br,
            jr,
            tgl) values(
                '$hasil_produksi',
                '$quality_control',
                '$good_quality',
                '$barang_reject',
                '$jenis_reject',
                '$tanggal')");
        if($add_data){
            header('location:index.php');
        } else{
            echo 'Gagal';
            header('location:index.php');
        }

    };

    // update info barang
    if(isset($_POST['updatebarang'])){
        $idb = $_POST['idb'];
        $hasil_produksi = $_POST['hasil'];
        $quality_control = $_POST['qc'];
        $good_quality = $_POST['gq'];
        $barang_reject = $_POST['br'];
        $jenis_reject = $_POST['jr'];
        $tanggal = $_POST['tgl'];

        $update_data = mysqli_query($conn, 
        "UPDATE barang SET 
            hasil='$hasil_produksi', 
            qc='$quality_control', 
            gq='$good_quality',
            br='$barang_reject',
            jr='$jenis_reject',
            tgl='$tanggal' WHERE idbarang='$idb'");
        if($update_data){
            header('location:index.php');
        } else{
            $message = "Update Data Gagal!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }


    // hapus barang
    if(isset($_POST['hapusbarang'])){
        $idb = $_POST['idb'];

        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE idbarang='$idb'");
        if($hapus){
            header('location:index.php');
        } else{
            $message = "Hapus Data Gagal!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>