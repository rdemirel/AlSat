<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Rasit Demirel</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
     
          
    
    <div  id="genel">
    
    <div id="header">
        
    </div>
    
    
    <div id="sol"></div>
    
    <?PHP 
        include 'Functions.php';
        $dba=new DatabaseClass();
        $dba->connect();
        
        
        $kadi=$_REQUEST['kullaniciadi'];
        $pass=$_REQUEST['sifre'];
        $yapilacak="giris";
        if($_REQUEST['islem']) $yapilacak=$_REQUEST['islem'];
        $sonuc=$dba->query("SELECT * FROM as_users WHERE email='$kadi'");
        $id=mysql_fetch_object($sonuc)->id;
        echo mysql_fetch_object($sonuc)->kullaniciadi;
      
        
        if($yapilacak=="giris")
        {
            
            ?>
                
                 <div id="orta">
        <div id="giris">
            <div class="baslik">GİRİŞ</div>
            
            
            <form method="post" action="giris.php?islem=giris">
                
       E-mail: <input type="text" name="kullaniciadi" value=""></input><br>
       Şifre <input type="password" name="sifre" value=""></input><br>
        <input type="checkbox" name="hatirla" value="1" /> Oturumum açık kalsın<br />

        <input type="submit" value="GİRİŞ"></input>
    </form> 
            <a href="giris.php?islem=register">register</a>
        </div>
    </div>
            <?
            
            if($sonuc && !mysql_num_rows($sonuc)==0 && 
                    mysql_result($sonuc,0,"email")==$kadi && mysql_result($sonuc,0,"pass")==$pass)
            {
                $_SESSION['AlimSatim'] = array(
								'Aktif' => true,
								'UserID' => $id,
								'Nick' => $kadi										
							);
                 ?>
		<script>parent.parent.window.location='index.php';</script>
		<?
            }
            else
            {
                //giris yapılamadıysa
            }
            
            
        }
        elseif($yapilacak=="register" && !$_SESSION)
        {
            ?>
                
                 <div id="orta">
        <div id="giris">
            <form method="post" action="giris.php?islem=register">
        Adın:<input type="text" name="adi" value=""></input><br>
        Soyadın:<input type="text" name="soyadi" value=""></input><br>
        E-Posta Adresin:<input type="text" name="e-mail" value=""></input><br>
        E-Posta Adresini Tekrar Gir:<input type="text" name="e-mail2" value=""></input><br>
        Yeni Şifre:<input type="password" name="pass" value=""></input><br>
        <input type="submit" value="KAYIT"></input>
            </form> <br>
            
            <div id="dukkan">Kendi Dükkanını açmak için Mağaza oluştur</div>
        </div>
    </div>
            <?
            $tarih= getdate();
            $utarih= $tarih['mday']."-".$tarih['mon']."-".$tarih['year'];
            $adi=$_REQUEST['adi'];
            $soyadi=$_REQUEST['soyadi'];
            $email=$_REQUEST['e-mail'];
            $email2=$_REQUEST['e-mail2'];
            $pass=$_REQUEST['pass'];
            $mailkontrol=$dba->query("SELECT * FROM as_users WHERE email='$email'");
            if ($email!=$email2)echo "<script>alert('E mail adresinizi kontrol ediniz'); location.href='giris.php?islem=register';</script>";
            while($dizi=$dba->fetch_array($mailkontrol))
            {
                echo "<script>alert('Zaten Kayıtlısınız'); location.href='giris.php?islem=register';</script>";
            }
            
            
            if(!$adi=="" && !$soyadi=="" && !$email==""  && !$pass==""){
                $a = "INSERT INTO as_users (id, adi, soyadi,email,  pass, uyeliktarihi) 
                      VALUES (NULL, '$adi', '$soyadi','$email', '$pass', '$utarih' )";
                $dba->query($a);
              
                /*$message="Üyeliğinizi aktif olması için sadece bir adım kaldı </br> Linki tıklayarak üyeliğinizi
                    aktif edin";
                $konu="AlSat|Com üyelik Aktivasyonu";
                $headers = "From: ben@rasitdemirel.com\r\n" . "X-Mailer: php";*/
                
                $to      = 'rrasitt@gmail.com';
                $subject = 'the subject';
                $message = 'hello';
                $headers = 'From: ben@rasitdemirel.com' . "\r\n" .
                            'Reply-To: ben@rasitdemirel.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                 if (mail($to, $subject, $message, $headers))
                echo "<script>alert('Mail Yollandi'); location.href='giris.php';</script>";

            
            }
        //    else echo "<script>alert('Eksik Bilgi'); location.href='giris.php?islem=register';</script>";
            echo $a;
            
            
        }
        elseif($yapilacak=="forgetpass")
        {
            
        }
        else
        {
            echo "Napcagini bilemedi??";
        }
        
        
        
        
        
    
    ?>

    
    
    
   
    
    
    
    <div id="ayaklik"></div>
    
    
</div>

    
    
    
    
    
    
    
    
    
    
    
    
    <?php $dba->close(); ?>
</body>
</html>
