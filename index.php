<?php session_start();
include_once ("volreportcard/mysqlstart2.php");
include_once ('volreportcard/vollogic.php');
include_once ('volreportcard/forms.php');



headera ();
?>



<body id="public">
<div id="container">



<h1>Volunteer outcome recorder as a service</h1>

<?php
navigation ();

?>
<div>
<img src="/volreportcard/images/jamesprofile.gif">
<?php
//individualprofile (1);
?>
</div>

<a href="/volreportcard/report.php"><img src="/volreportcard/images/add.gif"></a>

<h1>List of all Records</h1>
<?php
$hh = indrecords (1);
//print_r($hh);
//display records
displayrecords ($hh)
?>
<h1>List of charities </h1>
<?php


?>

</div>  <!-- closes container-->

</body>
</html>