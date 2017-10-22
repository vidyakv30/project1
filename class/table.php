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

        $this->html .= printHtmlTags::headingOne("$file_name");

        //Read the csv file and display  HTML table  with table headings.

        $file = fopen($target_file, "r");

        $this->html .= printHtmlTags::printThis('<table>');

        for ($i = 0;!feof($file); $i++) {

            $this->html .= printHtmlTags::printThis('<tr>');

            $htmlTable = fgetcsv($file);

            foreach ($htmlTable as $cell) {
                if ($i == 0) {

                    $this->html .= printHtmlTags::tableHeader($cell);
                } else {

                    $this->html .= printHtmlTags::tableData($cell);
                }

            }
            $this->html .= printHtmlTags::printThis('<tr>');
        }
        fclose($file);
        $this->html .= printHtmlTags::printThis('</table>');

        //Linkto upload another file
        $this->html .= printHtmlTags::printThis('<br/>');

        $form = '<form action="index.php" method="get"
        enctype="multipart/form-data">';
        $form .= '<input type="submit" value="Upload Another File" name="submit">';
        $this->html .= $form;

    }

}
?>