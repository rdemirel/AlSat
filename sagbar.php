 <div id="sagcik">
     <div class="yanmenu"> DUYSUN HERKES </BR>
       <?PHP 
            $duysunlar=  mysql_query("SELECT uye_id,resimurl,adi,soyadi,mesaj FROM as_users,as_duysun WHERE as_users.id=as_duysun.uye_id ORDER BY as_duysun.id DESC LIMIT 10 ");
            while ($duysun=  mysql_fetch_object($duysunlar))
            {
                echo "</BR><img src='image/users/".$duysun->uye_id."/".$duysun->resimurl."'>".$duysun->adi." ".$duysun->soyadi."| ".$duysun->mesaj;
            }
            
       ?>
     </div>
    
     <div class="yanmenu"> Anlık </BR>
       <?PHP 
           anlikbas();
            
       ?>
      
     </div>
     
    </div>