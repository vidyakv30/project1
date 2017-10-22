
<?php
class printHtmlTags
{   
    public static function headingOne($text){

        echo"<h1>$text</h1>";
    }

    
    public static function tableHeader($text){

        echo "<th>$text</th>";

    }

    public static function tableRow($text){

        echo "<td>$text</td>";
    }

    public static function printThis($text){

        echo $text;
    }

   

}

?>