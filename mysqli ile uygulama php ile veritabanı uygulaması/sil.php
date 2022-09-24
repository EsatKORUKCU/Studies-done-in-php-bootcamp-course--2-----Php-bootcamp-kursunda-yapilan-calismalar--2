<?php
$baglan = new mysqli("localhost","esat","1234","deneme");
$baglan->set_charset("utf8");

$kayıtno = $_GET["id"];

$sorgu = $baglan->query("delete from ogrenciler where id=$kayıtno");

if($sorgu) {
    echo "<script>
    alert('Kayıt Silindi');
    window.location.href='liste.php';
    </script>";
} else {
    echo "Kayıt Silinemedi.";
}

?>