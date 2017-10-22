<?php

class errorPage extends page
{

    public function get()
    {
        //display error message
        $this->html .= "<h4>Error on upload. File must be CSV.<br/>Please try again.</h4>";

        //display option to upload another file

        $form = '<form action="index.php" method="get"
        enctype="multipart/form-data">';
        $form .= '<input type="submit" value="Upload Another File" name="submit">';
        $this->html .= $form;

    }
}
?>