<?php
function html_parse($file)
     {
      $array = str_split($file, 1);
      $count = false;
      $text = "";
      $end = false;
      foreach($array as $temp)
       {
        switch($temp)
         {
          case "<":
           between($text);
           $text = "";
           $count = true;
           $end = false;
           break;
          case ">":
           if($end == true) {end_tag($text);}
           else {start_tag($text);}
           $text = "";
           break;
          case "/":
           if($count == true) {$end = true;}
           else {$text = $text . "/";}
           break;
          default:
           $count = false;
           $text = $text . $temp;
         }
       }
     }
?>
