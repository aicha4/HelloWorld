<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function arrayToXML($array,$node_name)
{
    $xml = new SimpleXMLElement('<'.$node_name.'/>');
    if (is_array($array) || is_object($array))
    {
        foreach ($array as $key=>$value ){
            if (is_array($value)){
                $xml[0]->addChild($key,
                    arrayToXML($value,$key));
            }
            else{
                $xml->addChild($key,$value);
            }

        }
    }
    return $xml;
}


$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);

$xmlDAta = array(
    array(
        "name"  => "nameVal",
        "value" => "valVal",
        "css"   => "cssVal"
    ),
    array(
        "name"  => "name1Val",
        "value" => "val1Val",
        "css"   => "css1Val"
    ),
    "tname" => array(
        array(
            "iTname"   => "iTname",
            "iTname2"  => "iTname1",
            "iTname2"  => "iTname2",
            "iTbname3" => array(
                "iiTbname"  => "tbName",
                "iiTbname1" => "tbName1",
            ),
        ),
    ),
    "tdata" => "otheerDAta"
);


print arrayToXML($test_array,'root')->saveXML();


?>
