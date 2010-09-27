<?php 


function test ()
{


echo 'hello volcard reporter';


}  // closes function


function headera ()
{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>
Volunteer Form Copy
</title>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="Wufoo.com" />

<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="scripts/wufoo.js"></script>
</head>

<?php

}  // closes function






function navigation ()
{

?>
<img src="/volreportcard/images/volreportcard_logo2.png">
	<ul>
					<li><a href="/volreportcard/index.php">Record Summary</a> </li>
			    <li><a href="/volreportcard/report.php">Add new record</a></li>
    </ul>



<?php


}  // closes function






function individualprofile ($indid)
{

$db->query="SELECT * FROM ".VOLCARD.".individual WHERE ".VOLCARD.".individual.individ = $indid ";

$resultprof = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());

// present results in table
if ( (mysql_num_rows ($resultprof)) == 1 ) {

$row = mysql_fetch_object($resultprof);

$indname = $row->fbid;


}  // closes if


echo $indname;


}  // closes function






function indrecords ($indid)
{

$summary = '';

$db->query="SELECT * FROM ".VOLCARD.".volreport LEFT JOIN ".VOLCARD.".volconnect ON ".VOLCARD.".volconnect.volid = ".VOLCARD.".volreport.volid LEFT JOIN ".VOLCARD.".individual ON ".VOLCARD.".individual.individ = ".VOLCARD.".volconnect.individ WHERE ".VOLCARD.".individual.individ = $indid ";
//echo $db->query;
$resultprof = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());

// present results in table
if ( (mysql_num_rows ($resultprof)) > 0 ) 
{

while ($row = mysql_fetch_object($resultprof)) {

$summary[$row->volid][] .=  $row->title;
$summary[$row->volid][] .=  $row->description;
$summary[$row->volid][] .=  $row->time;
$summary[$row->volid][] .=  $row->dateentered;
$summary[$row->volid][] .=  $row->url;

} // closes while

}  // closes if
//print_r($summary);
return $summary;

}  // closes function




function displayrecords ($disdata)
{
echo '<b>Title</b><br />';
        foreach ($disdata as $key=>$dis) 
        {
//print_r($dis);
        echo '<a href="/volreportcard/report.php?volid='.$key.'">'.$dis[0].'</a><br />';


        }



}  // closes function









function  saveformrecord ($newdata, $indid, $charid)
{

$db->query="INSERT INTO ".VOLCARD.".volreport (title, description, time, url) VALUES ('$newdata[1]', '$newdata[2]', '$newdata[3]', '$newdata[4]') ";

$resultsavea = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());


// need to query db to get lastid added to volreport
$db->query="SELECT * FROM ".VOLCARD.".volreport ORDER BY ".VOLCARD.".volreport.volid DESC LIMIT 1";
echo $db->query;
$resultlast = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());

// present results in table
if ( (mysql_num_rows ($resultlast)) == 1 ) 
{
$row = mysql_fetch_object($resultlast);
$lastid = $row->volid;
}




$db->query="INSERT INTO ".VOLCARD.".volconnect (individ, volid, charid) VALUES ('$indid', '$lastid', '$charid') ";

$resultsavea = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());



}  // closes function




function collectrecord () 
{

$recollect = '';


      if (isset($_POST['Field9']))
      {

      $recollect [1] = $_POST['Field9'];  
      $recollect [2] = $_POST['Field111'];  
      $recollect [3] = $_POST['Field224'];  
      $recollect [4] = $_POST['Field225'];  
     
      }
//echo 'infucntion';
//print_r($recollect);
return $recollect;

}  // closes function




// form processing
function preventdform ()
{

$randtok = md5(uniqid(microtime()));

$token = substr($randtok, 0, 20);

return $token;

}// closes function













?>

