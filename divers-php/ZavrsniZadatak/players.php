<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Igraci</title>
<link href=  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
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
    $players = getAllPlayers($db);
?>
<table class="table table-bordered">
<tr>
    <th>Igrac</th>
    <th>Ekipa</th>
    <th>Zemlja</th>
    <th>Brisanje</th>
</tr>
<?php foreach ($players as $player) { ?>
<tr>
<td><a href="edit.php?player_id=<?php echo $player['player_id'];?>"><?php 
echo $player["player_name"];
?></a></td>
<td><?php 
echo $player["team_name"];
?></td>
<td><?php 
echo $player["country_name"];
?></td>
<td><a class="btn btn-danger" href="delete.php?player_id=<?php echo $player['player_id'];?>">Obrisi</a></td>
</tr>
<?php } ?>
</table>

<button id="addButton" class="btn btn-default">Dodaj igraca</button>
<form action="" method="POST" role="form" style="display: none; margin-top: 20px;">

<div class="form-group">
    <label for="">Upisi ime i prezime</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Upisi ime i prezime">
</div>
<div class="form-group">
     <select name="team" class="form-control" id="team">
      <?php 
            $teams = getAllTeams($db);
            foreach ($teams as $key=>$value) {
                echo "<option value=".$value['team_id'].">".$value['team_name']."</option>";
            }
        ?>
     </select>
</div>
<div class="form-group">
     <select name="country" class="form-control" id="country">
      <?php 
            $countries = getAllCountries($db);
            foreach ($countries as $key=>$value) {
                echo "<option value=".$value['country_id'].">".$value['country_name']."</option>";
            }
        ?>
     </select>
</div>
<button type="submit" class="btn btn-primary">Dodaj</button>
</form>
</div>
<?php
if (isset($_POST['name']) && $_POST['name']!='') {
$name = $_POST['name'];
$countryId = $_POST['country'];
$teamId = $_POST['team'];
addPlayer($db, $name, $countryId, $teamId);
}

?>
</div>

<footer>
</footer>
<script>
    $("#addButton").click(function() {
            $("form").slideDown();
    });
</script>
</body>
</html>