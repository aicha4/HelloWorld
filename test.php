<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 07/03/13
 * Time: 17:07
 * To change this template use File | Settings | File Templates.
*/

function chargerClasse($classe)
{
    require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction

$perso = new Personnage(array(
    'nom' => 'Victor',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 0
));

$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$manager = new PersonnagesManager($db);

$manager->add($perso);
?>