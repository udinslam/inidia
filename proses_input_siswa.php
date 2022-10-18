<?php

include "koneksi.php";



if(isset($_POST['upload'])){
   




    $namafile=$_FILES['gambar']['name'];
    $ukuranfile=$_FILES['gambar']['size'];
    $error=$_FILES['gambar']['error'];
    $tmpname=$_FILES['gambar']['tmp_name'];




    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];



 $extensigambarvalid =['jpg','jpeg','png'];
 $extensigambar =explode('.' ,$namafile);  
 $extensigambar =strtolower(end($extensigambar));
 
 

 if(!in_array($extensigambar,$extensigambarvalid)){
    echo "
    <script>
    alert('yang anda upload bukan gambar');
    </script>
    ";
    return false;

 }
 
 



 $namafilebaru =uniqid();
 $namafilebaru .='.';
 $namafilebaru .=$extensigambar;

 move_uploaded_file($tmpname,'gambar/'.$namafilebaru);

 $input="INSERT INTO tbl_siswa VALUES('','$nis','$nama','$alamat','$namafilebaru')";
 $hasil= mysqli_query($koneksi,$input);

 if($hasil){
    echo "
    <script>
    alert('data berhasil disimpan');
    window.location.href='tampil_siswa.php';
    </script>
    ";
    

 }    



 if($error === 4){
    echo "
    <script>
    alert('pilih gambar terlebih dahulu');
    </script>
    ";
    return false;




    if($ukuranfile > 1000000){
        echo "
        <script>
        alert('ukuran gambar terlalu besar');
        </script>
        ";
        return false;
    }
}
}
?> 