<pre>
<?php

print_r($_COOKIE);

setcookie('name', 'Marko');

?>


</pre>

<h1><?= $_COOKIE['name'] ?? 'Pas de cookie' ?></h1>
<h2><?= $_COOKIE['abouts'] ?? 'Pas de cookie' ?></h2>
<a href="about.php">about</a>

