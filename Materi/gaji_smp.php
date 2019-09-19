<?php

    $gaji = 5000000;
    $pajak = 2.5;
    $ttl_pajak = ($gaji * $pajak)/100;
    $total = ($gaji - $ttl_pajak);

    echo "Gaji sebelum kena pajak : $gaji<br>";
    echo "Pajak : $ttl_pajak<br>";
    echo "Gaji setelah kena pajak : $total";

?>