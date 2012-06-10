<?PHP   
        include 'header.php';
        include 'solbar.php';
        //userobje nesnesi üye hakkında bütün bilgilere sahip
        //engelle özelliğine ilanlarımı göremesin eklenmeli
?>

    
    <div id="ortacik">
        <div id="profilsolblok">
            <div id="profilresimblogu">
                <div id="profilavatar"></div>
                <div id="profilavataralti">Mesaj Gönder </br> Arkadaşlarıma Ekle/Çıkar</br>İlanlarını Takip Et</br>Şikayet Et/Engelle</div>
            </div>
        </div>
        <div id="profilsagblok">
            <div id="profilisimbilgisi"></div>
            <div id="profildigerbilgiler">
                <Table>
                    <tr>
                        <td><? echo $userobje->adi." ".$userobje->soyadi;?></td>
                        
                    </tr>
                    <tr>
                        <td><? echo $userobje->okul."'de ".$userobje->bolum." okuyor";?></td>
                    </tr>
                    <tr>
                        <td>Yaşadığı Şehir:</td>
                        <td><? echo $userobje->sehir;?></td>
                    </tr>
                    <tr>
                        <td>Doğum Tarihi:</td>
                        <td><? echo $userobje->dtarih;?></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td><? echo $userobje->gsm;?></td>
                    </tr>
                    <tr>
                        <td>E-Posta:</td>
                        <td><? echo $userobje->email;?></td>
                    </tr>
                    <tr>
                        <td>Web:</td>
                        <td><? echo $userobje->site;?></td>
                    </tr>
                    <tr>
                        <td>Hakkında:</td>
                        <td><? echo $userobje->hakkinda;?></td>
                    </tr>
                </table>
            </div>
        </div>
       

  <?php 
        
        
            $ilanlar=$dba->query("SELECT * FROM as_ilan WHERE uye_id=$Uid");
            echo $userobje->adi." ".$userobje->soyadi." ilanları";
            while ($ilan=mysql_fetch_object($ilanlar)){
            $ekleyen=  ilaniduyeid($ilan->uye_id);
            $resimler=  mysql_query("SELECT * FROM as_resim WHERE ilan_id='$ilan->id'");
            $resim=  mysql_fetch_object($resimler);
            
            
       ?>
        
        
        <div class="yaziozet">
            <div id="yaziresim"><img src="<?PHP echo "image/ilanlar/".$ilan->id."/".$resim->resim1; ?>"></img></div>
            <div id="yazibaslik"><?php echo $ilan->baslik;?></div>
            <div id="yazitarih"><?php echo $ilan->ilantarihi;?></div>
            <div id="icerikozet"><?php echo $ilan->aciklama;?></div>
            <div id="yazibilgi">
                <div class="bilgidetay">Ekleyen: <?php echo $ekleyen->adi; echo " ".$ekleyen->soyadi;?></div>
                <div class="bilgidetay"><a href="index.php?output=tavsiyeet&id=<?php echo $ilan->id;?>">İyi Teklif </a>( <?php echo kackisibegendi($ilan->id); ?> kisi) </div>
                <div class="bilgidetay">Tavsiye ET</div>
                <div class="bilgidetay">Yorum Yap</div>
            </div>
        </div>
        
        <?php  }
        
        ?>
    
        </div>
   <?PHP 
   
   include 'sagbar.php';
   include 'ayaklik.php';  
   echo $_SESSION['AlimSatim']['Nick'];
   echo $_SESSION['AlimSatim']['UserID'];
   $dba->close(); ?>
</body>
</html>
