
<?php
class homepage extends page
{

    public function get()
    {

        $form = '<form action="index.php" method="post"
        enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload File" name="submit">';
        $form .= '</form> ';
        $this->html .= '<h1>Upload File</h1>';
        $this->html .= $form;

    }

    public function post()
    {
        $target_dir  = "upload/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$uploadOk    = 1;
        $fileType    = pathinfo($target_file, PATHINFO_EXTENSION);
        if (isset($_POST["submit"])) {

            if ($fileType == 'csv') {
                //$uploadOK = 1;

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                    header("Location: index.php?page=table&file=$target_file");
                } else {
                    $this->html.= "Sorry, there was an error uploading your file.";
                }

            } else {

                //$uploadOk = 0;
                header("Location: index.php?page=errorPage");

            }

            //$uploadOk = 1;
        }

    }
}

?>

