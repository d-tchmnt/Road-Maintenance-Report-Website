
 <?php
include "connect_db.php";
$myFile = "rss.xml";
$fh = fopen($myFile, 'w') or die("can't open file");
$rss_txt ='';
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>";
$rss_txt .= '<channel>';
$rss_txt .='<title>vallia-natow.upatras.gr</title>';
$rss_txt .='<link>localohost/rss.php</link>';
$rss_txt .='<description>Latest Reports</description>';


$query = "SELECT * FROM anafores ORDER BY upload_date DESC LIMIT 20";
$result = $con->query($query);

while($row = mysqli_fetch_array($result)) {
		$aid=$row['a_id'];
        $rss_txt .= '<item>';

        $rss_txt .= '<title>' .$row['onoma_anaf']. '</title>';
        $rss_txt .= '<link>http://localhost/show_anaf.php?a_id='.$aid.'</link>';
        $rss_txt .= '<description>' .$row['perigr_xristi'] .$row['geogr_thesi']. '</description>';

        $rss_txt .= '</item>';
    }
$rss_txt .= '</channel>';
$rss_txt .= '</rss>';

fwrite($fh, $rss_txt);
fclose($fh);
header('Location: rss.xml');
?>
 
 
