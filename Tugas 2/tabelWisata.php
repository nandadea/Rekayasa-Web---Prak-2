<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// alamat localhost untuk file getWisata.php, ambil hasil export JSON
$send = curl("http://localhost/prakrekayasaweb/pertemuan2/getWisata.php");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

// Mulai membuat tabel HTML
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>KOTA</th>
        <th>LANDMARK</th>
        <th>TARIF</th>
      </tr>";

// Loop untuk menampilkan setiap data sebagai baris dalam tabel tanpa ID Wisata
foreach($data as $row){
    echo "<tr>";
    echo "<td>".$row["kota"]."</td>";
    echo "<td>".$row["landmark"]."</td>";
    echo "<td>".$row["tarif"]."</td>";
    echo "</tr>";
}

// Menutup tabel HTML
echo "</table>";
?>
