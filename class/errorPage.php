<?php

class errorPage extends page
{

    public function get()
    {
        //display error message 
        $this->html .= "Sorry, the uploaded file is not a CSV file.Please try again with a CSV file";

    }
}
