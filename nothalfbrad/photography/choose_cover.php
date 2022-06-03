<?php
    $site_section = "photography";
	include '../layout/header.php';
    require_once 'create_thumbnail.php';
    require_once 'photofuncs.php';

    
    $album_name = dereadifyURL($_GET['album']);
    $album = new Album($album_name);
    $notificationText ="";
    if(isset($_GET['coverchoice']))
    {
        $coverChoice = dereadifyURL($_GET['coverchoice']);
        createCover($album_name, $coverChoice);
        createBanner($album_name, $coverChoice);
        $notificationText ="Cover and Banner, updated!";
    }

    $images = getAlbumImages($album_name);
    $banner = getAlbumBanner($album_name, $images);

    $pic = $album->pic_count;
    $vid = $album->vid_count;

    echo '
    <div class="datacard-frame color-body shadow" style="width:100%;">
    <table width="100%" style="padding:10px; box-sizing: border-box;"><tr>
        <td align="left"><a href="./album.php?album='.readifyURL($album_name).'" class="gallery-link"> &larr; Back to album</a></td>
        <td align="right"></td>
    </tr></table>
        
        <div style="background-image:url(\''.$banner.'\');
        background-repeat:no-repeat;
        background-size: cover;
        background-position:center center;">
        
            <div class="color-heading" style="width:100%; height:3px;"></div>
            <div style="background-color:rgba(0, 0, 0, 0.60); height: 32vh; padding: 10px 30px 10px 30px;">
                <br><div class="album-title">'.$album_name.'</div>
                '.displayAlbumDescription($album_name).'
            </div>
            <div style="background-color:black; width:100%; height:3px;"></div>
            
        </div>';

        echo '
        <div class="datacard-content columns-photo" >';

        foreach($images as $image)
        {
            $thumbloc = getThumbnail($album_name, $image);
            
            $link = './choose_cover.php?album='.readifyURL($album_name).'&coverchoice='.readifyURL($image);

            echo writeGalleryAlbum($album_name, $thumbloc, $link, $pic, $vid);
        }
        echo '
        </div>
    </div>';

    include '../layout/footer.php';
?>
    