<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<header>
	<h1>Ajouter une randonnée</h1>
</header>
<section class = "content">
	<form action="#" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</section>

<section>
    <a class ="main_link" href="read.php">Retour à la liste des randonnées</a>
    <a class ="main_link" href="read.php">Liste des données</a>
</section>
</body>
</html>

<?php
//connect to server & DB
$servername = 'localhost';
$username = 'root';
$pw = '';
$dbname = 'reunion_island';
$conn = new mysqli($servername, $username, $pw);
global $conn;

if ($conn->connect_error) {
    echo 'error';
} else {
    $conn->select_db($dbname);
}

function check_datas(){
    if (isset($_POST['name'])) {
        if (isset($_POST['distance'])) {
            if (isset($_POST['duration'])) {
                if (isset($_POST['difficulty'])) {
                    if (isset($_POST['height_difference'])) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function addhiking(){
    $ni_name = $_POST['name'];
    $ni_dist = $_POST['distance'];
    $ni_dur = $_POST['duration'];
    $ni_diff = $_POST['difficulty'];
    $ni_height = $_POST['height_difference'];
    global $conn;

    $stmt = mysqli_prepare($conn, "INSERT INTO hiking (name,difficulty, distance, duration, height_difference)
    VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, 'ssiii',$_POST['name'],$_POST['difficulty'],$_POST['distance'],$_POST['duration'],$_POST['height_difference']);
    $launch = mysqli_stmt_execute($stmt);
    if($launch){
        echo "<div>Félicitations, votre randonnée a bien été enregistrée</div>";
    }
    }


if (check_datas()) {
    addhiking();

}









