<?php
	$site_section = "philosophy";
	include '../layout/header.php';

drawTitleCard("Recommendations");

$result= '
Additional resources:<br>
<table>
<tr><td><a href="http://www.sacred-texts.com/index.htm">Sacred-Texts.com</a></td><td>A vast collection of pdfs of various religious, philosophical, and otherwise culturally important works from all eras of time. Much philosophy is old enough that copyright law doesn\'t apply even to the translations anymore, and this is a great place to find some of those old versions for free.</td></tr>
</table>
';

drawDataCard($result);

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
