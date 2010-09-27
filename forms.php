<?php

// recordform 
function recordform ()
{
?>

<body id="public">
<div id="container">

<?php
navigation ();

?>

<form id="form1" name="form1" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<div class="info">
	<h2>Volunteer Form Copy</h2>
	<div></div>
</div>

<ul>
		
		
	
<li id="foli9" 		class="     ">
	<label class="desc" id="title9" for="Field9">
		Subject
				<span id="req_9" class="req">*</span>
			</label>
	<div>
		<input id="Field9" 			name="Field9" 			type="text" 			class="field text medium" 			value="" 			maxlength="255" 			tabindex="1" 						/> 
	</div>
	</li>


<li id="foli111" 
		class="     ">
	
		
	<label class="desc" id="title111" for="Field111">
		Please let us know any previous voluntary work that you have done.
				<span id="req_111" class="req">*</span>
			</label>
	
	<div>
				<textarea id="Field111" 
			name="Field111" 
			class="field textarea medium" 
			rows="10" cols="50"
			tabindex="2"
			onkeyup=""
						 ></textarea>
			
			</div>
	
		
		
	</li>


<li id="foli224" 		class="     ">
	<label class="desc" id="title224" for="Field224">
		Hours
			</label>
	<div>
		<input id="Field224" 			name="Field224" 			type="text" 			class="field text medium"  			value="" 			maxlength="255" 			tabindex="3" 			onkeyup="validateRange(224, 'digit');" 						/>
				<label for="Field224">Must be between <var id="rangeMinMsg224">1</var> and <var id="rangeMaxMsg224">3</var> digits.&nbsp;&nbsp;&nbsp; <em class="currently">Currently Used: <var id="rangeUsedMsg224">0</var> digits.</em></label>
			</div>
	</li>


<li id="foli225" 		class="     ">
	<label class="desc" id="title225" for="Field225">
		URL
			</label>
	<div>
		<input id="Field225" 			name="Field225" 			type="text" 			class="field text medium" 			value="" 			maxlength="255" 			tabindex="4" 			onkeyup="" 						/>
			</div>
	</li>


	
		
	<li class="buttons ">
		<div>
					<input type="hidden" name="currentPage" id="currentPage" value="dB5YAYUJLThQ1vViLqkRtO8PC6nWmLuPsz2BRQNT4gw=" />
						<input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit" onmousedown="doSubmitEvents();" />
							
				
				</div>
	</li>

	<li style="display:none">
		<label for="comment">Do Not Fill This Out</label>
		<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
		<input type="hidden" id="idstamp" name="idstamp" value="" />
		<input type="hidden" id="stats" name="stats" value="" />
				<input type="hidden" id="clickOrEnter" name="clickOrEnter" value="" />
	</li>
</ul>
</form>

</div><!--container-->
<img id="bottom" src="images/bottom.png" alt="" />

<a class="powertiny" href="http://wufoo.com" title="Powered by Wufoo"
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(./images/powerlogo.png) no-repeat center 7px; margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">Wufoo</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">Designed</b>
</a>
</body>
</html>




<?php
}  // closes function





// recordform 
function recordformcomplete ($cardid)
{

global $volcard;

// call query to get existing record data and fill in field where data entered and see if it has been validated or not?
$db->query="SELECT * FROM ".VOLCARD.".volreport LEFT JOIN ".VOLCARD.".volconnect ON ".VOLCARD.".volconnect.volid = ".VOLCARD.".volreport.volid LEFT JOIN ".VOLCARD.".individual ON ".VOLCARD.".individual.individ = ".VOLCARD.".volconnect.individ  WHERE ".VOLCARD.".volreport.volid = $cardid ";
//echo $db->query;
$resultcard = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());

// present results in table
if ( (mysql_num_rows ($resultcard)) > 0 ) 
{

while ($row = mysql_fetch_object($resultcard)) {

$cardr[] .=  $row->title;
$cardr[] .=  $row->description;
$cardr[] .=  $row->time;
$cardr[] .=  $row->dateentered;
$cardr[] .=  $row->url;

} // closes while

}  // closes if
//print_r($cardr);


