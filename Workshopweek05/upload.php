<?php
// Define upload folder and allowed file types
$uploadFolder = 'uploads/';
$maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
$allowedFormats = array('pdf', 'jpg', 'jpeg', 'png');

// Check if the uploads folder exists, if not, create it
if (!is_dir($uploadFolder)) {
    if (!mkdir($uploadFolder, 0755, true)) {
        die("Error: Unable to create uploads directory.");
    }
}

// Initialize message variable
$message = '';
$uploadSuccess = false;

// Check if a file was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['portfolioFile'])) {
    
    $file = $_FILES['portfolioFile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    
    // Check for upload errors
    if ($fileError !== UPLOAD_ERR_OK) {
        $message = "Error: File upload failed. Error code: " . $fileError;
    }
    // Check if file size exceeds limit
    else if ($fileSize > $maxFileSize) {
        $message = "Error: File size exceeds 2MB limit. Your file is " . round($fileSize / 1024 / 1024, 2) . "MB";
    }
    else {
        // Get file extension
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Check if file format is allowed
        if (!in_array($fileExtension, $allowedFormats)) {
            $message = "Error: Invalid file format. Only PDF, JPG, and PNG are allowed.";
        }
        else {
            // Create a unique filename using string functions
            $timestamp = time();
            $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
            $newFileName = 'portfolio_' . $timestamp . '_' . $randomString . '.' . $fileExtension;
            
            // Full path for the uploaded file
            $filePath = $uploadFolder . $newFileName;
            
            // Move the uploaded file to the uploads folder
            if (move_uploaded_file($fileTmpName, $filePath)) {
                $message = "Success: File uploaded successfully as '" . htmlspecialchars($newFileName) . "'";
                $uploadSuccess = true;
            }
            else {
                $message = "Error: Unable to save file. Please check folder permissions.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Portfolio File Upload</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .success { color: green; padding: 10px; background-color: #e8f5e9; border-radius: 5px; }
        .error { color: red; padding: 10px; background-color: #ffebee; border-radius: 5px; }
        form { margin-top: 20px; }
        input, button { padding: 8px; margin: 5px 0; }
        button { background-color: #4CAF50; color: white; cursor: pointer; border: none; border-radius: 4px; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Your Portfolio</h1>
        
        <?php if (!empty($message)): ?>
            <div class="<?php echo $uploadSuccess ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <label>Select File (PDF, JPG, PNG - Max 2MB):</label><br>
            <input type="file" name="portfolioFile" accept=".pdf,.jpg,.jpeg,.png" required>
            <br>
            <button type="submit">Upload File</button>
        </form>
    </div>
</body>
</html>
