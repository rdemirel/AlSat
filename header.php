<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Rasit Demirel</title>
    <link href="css/colorbox.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.colorbox.js"></script>
    <script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".ajax").colorbox();
                                $(".inline").colorbox({inline:true, width:"50%"});
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
</head>
<body>
 <?PHP 
        
        include 'Functions.php';
        $dba=new DatabaseClass();
        $dba->connect();
        girisKontrol();
        $sonuc=$dba->query("SELECT * FROM as_users WHERE id='$Uid'");
        $userobje=mysql_fetch_object($sonuc);
        if($output==cikis)            cikis();
        ?>
<div  id="genel">
    <div id="header">
        <div id="logo"><a href="index.php"><img src="css/images/logo.png" title="Anasayfa"></img></a></div>
        <div id="arabul"><form><input type="text" value="Ara"></input></form>
        <p><a class='inline' href="#inline_content">ilan Ekle</a></p></div>
        
        <div id="profcubuk">
            <div id="profilresim"></div>
            <div id="profilcik"><?echo $userobje->adi; echo " ".$userobje->soyadi; ?> </br><a href="profil.php">Profilim</a></br> Mesajlarım </br><a href="index.php?output=ilanlarim">İlanlarım</a></br> <a href="index.php?output=cikis">Çıkış </a> </div>
        </div>
    </div>
    <!-- This contains the hidden content for inline calls -->
    <? $hangi=$_REQUEST['output']; $idi=$_REQUEST['ilanid'];
        if ($hangi=="ilangoster")
            {
               ?> <div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
                           
			<p><strong>Hemen Teklif Ver!</strong></p>
                        Şu an "xyz" ilanına teklif vermek üzeresiniz
                        <p><form action="index.php?output=teklif" method="post">
                           Teklifiniz <input type="text" name="baslik"></br>
                           Açıklama <input type="text" name="adres"></br>
                            <input type="submit" value="Teklif Gönder">
                        </form></p>
			<!--<p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>
			
			<p>Resim yüklemek için hemen tıkla yada etkinliği hemen oluştur:<br />
			<a class="ajax" href="../content/flash.html">Resim Ekle</a></p>-->
			</div>
		</div>
            <?
            }
            else
            {
?>
		<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
                           
			<p><strong>Hemen İlan Ekle!</strong></p>
                        <p><form action="index.php?output=ilanekle" method="post">
                           baslik <input type="text" name="baslik"></br>
                           adres <input type="text" name="adres"></br>
                            <select name="kategori">
                            <option value="0" selected>Kategoriler</option>
                            <option value="1">Bilgisayar</option>
                            <option value="2">Mutfak</option>
                            <option value="3">Koltuk</option>
                            <option value="other">Diger</option>
                            </select></br>
                          </br>fiyat  <input type="text" name="fiyat"></br>
                          aciklama  </br><input type="text" name="aciklama"></br>
                          garanti  <input type="text" name="garanti"></br>
                          urundurumu  <select name="urundurumu">
                            <option value="sifir" selected>Sıfır</option>
                            <option value="ikinciel">İkinci El</option>
                            </select>
                            <input type="submit" value="İlan  Oluştur">
                        </form></p>
			<!--<p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>
			
			<p>Resim yüklemek için hemen tıkla yada etkinliği hemen oluştur:<br />
			<a class="ajax" href="../content/flash.html">Resim Ekle</a></p>-->
			</div>
		</div>
     <? } ?>