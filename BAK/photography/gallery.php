<?php
    $site_section = "photography";
	include '../../layout/header.php';
	require_once 'create_thumbnail.php';
    require_once 'photofuncs.php';

//Process submitted form
//////////////////////////////////////
if(!empty($_POST["is_enabled"]))
{
    $album->isEnabled = $_POST["is_enabled"];
    //$album->export();
} 



//Admin form
//////////////////////////////////////
$admin= '
<!-- Make all visible (Ive disabled this)
<form action="./gallery.php" method="post">
<input id="enable_all" name="enable_all" type="hidden" value="true">
<input type="submit" value="Enable All Albums">
</form>-->';


    drawTitleCard("Personal Photo Gallery");

    echo ' <div class="datacard-frame shadow color-body" style="width:100%;">
    <div class="datacard-content" style="text-align:center; margin-left:auto; margin-right:auto;">

        <div class="datacard-caption font-body" style="text-align:left;">

        This gallery is a work in progress. It is early in both design, implementation, and content.<br><br>

        These are my personal photos. For my professional photography, go to <a href="http://www.bardicimagery.com">BardicImagery.com</a>.<br><br><br>

        If you like this album, consider buying me a coffee:<p>
                <script type=\'text/javascript\' src=\'https://ko-fi.com/widgets/widget_2.js\'></script><script type=\'text/javascript\'>kofiwidget2.init(\'Support Me on Ko-fi\', \'#46b798\', \'R6R2T75B\');kofiwidget2.draw();</script>

        </div>';//style="display:grid; grid-template-columns: repeat(auto-fill,minmax('._cover_x.'px, 1fr)); grid-gap: 20px;">';//padding:0px 30px 0px 30px;
        //<div class="datacard-content gallery-columns">';

    $albums = getSortedAlbums();
    $invalidAlbums = 0;
    
    for($i = 0; $i < count($albums); $i++) 
    {
        $album_name = $albums[$i];
        $album = new Album($album_name);

        $curAlbumDate = intval($album->date_record);

        $prevAlbumDate = 0;
        //update the held prevAlbum
        if($i > 0)
        {
            $prevAlbum = new Album($albums[$i-1]);
            $prevAlbumDate = intval($prevAlbum->date_record);
        }

        /*
        if(!empty($_POST["enable_all"]))
        {
            $album->isEnabled = "true";
            $album->export();
        } */

        //should I display what I found?
        if($album->isEnabled=="true" || isAdminUser())
        {
            //check if there are any images present
            //only proceed if yes
            if(checkAlbumValidity($album_name))
            {

                if($prevAlbumDate != $curAlbumDate)
                echo '<div class="font-datacard-title" style="text-align:center;">'.$curAlbumDate.'</div>';

            	$cover = getCoverLocation($album_name);
                if(!file_exists($cover))
                    createCover($album_name);

                if(isAdminUser() && ($album->isEnabled == "false"))
                {
                    $coloring = "background-color: rgba(255,0,0,0.6); height:100%;";
                    $note = "<CENTER><B>ALBUM DISABLED</B></CENTER><BR>";
                }
                else
                {
                    $coloring = "";
                    $note = "";
                }
                //echo '<center><img src="'.$cover.'" style="width:'._cover_x.'; height:'._cover_y.'"></center>';

                //draw covers
                $pic = $album->pic_count;
                $vid = $album->vid_count;
                echo writeGalleryAlbum($note.$album_name, $cover, getAlbumURL($album_name), $pic, $vid, $coloring);
            }
            else
                $invalidAlbums++;
        }
        $preAlbumDate = $curAlbumDate;
    }

    echo '</div></div><br>';
    include '../../layout/footer.php';               


?>
