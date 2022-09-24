<?php

$kayıtno = $_GET["id"];

    if ($kayıtno>0){
        $baglan = new mysqli("localhost","esat","1234","deneme");
        $baglan->set_charset("utf8");

        $sorgu = $baglan->query("select * from ogrenci where id=$kayıtno");
        $satir = $sorgu->fetch_object();
    }

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa - Veritabanı Uygulaması</title>
</head>
<body>
    <div style="text-align:center;">
        <a href="index.html">ANA SAYFA</a> <a href="liste.php">Kayıt Listesi</a>
        <a href="yeni.php">YENİ KAYIT</a>
        <br><hr><br><br>
        LÜTFEN MENÜDEN BİR İŞLEM SEÇİN...
    </div>

    <form action="ekle.php" method="post" style="text-align:center;">
        <strong>Adı Soyadı:</strong> <input type="text" name="adsoyad" value="<?php echo $satir->adsoyad; ?>" size="30">
        <br><br>
        <strong>TC Kimlik:</strong> <input type="text" name="tckimlik" value="<?php echo $satir->tckimlik; ?>" size="30">
        <br><br>
        <strong>Telefon No:</strong> <input type="text" name="telefon" value="<?php echo $satir->telefon; ?>" size="30">
        <br><br>
        <input type="hidden" name="id"value="<?php echo $satir->id; ?>">
        <input type="submit" value ="Kaydet">
    </form>

</body>
</html>