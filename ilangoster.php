<?PHP
    $ilanid=$_REQUEST['ilanid'];
    $ilan=ilanidilan($ilanid);
    function durumne($gelen)
    {
        if($gelen->durum == 1)
        {
            echo "Aktif";
        }
        else 
        {
            echo "Satıldı";
        }
    }
    


?>


<div id="tekilan">
    
    
    
    
    <div id="tekbaslik"><?PHP echo $ilan->baslik; ?> <a  style="text-align: right;" href="ilanduzenle.php?ilanid=<?PHP echo $ilan->id; ?>">İlanı Düzenle</a></div>
    <div id="tekresim"><img src="image/ilanlar/1/2.jpg"></div>
    <div id="tekbilgi">
        <div class="ilanbilgiicerik">Adres:<?PHP echo $ilan->Adres; ?></div>
        <div class="ilanbilgiicerik">İlan Tarihi:<?PHP echo $ilan->ilantarihi; ?></div>
        <div class="ilanbilgiicerik">Garanti Durumu: <?PHP echo $ilan->garanti; ?></div>
        <div class="ilanbilgiicerik">Ürün Durumu:<?PHP echo $ilan->urundurumu; ?></div>
        <div class="ilanbilgiicerik">İlan Sahibi:<?PHP echo ilaniduyeid($ilan->uye_id)->adi." ".ilaniduyeid($ilan->uye_id)->soyadi; ?></div>
        <div class="ilanbilgiicerik">İlan Durumu:<?PHP durumne($ilan); ?></div>
        <div class="ilanbilgiicerik">Kategorisi:<?PHP kategoriidkategori($ilan->kategori); ?></div>
        
    </div>
    <div id="tekfiyat"><?PHP echo $ilan->fiyat; ?> tl</br><a class='inline' href="#inline_content">Teklif Ver</a> </br> Hemen Al </br>Favorilerime Ekle</br>Şikayetim Var</div>
    <div id="tekpaylas">
         <div class="bilgidetay"><a href="index.php?output=tavsiyeet&id=<?php echo $ilan->id;?>">İyi Teklif </a>( <?php echo kackisibegendi($ilan->id); ?> kisi) Tavsiye Et Yorum</div> 
    </div>
    <div id="tekaciklama"><?PHP echo $ilan->aciklama; ?></div>
    
    
</div>
<?PHP include 'yorum.php'; ?>