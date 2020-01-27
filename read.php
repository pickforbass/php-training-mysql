<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <header>
    <h1>Liste des randonnées</h1>
  </header>
  <section class ="content">
    <table>
        <div class="h_row">
            <span class="hike_name">Trajet</span><span class="hiking_info">Durée</span><span class="hiking_info">Distance</span><span class="hiking_info">Difficulté</span><span class="hiking_info">Dénivelé</span>
        </div>
      <!-- Afficher la liste des randonnées -->
        <?php
        $servername = 'localhost';
        $username = 'root';
        $pw = '';
        $dbname = 'reunion_island';

        $conn = new mysqli($servername, $username, $pw);

        if($conn->connect_error){
            echo 'erreur connexion';
        }else{
            $conn->select_db($dbname);
        }
        $hikelist = "SELECT * from `hiking` WHERE 1";
        $result = $conn->query($hikelist);
        while ($row = $result->fetch_assoc()){
            echo '<div class="h_row"><span class="hike_name">'.$row['name'].'</span>'.
                '<span class="hiking_info">'.$row['duration'].'</span>'.
                '<span class="hiking_info">'.$row['distance'].'</span>'.
                '<span class="hiking_info">'.$row['difficulty'].'</span>'.
                '<span class="hiking_info">'.$row['height_difference'].'</span></div>';
        }
        ?>
    </table>
  </section>
  <a href="create.php">Ajouter une randonnée</a>
  </body>
</html>
