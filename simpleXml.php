<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 07/03/13
 * Time: 17:54
 * To change this template use File | Settings | File Templates.
 */
$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);

$xml = new SimpleXMLElement('<root/>');// on genere un fichier xml
array_walk_recursive($test_array, array ($xml, 'addChild'));
print $xml->asXML();

$monfichier = fopen('array.xml', 'a+');

fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $xml->asXML()); // On écrit  de pages vues


fclose($monfichier);


?>