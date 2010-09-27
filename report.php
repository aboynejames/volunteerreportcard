<?php session_start();
include_once ("volreportcard/mysqlstart2.php");
include_once ('volreportcard/vollogic.php');
include_once ('volreportcard/forms.php');

//print_r($_SESSION);
//print_r($_POST);
// list current magazine section and lifestyles
$start = $_SESSION[_token];

$t = preventdform ();
$_SESSION[_token] = $t;

$tests = $_SESSION[_token];
$testp = $_POST[_token];


headera ();

if ($_GET['volid']) 
{
// identify volunteer card job
$volcard = $_GET['volid'];
//echo $volcard.'cardid number';

// fill out report card and have validate form button available
recordformcomplete ($volcard);
}

else 
{
        //if (isset($_POST[saveForm]))
        if (isset($_POST['Field9']))
        {

        echo 'submiited';

                      //  if form data already entered just display record populated, maybe validated or unvalidated
                         if ($start == $testp) 
                                  {
                                      // button pressed twice so display form with data filled in
                                      recordformcomplete ();
                                      echo 'pressed entry twice';
                                   }
                       
                              else {
                              // first time entry of data
                              echo 'first time entry';
                              $newcoll = collectrecord ();
                              print_r($newcoll);
                              //save to database
                              saveformrecord ($newcoll, 1, 1);
                              recordformcomplete (1);
                                } // closes else
                  
        }  // closes if form been set?

        else {
        //set the form
        //echo 'form';
        recordform ();

        } // closes else

} // closes else


//print_r($_POST);

//print_r($_SESSION);
?>


