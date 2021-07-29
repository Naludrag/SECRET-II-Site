<?php
/**
 * Get all the users from the home directory
 * Could be improved by adding LDAP connection
 * @return array return all the users found in the home directory
 */
function getUsers() {
    // Will contain all the users
    $result = [];
    // Go through the directory
    if ($handle = opendir('/home/EINET')) {
        while (false !== ($entry = readdir($handle))) {
            if($entry != "." && $entry != "..") {
                // The name of the directory is the name of the student
                $result[] = $entry;
            }
        }
        closedir($handle);
    }
    return $result;
}

/**
 * Create the zip file containing all the tests of the students
 * @param $path String that is the path to the tests
 * @param $users array that is the users from which the tests needs to be recovered
 * @return array that contains all the repository that were not found
 */
function createZipFile($path, $users){
    // If no path is given the default will be tests
    if ($path == null){
        $path = "tests";
    }
    $zip = new ZipArchive();
    // Will contain all the directories that were not found or a success message
    $directoryNotFound = [];
    // Will verify that the zip folder is created in the DOCUMENT_ROOT if not will create it
    $DelFilePath="class.zip";
    if ( !is_dir($_SERVER['DOCUMENT_ROOT'] . '/zip') ) {
        mkdir ($_SERVER['DOCUMENT_ROOT'] . '/zip', 0777, true);
    }
    // ***EDIT***
    // To modify if you want to save the zip elsewhere
    // By default, will be saved in the DOCUMENT ROOT of the server
    $zipPath = "./zip/".$DelFilePath;
    if(file_exists($zipPath)) {
        unlink ($zipPath);
    }
    // Verify that the zip can be created or overwritten
    if ($zip->open($zipPath, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE) != TRUE) {
        die ("Could not open archive");
    }
    // Will get all the files from the path specified by the user or by default tests
    foreach ($users as $username){
        // Get the complete path of the folder
        $completePath = "/home/EINET/".$username."/".$path."/";
        // Will catch the warning sent by the opendir if it has one
        set_error_handler("warning_handler", E_WARNING);
        if($dir = opendir($completePath)) {
            restore_error_handler();
            // Loop until there is no more files
            while ($file = readdir($dir)) {
                // Verify that it is a file
                if (is_file($completePath . $file)) {
                    // Add the file to the zip in the folder username
                    if($zip->addFile($completePath . $file, $username.'/'.$file)){

                    } else {
                        // If file was not added correctly add a message in the array
                        array_push($directoryNotFound ,"Failed to add file <b>$file</b>");
                    }
                }
            }
        }
        else{
            // If directory given is not found for the student add a message in the array
            array_push($directoryNotFound ,"Directory not found for student <b>$username</b>");
            restore_error_handler();
        }
    }
    $res = $zip->close();
    // close and save archive. If save went well show the zip to download. If not show an error message
    if($res){
	    array_push($directoryNotFound ,'The zip was created successfully please click to download <a href="'.$zipPath.'">'.$DelFilePath.'</a>');
    } else {
        array_push($directoryNotFound ,'The zip could not be created in the folder '.$zipPath);
    }
    return $directoryNotFound;
}

/**
 * Will catch the error for the opendir function
 * @param $errno int that is the number of the error
 * @param $errstr string that is the message of the error
 */
function warning_handler($errno, $errstr) {
  var_dump($errno);
  var_dump($errstr);
}

/**
 * Will send a file to the different students
 * @param $files array containing the information of the file that need to be loaded for the students
 * @param $users array containing all the info for the users
 * @return array that contains all the upload that failed or a message that all went well
 */
function send_files($files, $users){
    $directoryNotFound = [];
    $first = true;
    $pathToCopyFrom = "";
    // Go through all the users
    foreach ($users as $username){
        // Get the target directory
        $target_dir = "/home/EINET/".$username."/tests/";
        // Get the name of the file
        $file = $files['name'];
        // Get the path of the file
        $path = pathinfo($file);
        // Get multiple metadata from the path
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $files['tmp_name'];
        // The new path of the file
        $path_filename_ext = $target_dir.$filename.".".$ext;
        // If it is the first time copying the file it will be moved to the folder to then copy it to other folders
        // If not the file will by copied only at first try because after that the browser delete the file
        if ($first){
            $res2 = move_uploaded_file($temp_name,$path_filename_ext);
            if ($res2 == false){
                array_push($directoryNotFound, "Sorry, a problem was encoutered with the user <b>$username</b>");
            }
            // Get the path of the move
            $pathToCopyFrom = $path_filename_ext;
            $first = false;
        } else {
            // Copy the file for other folder of users
            $res1 = copy($pathToCopyFrom,$path_filename_ext);
            if ($res1 == false){
                array_push($directoryNotFound, "Sorry, a problem was encoutered with the user <b>$username</b>");
            }
        }
    }
    // If no errors were encountered send a success message
    if(count($directoryNotFound) == 0){
        array_push($directoryNotFound, "All the files were correctly sent!");
    }
    return $directoryNotFound;
}
