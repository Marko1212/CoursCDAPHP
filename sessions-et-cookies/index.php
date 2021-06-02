<pre>
<?php

session_start(
    [
        'save_path' => __DIR__ . '//sessions',
        'cookie_lifetime' => 500
    ]
);

$_SESSION['name'] = 'Marko';
$_SESSION['age'] = '12';

//unset($_SESSION['name']);

print_r($_SESSION);

//$_SESSION['name'] = 'Marko';

?>

<h1><?= $_SESSION['name'] ?></h1>
<h1><?= $_SESSION['age'] ?></h1>

</pre>