<?php

foreach($whole_arr as $key => $i){

    while(substr($i,0,1)=="0")
        $i=substr($i,1,5);
    if($i < 20){
        /* echo "getting:".$i; */
        $rettxt .= $ones[$i];
    }elseif($i < 100){
        if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
        if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
    }else{
        if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
        if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
        if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
    }
    if($key > 0){
        $rettxt .= " ".$hundreds[$key]." ";
    }
}
if($decnum > 0){
    $rettxt .= " and ";
    if($decnum < 20){
        $rettxt .= $ones[$decnum];
    }elseif($decnum < 100){
        $rettxt .= $tens[substr($decnum,0,1)];
        $rettxt .= " ".$ones[substr($decnum,1,1)];
    }
}
