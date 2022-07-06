<?php

class Convert
{
    public function numberToString()
    {
        $ones = array(
            0 =>"ZERO",
            1 => "ONE",
            2 => "TWO",
            3 => "THREE",
            4 => "FOUR",
            5 => "FIVE",
            6 => "SIX",
            7 => "SEVEN",
            8 => "EIGHT",
            9 => "NINE",
            10 => "TEN",
            11 => "ELEVEN",
            12 => "TWELVE",
            13 => "THIRTEEN",
            14 => "FOURTEEN",
            15 => "FIFTEEN",
            16 => "SIXTEEN",
            17 => "SEVENTEEN",
            18 => "EIGHTEEN",
            19 => "NINETEEN",
            "014" => "FOURTEEN"
        );
        $tens = array(
            0 => "ZERO",
            1 => "TEN",
            2 => "TWENTY",
            3 => "THIRTY",
            4 => "FORTY",
            5 => "FIFTY",
            6 => "SIXTY",
            7 => "SEVENTY",
            8 => "EIGHTY",
            9 => "NINETY"
        );
        $hundreds = array(
            "HUNDRED",
            "THOUSAND",
            "MILLION",
            "BILLION",
            "TRILLION",
        );

        if(isset($_POST['convert'])){
           $input = $_POST['number'];
           $output = "";
           $number = number_format($input,2,".",",");
           $arrNumber = explode('.', $number);
           $decimal = $arrNumber[1] ?? 0;
           $wholeNumber = array_reverse(explode(",",$arrNumber[0]));
           krsort($wholeNumber,1);

           foreach ($wholeNumber as $key => $value){
               while(substr($value,0,1)=="0") {
                   $value=substr($value,1,null);
               }

               if($value < 20) {
                   $output .= $ones[$value];
               }elseif($value < 100){
                   if(substr($value,0,1)!="0") {
                       $output .= $tens[substr($value,0,1)];
                   }
                   if(substr($value,1,1)!="0") {
                       $output .= " ".$ones[substr($value,1,1)];
                   }
               }else{
                   if(substr($value,0,1)!="0"){
                       $output .= $ones[substr($value,0,1)]." ".$hundreds[0];
                   }
                   if(substr($value,1,2) < 20 && substr($value,1,2) > 0){
                       if(substr($value,1,1)!="0") {
                           $output .= " ".$ones[substr($value,1,2)];
                       }else{
                           $output .= " ".$ones[substr($value,2,1)];
                       }

                   }else{
                       if(substr($value,1,1)!="0") {
                           $output .= " ".$tens[substr($value,1,1)];
                       }
                       if(substr($value,2,1)!="0"){
                           $output .= " ".$ones[substr($value,2,1)];

                       }
                   }


               }
               if($key > 0){
                   $output .= " ".$hundreds[$key]." ";
               }
           }
            $output .= " DOLLAR";

            if($decimal > 0) {
                $output .= " AND ";
                if ($decimal < 20) {
                    if (substr($decimal, 0, 1) != '0'){
                        $output .= $ones[$decimal];
                    }else{
                        $output .= $ones[substr($decimal, 1, 1)];
                    }

                } elseif ($decimal < 100) {
                    if (substr($decimal, 1, 1) != '0') {
                        $output .= $tens[substr($decimal, 0, 1)];
                        $output .= $ones[substr($decimal, 1, 1)];
                    }else{
                        $output .= $tens[substr($decimal, 0, 1)];
                    }

                } else {
                    echo 'Invalid Cents';
                }
                $output .= " CENTS ";
            }


           echo $output;
        }

    }
}