<?php
class mainclass
{
    public $baglan;
    public function __construct()
    {
        session_start();
        $this->baglan = new PDO("mysql:host=localhost;dbname=emlak;charset=utf8", "burak", "1234");
        $this->baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function logincontrol($kullaniciAdi, $sifre)
    {
        $sorgu = $this->baglan->prepare("select * from kullanicilar where kullaniciAdi=? and parola=?");
        $sorgu->execute([
            $kullaniciAdi, $sifre
        ]);
        return  $sorgu->fetchAll();
    }

    public function emlakBilgisiGetir()
    {
        $sorgu = $this->baglan->prepare("select *,(select sehiradi from iller as i where i.id = e.il) as ilAdi,(select ilceadi from ilceler as il where il.id = e.ilce) as ilceAdi from emlak as e order by id asc");
        $sorgu->execute();

        return $sorgu;
    }

    public function emlakSil($id)
    {
        $sorgu = $this->baglan->prepare("delete from emlak where id = ?");
        $sorgu->execute([$id]);
        header("Location:dashboard.php");
        return $sorgu;
    }

    public function emlakEkle($array)
    {
        $sorgu = $this->baglan->prepare("insert into emlak(ilanBaslik,ilanAciklama,emlakTuru,emlakKategori,emlakFiyat,olusturmaTarihi,il,ilce,metrekare,odaSayisi,binaYasi,bulunduguKat,resim1,resim2,resim3) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sorgu->execute([
            $array['ilanBaslik'],
            $array['ilanAciklama'],
            $array['emlakTuru'],
            $array['emlakKategori'],
            (int)$array['emlakFiyat'],
            $array['olusturmaTarihi'],
            $array['il'],
            $array['ilce'],
            (int) $array['metrekare'],
            $array['odaSayisi'],
            (int) $array['binaYasi'],
            (int) $array['bulunduguKat'],
            $array['resim1'],
            $array['resim2'],
            $array['resim3'],
        ]);
        return true;
    }

    public function emlakGuncelle($array)
    {
        $sorgu = $this->baglan->prepare("update emlak set  ilanBaslik = ?,ilanAciklama=?,emlakTuru=?,emlakKategori=?,emlakFiyat=?,olusturmaTarihi=?,il=?,ilce=?,metrekare=?,odaSayisi=?,binaYasi=?,bulunduguKat=?,resim1=?,resim2=?,resim3=? where id = ?");
        $sorgu->execute([
            $array['ilanBaslik'],
            $array['ilanAciklama'],
            $array['emlakTuru'],
            $array['emlakKategori'],
            (int)$array['emlakFiyat'],
            $array['olusturmaTarihi'],
            $array['il'],
            $array['ilce'],
            (int) $array['metrekare'],
            $array['odaSayisi'],
            (int) $array['binaYasi'],
            (int) $array['bulunduguKat'],
            $array['resim1'],
            $array['resim2'],
            $array['resim3'],
            (int) $array['id'],
        ]);
        return true;
    }

    public function emlakDetayGetir($id)
    {
        $sorgu = $this->baglan->prepare("select * from emlak where id = ?");
        $sorgu->execute([$id]);

        return $sorgu;
    }

    public function ilGetir()
    {
        $sorgu = $this->baglan->prepare("select * from iller");
        $sorgu->execute([]);

        return $sorgu;
    }

    public function ilceGetir($sehirid)
    {
        $sorgu = $this->baglan->prepare("select * from ilceler where sehirid = ?");
        $sorgu->execute([$sehirid]);

        return $sorgu->fetchAll();
    }

    public function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function __destruct()
    {
        $this->baglan = null;
    }
}
