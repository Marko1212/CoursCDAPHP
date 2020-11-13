<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Igraci</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Fudbal</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Glavna</a></li>
                    <li><a href="players.php">Igraci</a></li>
                    <li><a href="teams.php">Ekipe</a></li>
                    <li><a href="countries.php">Zemlje</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="content">
<div class="container-fluid">
<?php include 'db.php'; ?>
<?php include 'api.php'; ?>
<?php
    $id = $_GET['player_id'];
    if ($id) {
        $player = getPlayerById($db, $id);    
    } else {
        echo "<h1>Error</h1>";
        exit();
    }
    
?>

<form action="save.php" method="post">
<input type="hidden" name="id" value="<?php echo $player['player_id']; ?>">
<div class="form-group">
<label for="name">Igrac</label>
<input type="text" class="form-control" id="name" name="name" value="<?php echo $player['player_name']; ?>">
</div>
<button type="submit" class="btn btn-default">Sacuvaj</button>
</form>




</div>
</div>

<footer>
</footer>
</body>
</html>