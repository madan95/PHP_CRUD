<?php
try{
$pdo = new PDO('mysql:host=studentnet.kingston.ac.uk;dbname=db_k1429795','k1429795', 'gundam');
}catch (PDOException $e){
	print "Error in Connection.php Madan-Sama!: ".$e->getMessage()."<br/>";
	die();
}
?>