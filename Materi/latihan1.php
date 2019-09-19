<?php

    //deklarasi
    $nama       = "Sandi Pratama";
    $id       = 1118101004;
    $jurusan    = "Sistem Informasi";

    $gaji       = 10000000;
    $trans      = 5000000;
    $gp         = $gaji + $trans;

    //kondisi
    if ($gp >= 10000000){
        $ttl = $gp - ($gp*0.2);
        $pjk = "20%";
    }
    else if ($gp >= 5000000){
        $ttl = $gp - ($gp*0.1);
        $pjk = "10%";
    }
    else{
        $ttl = $gp - ($gp*0.05);
        $pjk = "5%";
    }

    //output

    echo"<center><h1>Data Gaji</h1></center><br>";
    echo"<center><h2>Pegawai Xie.Design </h2></center><br>";

    echo"<hr>";

    echo"Nama       : $nama<br>";
    echo"Id         : $id<br>";
    echo"Divisi     : $jurusan<br>";

    echo"<hr>";

    echo"Gaji       : $gaji<br>";
    echo"Transport  : $trans<br>";
    echo"Pajak      : $pjk<br>";
    echo"Total      : $ttl<br>";

    echo"<hr>";

?>