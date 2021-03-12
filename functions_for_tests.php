<?php
/**
 * Get all the users from the passwd file
 * @return array return all the users found in the passwd file
 */
function getUsers() {
    // Array that will contain all the users found in the file
    $result = [];
    $keys = ['name', 'passwd', 'uid', 'gid', 'gecos', 'dir', 'shell'];
    // Opens the tuple with the file
    $handle = fopen('/etc/passwd', 'r');
    if (!$handle) {
        throw new RuntimeException("failed to open /etc/passwd for reading! " . print_r(error_get_last(), true));
    }
    // Will check for users above 1000 because that is the uid from which new users are created
    while (($values = fgetcsv($handle, 1000, ':')) !== false) {
        if ($values[2] > 1001) {
            $result[] = array_combine($keys, $values);
        }
    }
    fclose($handle);
    return $result;
}

/**
 * Create the zip file containing all the tests of the students
 * @param $path String that is the path to the tests
 * @param $users array that is the users form which the tests needs to be recovered
 * @return array that contains all the repository that were not found
 */
function createZipFile($path, $users){
    $zip = new ZipArchive();

    $directoryNotFound = [];

    $DelFilePath="first.zip";
    if ( !readdir($_SERVER['DOCUMENT_ROOT'] . '/zip') ) {
        mkdir ($_SERVER['DOCUMENT_ROOT'] . '/zip', 0777, true);
    }
    // ***EDIT***
    // To modify if you want to save the zip elsewhere
    $zipPath = "./zip/".$DelFilePath;
    var_dump(file_exists($zipPath));
    if(file_exists($zipPath)) {
        unlink ($zipPath);
    }
    if ($zip->open($zipPath, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE) != TRUE) {
        die ("Could not open archive");
    }
    foreach ($users as $username){
        $completePath = "/home/".$username."/".$path."/";
        // Will catch the warning sent by the opendir if it has one
        set_error_handler("warning_handler", E_WARNING);
        if($dir = opendir($completePath)) {
            restore_error_handler();
            while ($file = readdir($dir)) {
                if (is_file($completePath . $file)) {
                    if($zip->addFile($completePath . $file, $username.'/'.$file)){
                    
                    } else {
                        array_push($directoryNotFound ,"Failed to add file");
                    }
                }
            }
        }
        else{
            array_push($directoryNotFound ,"Directory not found for student <b>$username</b>");
            restore_error_handler();
        }
    }
    var_dump($zip);
    $res = $zip->close();
    var_dump($res);
    // close and save archive
    if($res){
	array_push($directoryNotFound ,'The zip was created successfully please click to download <a href="'.$zipPath.'">'.$DelFilePath.'</a>');
    } else {
        array_push($directoryNotFound ,'The zip could not be created in the folder '.$zipPath);
    }
    return $directoryNotFound;
}

function warning_handler($errno, $errstr) {
// do something
}
?>
