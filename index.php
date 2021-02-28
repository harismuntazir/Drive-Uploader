<?php
ini_set('memory_limit', '256M');
require_once "connect.php";

$login = $client->createAuthUrl();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page Google Connect</title>
</head>
<body>

<?php
    if(!@$_SESSION['access_token']) {
        header("location:$login");
    }
    else {
        //set access token otherwise you will be pissed off
        $client->setAccessToken($_SESSION['access_token']);
        //start the service
        $service = new Google_Service_Drive($client);


        $fileName    = 'Form No. 234.pdf'; // file.mp4;

    //This is the destination folder for Google Drive
        $parentId   = '1Err_0koHMQYu7eEv-EcHa2ugGfaLqxgr';


        if ( !empty($fileName) ) {

            //Connect to your account's Drive
            $file = new Google_Service_Drive_DriveFile();
            //Defines file name
            $file->setName($fileName);

            //Define Destination Directory there in Google Drive
            $file->setParents(array($parentId));

            //Creates the file on GDrive
            $data = file_get_contents("http://egov.uok.edu.in/CollegeAdm/AdmDetails/showreports.aspx?rrid=20161&courseyear=1&UID=234&reportid=101");

            $createdFile = $service->files->create($file, array(
                'data' => $data,
                'mimeType' => 'application/pdf',
                'uploadType' => 'multipart'
            ));
            echo "File Upload To Google Drive";
        }
    }
?>


</body>
</html>
