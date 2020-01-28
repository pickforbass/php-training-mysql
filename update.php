<?php
include "serverconn.php";
global $conn;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <header>
	<h1>Modifier des informations</h1>
    </header>
    <?php
    $id = $_GET['id'];
    global $id;
    $data_select = "SELECT * from `hiking` WHERE `id` = $id";
    $result = $conn->query($data_select);
    while($row = $result->fetch_assoc()){
        $name = utf8_encode($row['name']);
        $difficulty = utf8_encode($row['difficulty']);

    ?>
    <html>
	<section class="content">
        <form action="" method="post">
            <div>
                <label for="name">Name</label>
                <input name="hike" value = "<?php echo $name?>">
            </div>

            <div>
                <label for="difficulty">Difficulté</label>
                <select name="difficulty">
                    <option value="très facile" <?php if ($difficulty == "très facile"){echo 'selected="selected"';}?>>Très facile</option>
                    <option value="facile" <?php if ($difficulty == "facile"){echo 'selected="selected"';}?>>Facile</option>
                    <option value="moyen"<?php if ($difficulty == "moyen"){echo 'selected="selected"';}?>>Moyen</option>
                    <option value="difficile"<?php if ($difficulty == "difficile"){echo 'selected="selected"';}?>>Difficile</option>
                    <option value="très difficile"<?php if ($difficulty == "très difficile"){echo 'selected="selected"';}?>>Très difficile</option>
                </select>
            </div>

            <div>
                <label for="distance">Distance</label>
                <input type="text" name="distance" value="<?php echo $row['distance']?>">
            </div>
            <div>
                <label for="duration">Durée</label>
                <input type="duration" name="duration" value="<?php echo $row['duration']?>">
            </div>
            <div>
                <label for="height_difference">Dénivelé</label>
                <input type="text" name="height_difference" value="<?php echo $row['height_difference']?>">
                <input type = "hidden" name = "id" value = "<?php $id?>">
            </div>
            <button type="button" class='main_link' name="button">Modifier</button>
        </form>
    </section>

    <a class ="main_link" href="read.php">Liste des données</a>
</body>
</html>
<?php }
if (isset($_POST['id'])){
    $newid = $_POST['id'];
    $newname = $_POST['name'];
    $newdiff = $_POST['difficulty'];
    $newdist = $_POST['distance'];
    $newdurat = $_POST['duration'];
    $newh_d = $_POST['height_difference'];

$upd = "UPDATE `hiking` SET `id`=[$newid],`name`=[$newname],`difficulty`=[$newdiff],
        `distance`=[$newdist],`duration`=[$newdurat],`height_difference`=[$newh_d] WHERE 1";

$conn->query($upd);
}
?>