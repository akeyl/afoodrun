<?php    

include "config.php";
include "cookie.php";

$ticket = $_GET['ticket'];
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'share'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'share/';

    include "qr/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
        $filename = $PNG_TEMP_DIR.'qr-'.$userid.'.png';


    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

$backColor = 0xFFFFFF;
$foreColor = 0x666666; 



  $check_user=mysql_query("SELECT * FROM orders WHERE ticket='$ticket'");
  $get_check= mysql_fetch_array($check_user);


  $location =$get_check['location'];
  $status =$get_check['status'];
  $item =$get_check['item'];
  $delivery =$get_check['delivery'];
$reitem = ucfirst($item);


$postdata = $reitem.", Delivered By ".$delivery." at 921 14th St, Modesto, CA 95354. ";
$errorCorrectionLevel = "H";
$matrixPointSize = "10";

        QRcode::png($postdata, $filename, $errorCorrectionLevel, $matrixPointSize, 2, false, $backColor, $foreColor);   




        include "header.php";
        include "menu.php";

    ?>

       <?php echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />'; ?>  
        <?php 
        include "footer.php";
        ?>