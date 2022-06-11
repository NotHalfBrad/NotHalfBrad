<?php
function LoginCheck(){
	if( isset($_SESSION['user_id'])){
		if($_SESSION['user_id'] != 0){//0 is admin brad
		    // Redirect them to the login page
		    header('Location: http://www.nothalfbrad.com/login.php');
		    exit;
		}
	} else {
	    // Redirect them to the login page
	    header('Location: http://www.nothalfbrad.com/login.php');
	    exit;
	}
}

function isAdminUser(){
	if(isset($_SESSION['user_id'])){
		if($_SESSION['user_id'] == 0)
			return true;
	}
	return false;
}

function makeIdentifier($prefix, $memo){
	//open json file
	$file = '/home3/notharad/public_html/layout/identifiers.json';
	//error if doenst exist
	$strJsonFileContents = file_get_contents($file) or die('Problem accessing identifier data!');
	$data = json_decode($strJsonFileContents, true);

	//load prefix group
	$category = $data[$prefix];
	
	//get count of elements in group
	$count = count($category);

	//find the next highest number in the group
	$highestID = 0;
	foreach($category as $element)
	{
		if($element["id"] > $highestID)
			$highestID = $element["id"];
	}

	//make an array of ID and memo
	$content = array();
	$content["id"]=$highestID+1;
	$content["memo"]=$memo;

	//add memo to group
	if($count <= 0)
		$data[$prefix] = array($content);
	else
		array_push($data[$prefix],$content);

	//save data
	$resultJSON = json_encode($data, JSON_PRETTY_PRINT);
    $lp = fopen($file, "w");
    fwrite($lp, $resultJSON);
    fclose($lp);

	$result = $content["id"];
	return $result;
}

function drawTitleCard($title,$bottomContent="")
{
	echo'
	<div class="datacard-frame color-title shadow" style="width:100%;">
		<div class="datacard-title font-page-title">
			'.$title.'
		</div>
		<div class="color-accent" style="height:3px; width:100%;"></div>';

		if($bottomContent != "")
			echo '<div class="datacard-subtitle color-body-alt">'.$bottomContent.'</div>';
	echo'</div>';
}

function drawDataCard($content, $bgColorClass="", $bgImage="", $id="")
{
	if($bgColorClass == "")
		$bgColorClass = "color-body";

	if($bgImage != "")
		$background = 'background-image: url('.$bgImage.'); background-position:center; background-size: cover;';

	echo'
	<div class="datacard-frame '.$bgColorClass.' shadow" style="'.$background.' width:100%;">
		<div class="datacard-content font-body" id="'.$id.'">
			'.$content.'
		</div>
	</div>';
}

function drawDataCardSimple($content, $bgColorClass="", $bgImage="", $id="")
{
	if($bgColorClass == "")
		$bgColorClass = "color-body";

	if($bgImage != "")
		$background = 'background-image: url('.$bgImage.'); background-position:center; background-size: cover;';

	echo'
	<div class="datacard-frame '.$bgColorClass.' shadow font-body" style="'.$background.' width:100%;">
		'.$content.'
	</div>';
}

function drawDataCardWLeadingButton($content, $title, $buttonImage, $buttonColor, $link)
{
	echo'
	<div class="datacard-frame color-body shadow font-body" style="width:100%; height:100%;">
		<table><tr style="">
			<td style="width:15vw; height:15vw; background-color:'.$buttonColor.';">
				<a href="'.$link.'" style="display:block; text-decoration:none;">
					<div style="font-size: 60px; text-align: center;">'.$buttonImage.'</div>
				</a>
			</td>
			<td style="vertical-align:top;">
				<div style="margin: 0px 8px 0px 8px;">
					<div class="font-datacard-title">'.$title.'</div>
					<div class="font-body">'.$content.'</div>
				</div>
			</td>
		</tr></table>
	</div>';
}

function formatQuote($quote, $author, $extraDetail="")
{
	$resultA = '
	<div style="display:inline-block; margin:10px 18px 10px 18px; width:400px; height:100%; vertical-align:text-top;">
		<div class="font-quote" style="color: #ffffff; text-align:left; padding:0px 14px 10px 14px;">'.$quote.'</div>
		<div style="color:#EEEEFF; height:100%; text-align:right; vertical-align:text-bottom;"><b> - '.$author.'</b>';

		if($extraDetail !="")
			$resultB = '<br>'.$extraDetail;

		$resultC = '</div>
	</div>';

	return $resultA.$resultB.$resultC;
}

function button($text, $link, $bgColorClass, $newtab = false, $width= "240px", $height = "60px")
{
	if($newtab)
		$tab = 'target="_blank"';
	else
		$tab = "";

	$result = '<a href="'.$link.'" '.$tab.' class = "shadow button-generic '.$bgColorClass.'" style="position: relative; width:'.$width.'; height:'.$height.';">
		<div class="font-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
		'.$text.'
		</div>
	</a>';

	return $result;
}

function drawSiteIcon($siteSection = "home", $otherClass = "", $otherStyles = "")
{
	$result = getSectionIcon($siteSection, $otherClass, $otherStyles);
	echo $result;
}

function getSectionSettings($siteSection = "home")
{
	switch($siteSection)
	{
		case "home":
		case "index":
			$icon = "house";
			break;
		case "gamedev":
			$icon = "space_invader";
			break;
		case "photography":
		case "photo":
		case "camera":
		case "cam":
			$icon = "camera";
			break;
		case "philosophy":
			$icon = "scroll";
			break;
		case "contact":
		case "about":
			$icon = "speaking_head_in_silhouette";
			break;
		default:
			$icon = "warning";
			break;
	}
}

function getSectionIcon($siteSection = "home", $otherClass = "", $otherStyles = "")
{
	switch($siteSection)
	{
		case "home":
		case "index":
			$icon = "house";
			break;
		case "gamedev":
			$icon = "space_invader";
			break;
		case "photography":
		case "photo":
		case "camera":
		case "cam":
			$icon = "camera";
			break;
		case "philosophy":
			$icon = "scroll";
			break;
		case "contact":
		case "about":
			$icon = "speaking_head_in_silhouette";
			break;
		default:
			$icon = "warning";
			break;
	}

	$color = getSectionColor($siteSection);

	//echo '<i class="em em-'.$icon.' '.$otherClass.'" style="filter: grayscale(100%); color: '.$color.' '.$otherStyles.'"></i>';
	return '<i class="em em-'.$icon.' '.$otherClass.'" style="'.$otherStyles.' "></i>';
}

function getSectionColor($siteSection = "home")
{
	switch($siteSection)
	{
		case "home":
		case "index":
			$result = "rgba(255,20,20,1);";
			break;
		case "gamedev":
			$result = "rgba(50,50,255,1);";
			break;
		case "photography":
		case "photo":
		case "camera":
		case "cam":
			$result = "rgba(255,100,0,1);";
			break;
		case "philosophy":
			$result = "rgba(200,200,200,1);";
			break;
		case "contact":
		case "about":
			$result ="rgba(200,200,200,1);";
			break;
		default:
			$result = "rgba(255,0,0,1);";
			break;
	}

	return $result;
}
?>