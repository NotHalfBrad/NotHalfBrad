<?php
	$site_section = "philosophy";
	include '../layout/header.php';

drawTitleCard("Philosophy Background");

$result= '
The following is my philosophy reading history, soon with my thoughts on each.<br><br>
<div style="column-width:600px;">
<b>Classical</b><br>
Apology - Plato<br>
Crito - Plato<br>
Phaedo - Plato<br>
Republic - Plato<br>
The Extant Works of Epicurus<br>
<br>
<b>Hellenistic</b><br>
On the Shortness of Life - Seneca<br>
Discourses (Epictetus) - Arrian<br>
Enchiridion (Epictetus) - Arrian<br>
Meditations - Marcus Aurelius<br>
<br>
<b>Medieval European</b><br>
On Light - Robert Grosseteste<br>
<br>
<b>Early Modern European</b><br>
Beyond Good and Evil - Friedrich Nietzche<br>
<br>
<b>Other</b><br>
Tao te Ching - Lao Tzu<br>
The Canon of Reason and Virtue - Lao Tze<br>
Book of Five Rings - Miyamoto Musashi<br>
The Way of Peace - James Allen<br>
<br>
<b>Related History</b><br>
Lives of the Eminent Philosophers - Diogenes Laërtius<br>
The History of Philosophy, Without Any Gaps - Peter Adamson<br>
</div>';

drawDataCard($result);

$result = '
The following are on my reading list. Care to recommend any others?<br>
<div style="column-width:600px;">
<ol>
<li>Letters from a Stoic - Seneca</li>
<li>Symposium - Plato</li>
<li>Timaeus - Plato</li>
<li>Rhetoric - Aristotle</li>
<li>Confessions - Augustine of Hippo</li>
<li>On the Nature of Things - Titus Lucretius Carus</li>
<li>Outlines of Pyrrhonism - Sextus Impericus</Li>
<li>On Nature - Heraclitus of Ephesus</li>
<li>Become What You Are - Alan Watts</li>
<li>On interpretation - Aristotle</li>
<li>Ethics - Peter Abelard</li>
<li>Thus Spoke Zarathustra - Friedrich Nietzche</li>
<li>Observations on the Feeling of the Beautiful and Sublime - Immanuel Kant</li>
<li>The Way of Chuang Tzu - Thomas Merton</li>
<li>Beginner\'s Mind, Zen Mind - Shunryu Suzuki</li>
<li>Orientalism - Edward Said</li>
<li>The Book of Joy - Dalai Lama</li>
<li>Brief History of Everything - Ken Wilbur</li>
<li>The Path of Aloneness - Myamoto Musashi</li>
<li>As a Man Thinketh - James Allen</li>
</ol><br>
My main passion has been reading ancient greek and roman philosophy, but friends are encouraging me to interact with far eastern philosophy, as well as more modern western philosophy, as reflected in the recomendations on this list. I would also like to be turned on to particular titles in Indian philosophy, as well as some Averroes or other middle eastern thinkers (though it still part of the western tradition).
</div>';

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
