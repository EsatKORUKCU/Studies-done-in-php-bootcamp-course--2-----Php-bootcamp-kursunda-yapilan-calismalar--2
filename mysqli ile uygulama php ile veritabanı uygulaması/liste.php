<?php
$baglan = new mysqli("localhost","esat","1234","deneme");
$baglan->set_charset("utf8");

$sorgu = $baglan->query("select * from ogrenciler order by id asc");

echo "<table width='100%' border ='1'>
<tr align='center'>
<th>S.No</th>
<th>Adı Soyadı</th>
<th>Tc Kimlik</th>
<th>Telefon No</th>
<th>İşlemler</th>
</tr>";

while ($satir = $sorgu->fetch_object()){
    echo "<tr align='center'>
        <td> $satir->id </td>
        <td> $satir->adsoyad </td>
        <td> $satir->tckimlik </td>
        <td> $satir->telefon </td>
        <td> <a href='yeni.php?id=$satir->id'>dz</a> - <a href='sil.php?id=$satir->id'>sl</a> </td>
    </tr>";
}

echo "</table>";

$toplam = $sorgu->num_rows;

$sorgu->free_result();

$baglan->close();

echo "<br><br>Toplam $toplam Kayıt Bulundu.";

?>