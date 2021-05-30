<!-- koneksi database -->
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


//     // return barang
//      if(isset($_POST['addretur'])){
//         $barangnya = $_POST['barangnya'];
//         $qty = $_POST['qty'];
//         $keterangan = $_POST['ket'];
//         $tanggal = $_POST['tgl'];

//         $cekstocksekarang = mysqli_query($conn, "select * from notif where idbarang='$barangnya'");
//         $ambildatanya = mysqli_fetch_array($cekstocksekarang);
//         $namaBarangNYa = $ambildatanya['namabarang']; 
//         $stocksekarang = $ambildatanya['stock'];

//         $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

//         if($qty > $stocksekarang) {
//             $message = "Update Stock Melebihi Sisa Stock Yang Ada!";
//             echo "<script type='text/javascript'>alert('$message');</script>";
//         } else {
//             $addtokeluar =mysqli_query($conn, "insert into retur (idbarang, namabarang, qty, ket, tgl) values('$barangnya', '$namaBarangNYa', '$qty', '$keterangan', '$tanggal')");
//             $updateNotifMasuk = mysqli_query($conn, "update notif set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
//             $updateStockMasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
//             if($addtokeluar){
//                 header('location:retur.php');
//             } else{
//                 echo("Error description: " . $conn -> error);
//             }
//         }
//     }



//     // mengubah data barang retur
//     if(isset($_POST['updatebarangkeluar'])){
//         $idb = $_POST['idb'];
//         $idk = $_POST['idk'];
//         $qty = $_POST['qty'];

//         $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
//         $stocknya = mysqli_fetch_array($lihatstock);
//         $stockskrg = $stocknya['stock'];

//         $qtyskrg = mysqli_query($conn, "select * from retur where idretur='$idk'");
//         $qtynya = mysqli_fetch_array($qtyskrg);
//         $qtyskrg = $qtynya['qty'];

//         $baseStock = $stockskrg + $qtyskrg;
//         $updateStock = $baseStock - $qty;

//         if ($qty > $baseStock) {
//             $message = "Update Stock Melebihi Sisa Stock Yang Ada!";
//             echo "<script type='text/javascript'>alert('$message');</script>";
//         } else {
//             $updateNotifMasuk = mysqli_query($conn, "update retur set qty='$qty' where idretur='$idk'");
//             $updateNotifMasuk = mysqli_query($conn, "update notif set stock='$updateStock' where idbarang='$idb'");
//             $updateStockMasuk = mysqli_query($conn, "update stock set stock='$updateStock' where idbarang='$idb'");
//             header('location:retur.php');
//         }
//     }


//     // menghapus barang keluar
//     if(isset($_POST['hapusbarangkeluar'])){
//         $idb =$_POST['idb'];
//         $qty =$_POST['kty'];
//         $idk = $_POST ['idk'];

//         $getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
//         $data = mysqli_fetch_array($getdatastock);
//         $stok = $data['stock'];

//         $selisih = $stok+$qty;

//         $hapusdata = mysqli_query($conn, "delete from retur where idretur='$idk'");

//         if($hapusdata){
//             $updateNotifMasuk = mysqli_query($conn, "update notif set stock='$selisih' where idbarang='$idb'");
//             $updateStockMasuk = mysqli_query($conn, "update stock set stock='$selisih' where idbarang='$idb'");
//             header('location:retur.php');
//         } else{
//             $message = "GAGAL HAPUS!";
//             echo "<script type='text/javascript'>alert('$message');</script>";
//         }
//     }



?>