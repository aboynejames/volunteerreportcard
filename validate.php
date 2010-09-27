<?php session_start();
include_once ("volreportcard/mysqlstart2.php");
include_once ('volreportcard/vollogic.php');
include_once ('volreportcard/forms.php');



headera ();
?>



<body id="public">
<div id="container">
<img src="/volreportcard/images/volreportcard_logo2.png"><br /><br />
<b>Please sign in with your identity of choice</b><br /><br />
<!-- need to add janran single sign on, add image for now via linkedin -->
<a href="/volreportcard/report.php?volid=1"><img src="/volreportcard/images/singlesignon.gif"></a>


</div>  <!-- closes container-->

</body>
</html>