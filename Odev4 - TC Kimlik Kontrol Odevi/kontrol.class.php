<?php

class Kontrol
{
    public $tcNo;
    public $adsoyad;
    public $tcNoDurum;
    private $baglan;
    public function __construct()
    {
        $this->baglan = new PDO("mysql:host=localhost;dbname=kimlikdb;charset=utf8", "burak", "1234");
        $this->baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function tcNoKontrol()
    {
        $kontrol = true;
        $tcNoSplit = str_split($this->tcNo);

        if ($tcNoSplit[0] == 0)
            $kontrol = false;

        if (count($tcNoSplit) > 11 || count($tcNoSplit) < 11)
            $kontrol = false;

        $tekSayilar = ($tcNoSplit[0] + $tcNoSplit[2] + $tcNoSplit[4] + $tcNoSplit[6] + $tcNoSplit[8]) * 7;
        $ciftSayilar = ($tcNoSplit[1] + $tcNoSplit[3] + $tcNoSplit[5] + $tcNoSplit[7]);
        $genelToplam = $tekSayilar - $ciftSayilar;
        $mod = $genelToplam % 10;

        if ($mod != $tcNoSplit[9]) {
            $kontrol = false;
        }

        if (($tcNoSplit[0] + $tcNoSplit[1] + $tcNoSplit[2] + $tcNoSplit[3] + $tcNoSplit[4] + $tcNoSplit[5] + $tcNoSplit[6] + $tcNoSplit[7] + $tcNoSplit[8] + $tcNoSplit[9]) % 10 != $tcNoSplit[10]) {
            $kontrol = false;
        }


        return $kontrol;
    }

    public function kayitEkle()
    {
        $tcNoKey = "T.C. No Geçerli";
        if ($this->tcNoDurum === false) {
            $tcNoKey = "T.C. No Geçersiz";
        }
        $ekle = $this->baglan->prepare("INSERT INTO kayitlar(tckimlik,adsoyad,durum) values(?,?,?)");
        $insert = $ekle->execute(array($this->tcNo, $this->adsoyad, $tcNoKey));
    }

    public function listele()
    {
        $listele = $this->baglan->prepare("select * from kayitlar order by id asc");
        $listele->execute();
        return $listele;
    }

    public function __destruct()
    {
        $this->baglan = null;
    }
}
