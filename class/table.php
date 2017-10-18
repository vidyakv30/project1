<?php
class table extends page
{
    public function get()
    {
        if (isset($_REQUEST['file'])) {
            $target_file = $_REQUEST['file'];
        }
        //Get the file name and display as a heading on the Table page

        $file_name = substr($target_file, (strpos($target_file, '/') + 1));

        $this->html .= "<h1>$file_name</h1>";

        //Read the csv file and display an HTML table contents with table headings.
        $file = fopen($target_file, "r");
        $this->html .= '<table>';
        for ($i = 0;!feof($file); $i++) {
            $this->html .= '<tr>';
            $htmlTable = fgetcsv($file);
            $openTag   = "<td>";
            $closeTag  = "</td>";
            if ($i == 0) {
                $openTag  = "<th>";
                $closeTag = "</th>";
            }
            foreach ($htmlTable as $cell) {

                $this->html .= "$openTag" . "$cell" . "$closeTag";
            }
            $this->html .= '<tr>';
        }
        fclose($file);
        $this->html .= '</table>';

        //Linkto upload another file
        $this->html .= '<br/><hr>';
        $form = '<form action="index.php" method="get"
        enctype="multipart/form-data">';
        $form .= '<input type="submit" value="Upload Another File" name="submit">';
        $this->html .= $form;

    }

}
