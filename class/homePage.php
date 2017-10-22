
<?php
class homePage extends page
{

    public function get()
    {
        //Create an HTML form to upload the file

        $form = '<form action="index.php" method="post"
        enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload File" name="submit">';
        $form .= '</form> ';
        $this->html .= printHtmlTags::headingOne('Upload File');
        $this->html .= $form;

    }

    public function post()
    {
        //Save the uploaded file in target directory
        $target_dir  = "upload/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType    = pathinfo($target_file, PATHINFO_EXTENSION);
        if (isset($_POST["submit"])) {

            //Remove spaces in filename before saving in  folder
            if (strpos($target_file," ")!=false){
                $target_file = str_replace(" ","",$target_file);
            }

            //Check for file type
            if ($fileType == 'csv') {

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    //Redirect to table page to display the HTML Table
                    header("Location: index.php?page=table&file=$target_file");
                } else {
                    $this->html .= "Sorry, there was an error uploading your file.";
                }

            } else {
                //Redirect to error page if the uploaded file is not a csv file

                header("Location: index.php?page=errorPage");

            }

        }

    }
}

?>

