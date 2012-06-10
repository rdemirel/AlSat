<?PHP   
        include 'header.php';
        
        include 'solbar.php';
        
?>

    
    <div id="ortacik">
     
    

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
    
    
    
    if ($_POST["gonder"] == "Yükle")
{
	$kaynak		= $_FILES["resim"]["tmp_name"]; // Yüklenen dosyanın adı
	$klasor		= "image/"; // Hedef klasörümüz
	$yukle		= $klasor.basename($_FILES['resim']['name']);
	if ( move_uploaded_file($kaynak, $yukle) )
	{
		$dosya		= "image/" . $_FILES['resim']['name'];
		$resim		= imagecreatefromjpeg($dosya); 	// Yüklenen resimden oluşacak yeni bir JPEG resmi oluşturuyoruz..
		$boyutlar	= getimagesize($dosya); 		// Resmimizin boyutlarını öğreniyoruz
		$resimorani	= 450 / $boyutlar[0]; 			// Resmi küçültme/büyütme oranımızı hesaplıyoruz..
		$yeniyukseklik = $resimorani*$boyutlar[1]; 	// Bulduğumuz orandan yeni yüksekliğimizi hesaplıyoruz..
		$yeniresim	= imagecreatetruecolor("450", $yeniyukseklik); // Oluşturulan boş resmi istediğimiz boyutlara getiriyoruz..
 
		imagecopyresampled($yeniresim, $resim, 0, 0, 0, 0, "450", $yeniyukseklik, $boyutlar[0], $boyutlar[1]);
 
		// Yüklenen resmimizi istediğimiz boyutlara getiriyoruz ve boş resmin üzerine kopyalıyoruz..
		$hedefdosya="image/yeniresim-" . $_FILES['resim']['name']; // Yeni resimin kaydedileceği konumu belirtiyoruz..
		imagejpeg($yeniresim, $hedefdosya, 100); 		// Ve resmi istediğimiz konuma kaydediyoruz..
 
		//Kaydettiğimiz yeni resimin yolunu $hedefdosya değişkeni taşımaktadır..
		chmod ($hedefdosya, 0755); // chmod ayarını yapıyoruz dosyamızın..

	}
	else 
		echo "Resim Yüklenemedi";
	// Eğer resim yüklenemediyse move_uploaded_file fonksiyonundan değer false olacağından bu hatayı yazdırırız ekrana
}

     
    
?>


            <div id="tekilan">


                <form action="index.php" method="post">
                    <input type="text" name="baslik" value="<?PHP echo $ilan->baslik; ?>"></br>
                    <input type="text" name="adres" value="<?PHP echo $ilan->Adres; ?>"></br>
                    <input type="text" name="fiyat" value="<?PHP echo $ilan->fiyat; ?>"></br>
                    <select name="kategori">
                            <option value="0" selected>Kategoriler</option>
                            <option value="1">Bilgisayar</option>
                            <option value="2">Mutfak</option>
                            <option value="3">Koltuk</option>
                            <option value="other">Diger</option>
                            </select>
                    <select name="durum">
                            <option value="0" selected>Aktif</option>
                            <option value="1">Kaldır</option>
                            
                            </select>
                    <select name="urundurumu">
                            <option value="sifir" selected>Sıfır</option>
                            <option value="ikinciel">İkinci El</option>
                            </select>
                    <input type="text"  value="<?PHP echo $ilan->aciklama; ?>"></br>
                    <input type="text" value="<?PHP echo $ilan->garanti; ?>"></br>
                    <input type="submit" value="Düzenle">
                </form>
                
                    <form name="upload" method="post" action="ilanduzenle.php?ilanid=8" enctype="multipart/form-data">
			<input type="file" name="resim" id="resim" lang="tr" /><br />
			<input type="submit" name="gonder" id="gonder" value="Yükle"/>
		</form>






                <div id="tekbaslik"><?PHP echo $ilan->baslik; ?></div>
                <div id="tekresim"><img src="image/ilanlar/1/2.jpg"></div>
                <div id="tekbilgi">
                    <div class="ilanbilgiicerik">Adres:<?PHP echo $ilan->Adres; ?></div>
                    <div class="ilanbilgiicerik">İlan Tarihi:<?PHP echo $ilan->ilantarihi; ?></div>
                    <div class="ilanbilgiicerik">Garanti Durumu: <?PHP echo $ilan->garanti; ?></div>
                    <div class="ilanbilgiicerik">Ürün Durumu:<?PHP echo $ilan->urundurumu; ?></div>
                    <div class="ilanbilgiicerik">İlan Sahibi:<?PHP echo ilaniduyeid($ilan->uye_id)->adi." ".ilaniduyeid($ilan->uye_id)->soyadi; ?></div>
                    <div class="ilanbilgiicerik">İlan Durumu:<?PHP echo $ilan->durum ?></div>
                    <div class="ilanbilgiicerik">Kategorisi:<?PHP kategoriidkategori($ilan->kategori); ?></div>

                </div>
                <div id="tekfiyat"><?PHP echo $ilan->fiyat; ?></br>Teklif Ver </br> Hemen Al </br>Favorilerime Ekle</br>Şikayetim Var</div>
                <div id="tekpaylas">
                     <div class="bilgidetay"><a href="index.php?output=tavsiyeet&id=<?php echo $ilan->id;?>">İyi Teklif </a>( <?php echo kackisibegendi($ilan->id); ?> kisi) Tavsiye Et Yorum</div> 
                </div>
                <div id="tekaciklama"><?PHP echo $ilan->aciklama; ?></div>


            </div>
        </div>
   <?PHP 
   
   include 'sagbar.php';
   include 'ayaklik.php';  
   echo $_SESSION['AlimSatim']['Nick'];
   echo $_SESSION['AlimSatim']['UserID'];
   $dba->close(); ?>
</body>
</html>
