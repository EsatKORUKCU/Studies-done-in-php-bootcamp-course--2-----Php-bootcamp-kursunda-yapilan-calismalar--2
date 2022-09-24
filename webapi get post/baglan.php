<?php
    $baglan = new PDO("mysql:host=localhost;dbname=ogrenciler;charset=utf8","mehmet","12345");
    $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $baglan->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $baglan->setAttribute(PDO::ATTR_DEFULT_FETCH_MODE, PDO::FECTH_ASSOC);
    $baglan->setAttribute();
?>