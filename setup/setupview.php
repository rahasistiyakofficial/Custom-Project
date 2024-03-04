<!-- setupview.php -->

<html>
<head>
    <title>Setup</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once __DIR__ . '/KeyChecker.php';
if (KeyChecker::isValid()) {
    header('Location: ../public');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appKey = $_POST['app_key'];


    require_once __DIR__ . '/KeyChecker.php';

    $apiResponse = KeyChecker::isApiValid($appKey);

    if ($apiResponse['success']) {
        header('Location: /');
        exit;
    } else {
        echo '<p>Error: ' . $apiResponse['error_message'] . '</p>';
    }
}

?>

<div class="container py-5">
    <h2>Custom Project - Rahas Istiyak</h2>
    <h2>Enter : 1234</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="app_key">Enter APP_KEY:</label>
            <input type="text" class="form-control" id="app_key" name="app_key" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>
