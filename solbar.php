 <div id="solic">
        <div class="yanmenu">KATEGORİLER
            <div class="yanmenuicerik">
                <?php 
                     $kategoriler=$dba->query("SELECT * FROM as_kategori ORDER BY kategori ASC ");
                     while($kategori=mysql_fetch_object($kategoriler))
                    {
                        echo "<a href='kategoriler.php?id=".$kategori->id."'>".$kategori->kategori." (".$kategori->ilansayisi." ilan)<br></a>";
                    }
                ?>
            </div>
        </div>
        
     <div class="yanmenu">HAFTANIN EN İYİ TEKLİFİ</br>
         <?PHP 
            
            $teklifler=  mysql_query("SELECT ilan_id,COUNT(*) AS 'tavsiyesayilari' FROM as_tavsiye WHERE DATEDIFF(CURDATE(),tavsiyetarih)<7 GROUP BY ilan_id ORDER BY tavsiyesayilari DESC");
            while($tavsiye = mysql_fetch_object($teklifler))
            {
                $uyekim=mysql_query("SELECT adi,soyadi FROM as_users,as_ilan WHERE as_users.id=as_ilan.uye_id AND as_ilan.id='$tavsiye->ilan_id'");
                $uye=mysql_fetch_object($uyekim);
                echo $uye->adi,$uye->soyadi." in ilanı (".$tavsiye->tavsiyesayilari.") >><br>";
                
                
                
            }
         ?>
        
        
        
        
        </div>
        <div class="yanmenu">SON YORUMLAR</div>
    </div>