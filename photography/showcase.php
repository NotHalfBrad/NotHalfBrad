<?php
    $site_section = "photography";
    include '../layout/header.php';
    require_once 'create_thumbnail.php';
    require_once 'photofuncs.php';
    require_once 'showcase_header.php';

//need showcase update funcs
    //add section
    //remove section
    //reorder sections
    //add image
    //remove image
    //recategorize image
//add images from viewer
//sort and remove from this page
//seperate viewer, or maybe just a seperate "showcase" argument
//format these images, make them much bigger

drawTitleCard("Favorite Images");
$data = readJson("./showcase.json");

foreach($data["sections"] as $section)
{
    $result = '<div class="datacard-content-top-only">
    <div class="font-datacard-title datacard-title">'.$section["title"].'</div>
    <div class="carousel datacard-content-bottom-only" style="text-align:center; width:100%" data-flickity=\'{ "lazyLoad": 2, "groupCells": false, "adaptiveHeight": true, "wrapAround": true}\'>';

    foreach($section["photos"] as $photo)
    {
        $album_name = getAlbumFromID($photo["album_id"]);
        $thumb = getReducedImage($album_name, $photo["photo_name"]);
        $result .= '<img data-flickity-lazyload="'.$thumb.'"  style="display: block; height:60vh; margin:0.25em;"/>&nbsp;';
                    //<div class="carousel-cell"><img src="'.$thumb.'" style="height:60vh;"></div>';
    }

    $result .= '</div></div>';

    drawDataCardSimple($result,"","",$section["title"]);
}


$result = '
<div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page\'s canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable
};
(function() { // DON\'T EDIT BELOW THIS LINE
var d = document, s = d.createElement("script");
s.src = "https://nothalfbrad.disqus.com/embed.js";
s.setAttribute("data-timestamp", +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>';

drawDataCard($result);

    include '../layout/footer.php';               
?>
