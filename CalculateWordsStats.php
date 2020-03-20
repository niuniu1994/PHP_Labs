<?php

function calculateWordsStats($url){
    $content = file_get_contents($url);
    $words = explode(' ',$content);
    for ($i = 0; $i < count($words); $i++){
        $words[$i]=trimall($words[$i]);
    }

    $words = array_diff($words,[""]);
    $nwo = array_count_values($words);
    arsort($nwo);
    $nwo = array_slice($nwo,0,10);
    foreach ($nwo as $wo=>$value){
        print $wo . " - " . $value ."<br>";
    }

}

function trimall($str)
{
    $limit=array(",","."," ","　","\t","\n","\r");
    $rep=array("","","","","","","");
    return str_replace($limit,$rep,$str);
}


calculateWordsStats('http://www.gutenberg.org/files/1321/1321-0.txt');