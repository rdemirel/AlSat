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