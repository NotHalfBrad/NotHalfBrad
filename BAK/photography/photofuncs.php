<?php
require_once 'photoobjects.php';

function readifyURL($string){ return str_replace(' ', '_', $string); }

function dereadifyURL($string){ return str_replace('_', ' ', $string); }

function FBreadifyURL($string){ return str_replace(' ', '%20', $string); }

function getSettingsFolder($album_name){
    $albumFolder = getAlbumFolder($album_name);
    $result = $albumFolder.'settings/';

    if(!is_dir($result))
        mkdir($result);

    return $result;}

function getAlbumFolder($album_name){

    return './albums/'.$album_name.'/';}

function getAlbumImages($album_name){
	$folder = getAlbumFolder($album_name);
	$files = scandir($folder) or die("Unable to find images");
	$result = array();

	$extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
	foreach($files as $file)
	{
			$extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
			if (in_array($extension, $extensions)) 
            	array_push($result, $file);
	}
	return $result;}

function getPhotographyURL(){return 'https://www.photo.nothalfbrad.com';}

function getPreviewLink($album_name, $image_name = null){
    if($image_name == null)
        $image = ltrim(getCoverLocation($album_name), '.');
    else
        $image = ltrim(getThumbnail($album_name, $image_name), '.');

    $result = getPhotographyURL().$image;
    return FBreadifyURL($result);}

function getPhotoLink($album_name, $image_name){
    $result = getPhotographyURL().'/'.getImageURL($album_name, $image_name);//'/album.php?album='.$album_name;
    return FBreadifyURL($result);}

function getAlbumLink($album_name){
    $result = getPhotographyURL().'/'.getAlbumURL($album_name);
    return FBreadifyURL($result);}

function getBannerLocation($album_name){
    $banner_loc = getSettingsFolder($album_name).'banner.jpg';
    return $banner_loc;}

function getAlbumBanner($album_name, $images){
	$banner_loc = getBannerLocation($album_name);

	//check if banner exists
    /*if(!file_exists($banner_loc))
    {  
        createBanner($album_name, $images[0]);
        echo $images[0]."<br>";
    }*/
	return $banner_loc;}

define(_banner_x, 1920);
define(_banner_y, 400);
function createBanner($album_name, $image_name = NULL){
    //check if cover folder exists
    $bannerdir = getSettingsFolder($album_name);
    if (!file_exists($bannerdir)) 
        mkdir($bannerdir, 0777, true);

    $banner = getBannerLocation($album_name);

    if($image_name == NULL)
         $image_name = getAlbumImages($album_name)[0];

    $image = getImageLocation($album_name, $image_name);

    if(file_exists($banner))
        unlink($banner);

    return createThumbnail($image, $banner, _banner_x, _banner_y, true);}

define(_cover_x, 330);define(_cover_y, 270);//350 270
function createCover($album_name, $image_name = NULL){
    //check if cover folder exists
    $coverdir = getSettingsFolder($album_name);
    if (!file_exists($coverdir)) 
        mkdir($coverdir, 0777, true);

    $cover = getCoverLocation($album_name);
    
    if($image_name == NULL)
        $image_name = getAlbumImages($album_name)[0];

    $image = getImageLocation($album_name, $image_name);

    if(file_exists($cover))
        unlink($cover);

    return createThumbnail($image, $cover, _cover_x, _cover_y, true);}

function getCoverLocation($album_name){
    $folder = getAlbumFolder($album_name);
    $cover_loc = $folder.'settings/cover.jpg';
    return $cover_loc;}

