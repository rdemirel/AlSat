
<div id="yorumgenis">
    <div>Yorumlar</div>
<?php

if($_REQUEST['yrm']=="ok")
{
    $yorum=$_REQUEST['yorum'];
    $ekle=mysql_query("INSERT INTO as_yorum (uye_id,yorum,tarih,ilan_id) VALUES ('$Uid','$yorum',CURDATE(),'$ilanid')");
}
else if($_REQUEST['yrm']=="begen")
    
{
    $yorumid=$_REQUEST['yorumid'];
    $begenmismi=mysql_fetch_object(mysql_query("SELECT COUNT(id) as sayim FROM as_begen WHERE uye_id='$Uid' AND yorum_id='$yorumid'"));
    if ($begenmismi->sayim==0)
        $yorumekle=mysql_query("INSERT INTO as_begen (uye_id,yorum_id,tarih) VALUES ('$Uid','$yorumid',CURDATE())");
}
$yorumlar=  mysql_query("SELECT * FROM as_yorum WHERE ilan_id='$ilanid' ORDER BY id DESC");
while ($yorum=mysql_fetch_object($yorumlar))
{
    


?>

    <div class="yorum">
        <div id="yorumresim"><img style="height: 46px; width: 37px;"src="image/users/27/avatar.jpg"></div>
        <div id="yorumsahip"><?PHP echo  ilaniduyeid($yorum->uye_id)->adi." ".ilaniduyeid($yorum->uye_id)->soyadi; ?></div>
        <div id="yorumtarih"><?PHP echo $yorum->tarih; ?></div>
        <div id="yorumnet"><?PHP echo $yorum->yorum; ?></div>
        <div id="yorumbegen"><a href="index.php?output=ilangoster&ilanid=<?PHP echo $ilanid; ?>&yrm=begen&yorumid=<?PHP echo $yorum->id; ?>">Beğen
                (<?PHP echo mysql_fetch_object(mysql_query("SELECT COUNT(id) as sayi FROM as_begen WHERE yorum_id='$yorum->id'"))->sayi; ?>)</a></div>
    </div>
    </br>
    

<?PHP

}
?>
</div>
<div id="yorumform">
    <form action="index.php?output=ilangoster&ilanid=<?PHP echo $ilanid; ?>&yrm=ok" method="post" >
        <input style="width: 300px; height: 60px; text-align: left;" type="text" name="yorum">
        <br><input type="submit"  value="Yolla">
    </form>
</div>