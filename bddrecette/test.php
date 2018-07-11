<?php  


$serveur ="localhost";
$login = "root";
$pass = "";

try{
    $connexion = new PDO("mysql:host=$serveur;dbname=Nutrition",$login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion reussi<br>";
    $nb = rand(2,20);
    $requete = $connexion->prepare("
    SELECT nom, drapeau FROM drapeau WHERE id = ".$nb.";
");
    $requete->execute();

    $tables = $requete->fetchAll();


    foreach($tables as $tableau){ 
            $aff = $tableau['nom'];
            echo $aff;            
            echo '<img src="img/'.$aff.'.png" >';
    }
}
catch(PDOException $e) {
    echo"echec : ".$e -> getMessage();
    }
      

   

?>