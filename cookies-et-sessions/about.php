<pre>
<?php

setcookie('abouts', 'je suis dans abouts', $httponly = true);

?>

</pre>

<h1>about</h1>
<h2><?= $_COOKIE['abouts'] ?? '' ?></h2>
<a href="/cookies-et-sessions">index</a>