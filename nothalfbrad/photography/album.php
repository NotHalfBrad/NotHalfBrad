<?php
    $site_section = "photography";
    require_once 'create_thumbnail.php';
    require_once 'photofuncs.php';
    require_once 'album_header.php';
	require_once '../layout/header.php';
    //require_once '../layout/layoutfuncs.php';


if($album_name!="")
{
$visitorCount = countVisitor($album_name, $_SERVER['REMOTE_ADDR']);
$album = new Album($album_name);

if($album->isEnabled != "true" && !isAdminUser()) $error = "This album does not exist! Sometimes this happens because of stupid renumbering errors (working on that!)... Try finding it through the gallery instead!";
else if($album->isEnabled == "true" || isAdminUser())
{
    drawTitleCard($album_name,'<a href=./gallery.php class="gallery-link"> &larr; Back to gallery</a>');


//Process submitted form
//////////////////////////////////////
if (!empty($_POST))
{
    if(!empty($_POST["is_enabled"])) $album->isEnabled = $_POST["is_enabled"];
    if(!empty($_POST["id"])) $album->ID = $_POST["id"];
    if(!empty($_POST["album_name"])) $album->name = $_POST["album_name"];
    if(!empty($_POST["reset_date"])) $album->date_record = getFirstPictureDate($album_name);
    if(!empty($_POST["date_record"]))
        {
            $t = strtotime($_POST["date_record"]);
            $d = date('Y:m:d h:m:s',$t);
            $album->date_record = $d;
        }

    if(!empty($_POST["description"]))$album->description = $_POST["description"];

    if(!empty($_POST["country"]))$album->country = $_POST["country"];
    if(!empty($_POST["region"]))$album->region = $_POST["region"];
    if(!empty($_POST["city"]))$album->city = $_POST["city"];
    if(!empty($_POST["hood"]))$album->hood = $_POST["hood"];
    if(!empty($_POST["trip"]))$album->trip = $_POST["trip"];    
    if(!empty($_POST["group"]))$album->group = $_POST["group"];
    if(!empty($_POST["tags"]))$album->tags = $_POST["tags"];
    if(!empty($_POST["related_albums"]))$album->related_albums = $_POST["related_albums"];


    $album->export();
}


//Admin form
//////////////////////////////////////
$oppositeEnabled = "false";
if($album->isEnabled == "false")
    $oppositeEnabled = "true";

$t = strtotime($album->date_record);
$d = date('Y-m-d',$t);

$admin= '
<form action="'.getAlbumURL($album_name).'" method="post" id="admin_form">

    <!-- Toggle visibility -->
    Visibility:
    <select id="is_enabled" name="is_enabled" form="admin_form">
        <option value='.$album->isEnabled.'>*'.$album->isEnabled.'*</option>
        <option value='.$oppositeEnabled.'>'.$oppositeEnabled.'</option>
    </select><br>

    <!-- name -->
    ID: <input type="text" name="id" value="'.$album->$ID.'"><br>

    <!-- Date -->
    Date: <input type="date" name="date_record" value="'.$d.'"> 
    <input type="submit" value="Save This Date">
    <input id="reset_date" name="reset_date" type="hidden" value="true">
    <input type="submit" value="Reset Date">

    <a href ="./choose_cover.php?album='.readifyURL($album_name).'">Choose Cover</a> 
    Choose Banner<br><br>


    Emoji: '.$album->emoji.' New: <input type="text" name="emoji_name">
    <input type="submit" name="Update"><br>
    <a href = "https://afeld.github.io/emoji-css/">https://afeld.github.io/emoji-css/</a><br>

    <fieldset>
        <legend> Location </legend>
        <table>
            <tr><td> Country </td><td> Region </td><td> City </td><td> Hood </td></tr>
            <tr>
                <td><input type="text" name="country" value="'.$album->country.'"></td>
                <td><input type="text" name="region" value="'.$album->region.'"></td>
                <td><input type="text" name="city" value="'.$album->city.'"></td>
                <td><input type="text" name="hood" value="'.$album->hood.'"></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend> Other Relations </legend>
        <table><tr>
            <td> Trip </td><td> Group (Album sub-group for trip)</td>
        </tr><tr>
            <td><input type="text" name="trip" value="'.$album->trip.'"></td>
            <td><input type="text" name="group" value="'.$album->group.'"></td>
        </tr></table>
        Tags<br><textarea rows="4" cols="128" name="tags">'.$album->tags.'</textarea><br>
        Album IDs<br><textarea rows="2" cols="128" name="related_albums">'.$album->related_albums.'</textarea><br>
    </fieldset>

    <fieldset>
        <legend> Details </legend>
        Name<br><input type="text" name="album_name" value="'.$album_name.'"><br>
        Description:<br><textarea rows="10" cols="128" name="description">'.$album->description.'</textarea><br>
    </fieldset>


    <input type="submit" name="Update">
</form>


Reorder<br>
Current Folder Name<br>
Original Folder Name<br>
Original ID<br>
Current ID<br>
Identifier Entry<br>
First Image Date<br>
Date Uploaded<br>
Current Set Date<br>
Banner Source, Cover Source<br>
';



    echo '
    <div class="datacard-frame color-body shadow" style="width:100%;">
    <!--<table width="100%" style="padding:10px; box-sizing: border-box;"><tr>
        <td align="left"><a href=./gallery.php class="gallery-link"> &larr; Back to gallery</a></td>
        <td align="right"></td>
    </tr></table>-->


    <div class="album-banner" style="background-image:url(\''.$banner.'?='.filemtime($banner).'\');">
        
            <!--<div class="color-accent" style="width:100%; height:3px;"></div>-->
            <div class="album-banner-content banner-size">
                <!--<br><div class="album-title">'.$album_name.'</div>-->
                <div class="album-subtitle">'.$album->description.'</div>
                <div class="font-body" style="vertical-align:bottom; border:1px;">'.$visitorCount.' unique views</div>
                <div class="font-body" style="vertical-align:bottom; border:1px;"><a href="#comments">Skip to Comments &#8628;</a>
                <br><br>
                If you like this album, consider buying me a coffee:<p>
                <script type=\'text/javascript\' src=\'https://ko-fi.com/widgets/widget_2.js\'></script><script type=\'text/javascript\'>kofiwidget2.init(\'Support Me on Ko-fi\', \'#46b798\', \'R6R2T75B\');kofiwidget2.draw();</script>
                </div>
            </div>
            <div style="background-color:black; width:100%; height:3px;"></div>
            
        </div>


        <div class="datacard-content columns-thumb">';
        foreach($images as $image) 
        {
            $thumbloc = getThumbnail($album_name, $image);
            echo '<a href="'.getImageURL($album_name, $image).'"><img src="'.$thumbloc.'" class="photo"><a/> ';
        }
        echo '
        </div>
    </div>';

    //generate the ID, for disqus below
    $album_name_ID = getAlbumIdentifier($album_name);

?>

    <div class="datacard-frame color-body shadow" style="width:100%;">
        <div id="comments" class="datacard-content">
            <div id="disqus_thread"></div>
            <script>
            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

            var disqus_config = function () {
                this.page.url = getAlbumURL($album_name);//'https://www.nothalfbrad.com/photography/album.php';//PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = '<?php echo $album_name_ID ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://nothalfbrad.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>


<?php
        }//closes the enabled album check
    }//closes out the invalid album check
    include '../layout/footer.php';
?>
