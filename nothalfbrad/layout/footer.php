<?php 
	//end output buffering
	$output = ob_get_clean();

	//render admin card
	if(isAdminUser())
	{
		echo'
		<div class="color-body-admin datacard-frame shadow" style="width:100%;">
			 <div class="datacard-content no-min">
			 	Logged in as admin!<br>'.$admin.'<br><br>
			 	Add log out option!
			 </div>
		</div>
		';
	}

	//render the errors card
	if(isset($error))
	{
		if($error != "" && $error != null)
		{
			echo'
			<div class="color-body-error datacard-frame shadow" style="width:100%;">
				 <div class="datacard-content">
				 	<b>Error</b><br>'.$error.'
				 </div>
			</div>
			';
		}
	}		
		
	//output the rest of the main body content
	echo $output;
?>

	<div class="datacard-frame color-body shadow" style="width:100%;">
		<div class="datacard-content font-body no-min" style="display:grid;  grid-template-columns: 1fr 1fr;">
			<div>
				<script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#46b798', 'R6R2T75B');kofiwidget2.draw();</script></div>
			<div style="text-align:right;">
				This site is designed and built by <br><b>Bradley Wiggins</b> </div>
		</div>
	</div>

</div>

<!--<div class ="nav-bot-height color-accent"></div>-->

</td></tr></table>
	</BODY>
</html>