function writeGalleryAlbum($album_title, $cover_loc, $link, $numPics, $numVids, $extraStyle = ""){
    echo '<a href="'.$link.'" class="shadow-light album-box" style="text-align:left; width:'._cover_x.'; height:'._cover_y.'; object-fit: cover; background-image:url(\''.$cover_loc.'?='.filemtime($cover_loc).'\');">
                <span class="gallery-text-frame" style="'.$extraStyle.' width:'._cover_x.'; max-width:100%;">
                    <span class="gallery-title">
                        '.$album_title.'<br>
                    </span>
                    <span class="gallery-subtitle">';

                    if($numPics > 0)
                        echo '<i class="fas fa-camera"></i> '.$numPics.'&nbsp&nbsp';
                    if($numVids > 0)
                        echo '<i class="fas fa-film"></i> '.$numVids;

                    echo'</span>
                </span>
            </a>';}

function displayAlbumDescription($album_name){
	$folder = getAlbumFolder($album_name);
    $txt = $folder.'settings/description.txt';
    $string = "";

    if(file_exists($txt))
    {
        $fh = fopen($txt,'r');
        while ($line = fgets($fh)) 
        {
            $string .= $line."<br>";
        }
    }

    return $string;}

function getImageLocation($album_name, $image_name){
	$folder = getAlbumFolder($album_name);
	return $folder.$image_name;}

function getThumbFolder($album_name){return getAlbumFolder($album_name).'thumbs/';}

define(_thumb_x, 256);
define(_thumb_y, 512);
function getThumbnail($album_name, $image_name){
	$folder = getThumbFolder($album_name);
    $thumb = $folder.$image_name;
    $image = getImageLocation($album_name, $image_name);
    $generatethumb = false;

    //check if thumbnail exists
    if(file_exists($thumb))
    {
        $size = getimagesize($thumb);

        //check if thumbnail is older
        if(filemtime($thumb)<filemtime($image))
            $generatethumb = true;

        //check if neither dimension is max
        else if($size[0] != _thumb_x && $size[1] != _thumb_y)
            $generatethumb = true;
    }       
    else $generatethumb = true;

    //generate thumbnail only if necessary
    if($generatethumb == true)
    {
        //make folder if it didnt exist
        if (!file_exists($folder)) 
            mkdir($folder, 0777, true);

        $success = createThumbnail($image, $thumb, _thumb_x, _thumb_y);
    }

	return $thumb;}

function getReducedFolder($album_name){return getAlbumFolder($album_name).'reduced/';}

define(_reduced_x, 1600);
define(_reduced_y, 900);
function getReducedImage($album_name, $image_name){
    $folder = getReducedFolder($album_name);
    $reduced = $folder.$image_name;
    $image = getImageLocation($album_name, $image_name);
    $generateReduced = false;

    //check if reduced exists
    if(file_exists($reduced))
    {
        $size = getimagesize($reduced);

        //check if reduced is older
        if(filemtime($reduced)<filemtime($image))
            $generateReduced = true;

        //check if neither dimension is maxed
        else if($size[0] != _reduced_x && $size[1] != _reduced_y)
            $generateReduced = true;
    }       
    else $generateReduced = true;

    //generate thumbnail only if necessary
    if($generateReduced == true)
    {
        //make folder if it didnt exist
        if (!file_exists($folder)) 
            mkdir($folder, 0777, true);

        $success = createThumbnail($image, $reduced, _reduced_x, _reduced_y);
    }

    return $reduced;}

function getNextImage($images, $image_name){
	$index = getImageID($images, $image_name);
	if($index <= count($images))//I dont understand why this works... if ID 2 is less than or equal to count of 3, then add 1 and return image ID 3 (which shouldn't exist in count of 3)... but even image ID 3 works and can add 1 and return ID 4... but my "correct" logic always left missing arrows for last 3 images
		return $images[$index+1];
	else
		return null;}

function getPreviousImage($images, $image_name){
	$index = getImageID($images, $image_name);
	if($index > 0)
		return $images[$index-1];
	else
		return null;}

function getImageID($images, $image_name){return array_search($image_name, $images);}

function getImageURL($album_name, $image_name)
{
	return 'viewer.php?album='.readifyURL($album_name).'&image='.$image_name;
}

function getAlbumURL($album_name){
    //return 'album.php?album='.readifyURL($album_name);
    return 'album.php?id='.getAlbumIdentifier($album_name);}

function getFirstPictureDate($album_name){
    //look for first image
    $image_name = getAlbumImages($album_name)[0];
    $image_loc = getImageLocation($album_name, $image_name);

    //get date from first image
    $valid_extensions = array('jpg', 'jpeg', 'tiff');
    $extension = strtolower(pathinfo($image_loc, PATHINFO_EXTENSION));
    if(in_array($extension, $valid_extensions))
    {
        $exif = exif_read_data($image_loc);
        return $exif['DateTimeOriginal'];
    }
    else
    {
        return filemtime($image_loc);
    }}

function getSortedAlbums($gallery_loc = null){
    if($gallery_loc == null)
        $gallery_loc = './albums/';

    $albums = scandir($gallery_loc) or die("Unable to find folders");

    $sortedAlbums = array();
    $dates = array();

    foreach($albums as $album)
    {
        if($album !== "." && $album !== "..") 
        {
            $a = new Album($album);
            $date = $a->date_record;

            array_push($sortedAlbums, $album);
            array_push($dates, $date);
        }

    }

    //sorts both arrays based on the content of dates
    array_multisort($dates, SORT_DESC, $sortedAlbums, SORT_DESC);

    return $sortedAlbums;}

function countVisitor($album_name, $newIP){
    //read all logs
    $data = readJsonSettings($album_name,"visitors");
    $visitors = $data['visitors'];
    $count = count($visitors);
    $unique = true;
    //echo $count.'<br>';
    if($count > 0)
    {
        //echo 'count above 0<br>';
        foreach($visitors as $visitor)
        {
            if($newIP == $visitor)
            {
                $unique = false;
                //echo 'not unique!<br>';
                break;
            }
        }
    }
    else
        $data['visitors'] = array();

    //add if unique
    if($unique)
    {
        array_push($data['visitors'], $newIP);
        $count++;
    }

    //print_r($data);
    //save and close
    saveJsonSettings($album_name,"visitors", $data);

    return $count;}

function getVistors($album_name){
    $data = readJsonSettings($album_name, "visitors");
    $visitors = $data['visitors'];
    $count = count($visitors);
    return $count;}

function getSettingsFile($album_name, $file_title){
    $folder = getSettingsFolder($album_name);
    $file = $folder.$file_title.'.json';
    //echo $file.'<br>';
    return $file;}

//TODO: move this to other php file, such as JsonFuncs
//TODO: include that file in this one
//TODO: have readJsonSettings use this code
function readJson($file_location){
    //open - create if doesnt exist
    if(!file_exists($file_location))
    {
        //echo 'file doesnt exist!<br>';
        //open and close, to create file
        $lp = fopen($file_location, "w") or die('Unable to create new '.basename($file_location).' file!');
        fclose($lp);
    }
    $strJsonFileContents = file_get_contents($file_location); //doesn't need fopen
    $jsonData = json_decode($strJsonFileContents, true);
    //print_r($jsonData);

    return $jsonData;}

function readJsonSettings($album_name, $file_title){
    //get file location
    $file = getSettingsFile($album_name, $file_title);

    //open - create if doesnt exist
    if(!file_exists($file))
    {
        //echo 'file doesnt exist!<br>';
        //open and close, to create file
        $lp = fopen($file, "w") or die('Unable to create new '.$file_title.' file!');
        fclose($lp);
    }
    $strJsonFileContents = file_get_contents($file); //doesn't need fopen
    $jsonData = json_decode($strJsonFileContents, true);
    //print_r($jsonData);

    //return data
    return $jsonData;}

function saveJsonSettings($album_name, $file_title, $data){
    $file = getSettingsFile($album_name, $file_title);
    //echo 'f: '.$file.'<br>';
    $resultJSON = json_encode($data, JSON_PRETTY_PRINT);
    //print_r($resultJSON);
    $lp = fopen($file, "w");
    fwrite($lp, $resultJSON);
    fclose($lp);}

function readJsonShowcaseData(){return readJson("showcase.json");}

function getShowcaseSectionNames($showcaseData){
    $sections = $showcaseData['sections'];

    $sectionNames = array();
    for ($i = 0; $i < count($sections); $i++)
    {
        $section = $sections[$i];
        $title = $section['title'];
        array_push($sectionNames, $title);
    }

    return $sectionNames;}

//returns "" if in none
function isInWhichShowcase($album_id, $image_name, $showcaseData){
    $sections = $showcaseData['sections'];

    foreach($sections as $s)
    {
        $title = $s['title'];
        $photos = $s['photos'];

        foreach($photos as $p)
        {
            if($p['album_id']==$album_id 
            && $p['photo_name']==$image_name)
                return $title;
        }
    }

    //default, not found in any showcase
    return "";}

function getAlbumIdentifier($album_name){
    //look up settings
    $data = readJsonSettings($album_name, 'data');

    //see if album id is there
    $id = $data['id'];

    //if not, call makeIdentifier()
    if(count($id) <= 0)
    {
        $id = makeIdentifier("album", $album_name);
        //then save it
        $data['id'] = $id;
        saveJsonSettings($album_name, 'data', $data);
    }

    return $id;}

function getAlbumFromID($album_id){
    $albums = getSortedAlbums();

    foreach($albums as $album)
    {
        $settings = readJsonSettings($album, "data");
        if($settings['id']==$album_id)
            return $album;
    }
    return null;}

function getPassedAlbum(){}

function checkAlbumValidity($album_name){
    $contentCount = 0;

    $contentCount += count(getAlbumImages($album_name));
    
    if($contentCount > 0)
        return true;
    else
        return false;}
?>