$resultprof = mysql_query($db->query) or die ("Error in query: $db->query. ".mysql_error());

?>

<body id="public">
<div id="container">

<?php
navigation ();

?>


<form id="form1" name="form1" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<div class="info">
	<h2>Volunteer Form Copy</h2>
	<div></div>
</div>

<ul>
		
		
	
<li id="foli9" 		class="     ">
	<label class="desc" id="title9" for="Field9">
		Subject
				<span id="req_9" class="req">*</span>
			</label>
	<div>
		<input id="Field9" 			name="Field9" 			type="text" 			class="field text medium" 			value="<?php echo $cardr[0]  ?>" 			maxlength="255" 			tabindex="1" 						/> 
	</div>
	</li>


<li id="foli111" 
		class="     ">
	
		
	<label class="desc" id="title111" for="Field111">
		Please let us know any previous voluntary work that you have done.
				<span id="req_111" class="req">*</span>
			</label>
	
	<div>
				<textarea id="Field111" 
			name="Field111" 
			class="field textarea medium" 
			rows="10" cols="50"
			tabindex="2"
			onkeyup=""
						 ><?php echo $cardr[1]  ?></textarea>
			
			</div>
	
		
		
	</li>


<li id="foli224" 		class="     ">
	<label class="desc" id="title224" for="Field224">
		Hours
			</label>
	<div>
		<input id="Field224" 			name="Field224" 			type="text" 			class="field text medium"  			value="<?php echo $cardr[2]  ?>" 			maxlength="255" 			tabindex="3" 			onkeyup="validateRange(224, 'digit');" 						/>
				<label for="Field224">Must be between <var id="rangeMinMsg224">1</var> and <var id="rangeMaxMsg224">3</var> digits.&nbsp;&nbsp;&nbsp; <em class="currently">Currently Used: <var id="rangeUsedMsg224">0</var> digits.</em></label>
			</div>
	</li>


<li id="foli225" 		class="     ">
	<label class="desc" id="title225" for="Field225">
		URL
			</label>
	<div>
		<input id="Field225" 			name="Field225" 			type="text" 			class="field text medium" 			value="<?php echo $cardr[4]  ?>" 			maxlength="255" 			tabindex="4" 			onkeyup="" 						/>
			</div>
	</li>

<?php
if ($volcard == 1)
{
?>
<li>
<img src="/volreportcard/images/linkedin.gif"><a href="http://www.linkedin.com/benrmatthews/"><img src="http://profile.ak.fbcdn.net/hprofile-ak-snc4/hs473.snc4/49700_222300160_8923_n.jpg" height="60" width="60" >Ben Matthews</a> 
	<label>
		<br /><b>Validation</b>
			</label>
	<div>
		<input id="Field229" 			name="Field229" 			type="text" 	 	size="80"		value="<?php echo 'James did a great job, the service gets used by 2,323 users a day';  ?>" 			maxlength="500" 			tabindex="4" 			onkeyup="" 						/>
			</div>
	</li>

<?php
}
?>
		
	<li class="buttons ">
		<div>
					<input type="hidden" name="currentPage" id="currentPage" value="dB5YAYUJLThQ1vViLqkRtO8PC6nWmLuPsz2BRQNT4gw=" />
						<input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit Validation" onmousedown="doSubmitEvents();" />
							
				
				</div>
	</li>

	<li style="display:none">
		<label for="comment">Do Not Fill This Out</label>
		<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
		<input type="hidden" id="idstamp" name="idstamp" value="" />
		<input type="hidden" id="stats" name="stats" value="" />
				<input type="hidden" id="clickOrEnter" name="clickOrEnter" value="" />
	</li>
</ul>
</form>

</div><!--container-->
<img id="bottom" src="images/bottom.png" alt="" />

<a class="powertiny" href="http://wufoo.com" title="Powered by Wufoo"
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(./images/powerlogo.png) no-repeat center 7px; margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">Wufoo</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">Designed</b>
</a>
</body>
</html>



<?php
}  // closes function

