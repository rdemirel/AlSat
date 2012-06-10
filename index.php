<?PHP   
        include 'header.php';
        
        islemisle($Uid);
        
        
        include 'solbar.php';
        
    ?>

    
    <div id="ortacik">
        <?PHP 
            $output=$_REQUEST['output'];
            $id=$_REQUEST['id'];
            
            if($output=="ilanlarim")
            {
                include 'ilanlarim.php';
               
            }
            else if($output=="ilangoster")
            {
                include 'ilangoster.php';
                
            }
            else{
              include 'girisorta.php';
               //  include 'ilangoster.php';
            }
        ?>
        
    </div>


    
   <?PHP include 'sagbar.php';
        include 'ayaklik.php'; ?>
    

    <?php 
    echo $_SESSION['AlimSatim']['Nick'];
        echo $_SESSION['AlimSatim']['UserID'];
    $dba->close(); ?>
</body>
</html>
