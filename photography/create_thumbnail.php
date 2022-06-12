<?php 
/**
 * This code is an improvement over Alex's code that can be found here -> http://stackoverflow.com/a/11376379
 * 
 * This funtion creates a thumbnail with size $thumbnail_width x $thumbnail_height.
 * It supports JPG, PNG and GIF formats. The final thumbnail tries to keep the image proportion.
 * 
 * Warnings and/or notices will also be thrown if anything fails.
 * 
 * Example of usage:
 * 
 * <code>
 * require_once 'create_thumbnail.php';
 * 
 * $success = createThumbnail(__DIR__.DIRECTORY_SEPARATOR.'image.jpg', __DIR__.DIRECTORY_SEPARATOR.'image_thumb.jpg', 60, 60, array(255,255,255)); // creates a thumbnail called image_thumb.jpg with 60x60 in size and with a white background
 * 
 * echo $success ? 'thumbnail was created' : 'something went wrong';
 * </code>
 * 
 * @author Pedro Pinheiro (https://github.com/pedroppinheiro).
 * @param string $filepath The image's complete path. Example: C:\xampp\htdocs\project\image.jpg
 * @param string $thumbpath The path to create the thumbnail + name of the thumbnail. Example: C:\xampp\htdocs\project\image_thumbnail.jpg
 * @param int $thumbnail_width Width of the thumbnail. Only integers allowed.
 * @param int $thumbnail_height Height of the thumbnail. Only integers allowed.
 * @param bool  $should_crop whether the image should be cropped to thumbnail dimensions (true), or best fit (false / default)
 * @return boolean Returns true if the thumbnail was created successfully, false otherwise.
 */
function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $should_crop=false) {
    list($original_width, $original_height, $original_type) = getimagesize($filepath);
    
    //the upper left corner of where the scaled image is placed in the thumbnail
    $x_offset = 0;
    $y_offset = 0;

    $source_width = $original_width;
    $source_height = $original_height;


    if($should_crop)
    {
        $new_width = $thumbnail_width;
        $new_height = $thumbnail_height;

        $x_scale = $thumbnail_width / $original_width;
        $y_scale = $thumbnail_height / $original_height;
        $scale = max($x_scale, $y_scale);

        if($x_scale<$y_scale)
        { 
            $distortion = intval(($original_width * $scale) - ($original_width * $x_scale));
            $difference = intval($distortion / $scale);
            $source_width = $original_width - $difference;
            $x_offset = intval($difference / 2); 
        }
        else
        {
            $distortion = intval(($original_height * $scale) - ($original_height * $y_scale));
            $difference = intval($distortion / $scale);
            $source_height = $original_height - $difference;
            $y_offset = intval($difference / 2);
        }
    }
    else //fit rather than crop
    {
        if ($original_width > $original_height) 
        {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } 
        else 
        {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
    }

    if ($original_type === 1) {
        $imgt = "ImageGIF";
        $imgcreatefrom = "ImageCreateFromGIF";
    } else if ($original_type === 2) {
        $imgt = "ImageJPEG";
        $imgcreatefrom = "ImageCreateFromJPEG";
    } else if ($original_type === 3) {
        $imgt = "ImagePNG";
        $imgcreatefrom = "ImageCreateFromPNG";
    } else {
        return false;
    }
    $old_image = $imgcreatefrom($filepath);
    $new_image = imagecreatetruecolor($new_width, $new_height); // creates new image, but with a black background
    
    //imagefilter($old_image, IMG_FILTER_COLORIZE, 255, 0, 0, 127);
    imagecopyresampled($new_image, $old_image, 0, 0, $x_offset, $y_offset, $new_width, $new_height, $source_width, $source_height);
    //imagefilter($new_image, IMG_FILTER_BRIGHTNESS, $brightness);

    $imgt($new_image, $thumbpath);
    return file_exists($thumbpath);
}
?>