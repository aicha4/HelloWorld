<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 08/03/13
 * Time: 14:27
 * To change this template use File | Settings | File Templates.
 */

/*$doc->save('file.xml');
// load
$arr = array();
$doc = new DOMDocument();
$doc->load('file.xml');
$root = $doc->getElementsByTagName('root')->items[0];
foreach($root->childNodes as $item)
{
    $arr[$item->nodeName] = $item->nodeValue;
}*/

function arrayToXML($array,$node_name,$doc)
{
    $root = $doc->createElement($node_name);
    $root = $doc->appendChild($root);

    foreach($array as $key=>$value)
    {
        if (is_array($value)){

            $root->appendChild(arrayToXML($value,$key,$doc));
        }
        else {
            $em = $doc->createElement($key);
            $text = $doc->createTextNode($value);
            $em->appendChild($text);
            $root->appendChild($em);

        }

    }
    return $root;
}

$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);



//test
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
//$root=$doc->appendChild(arrayToXML($test_array,'root',$doc));
$root=$doc->appendChild(arrayToXML($test_array,'root',$doc));

print $doc->saveXML();
//print arrayToXML($test_array,'root')->saveXML();
;
