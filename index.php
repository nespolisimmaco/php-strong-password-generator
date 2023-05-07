<?php
$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#+-_.?!";

if (isset($_GET['password-length'])) {
    $pass_length = $_GET['password-length'];
    $new_password = generatePassword($pass_length, $characters);
}

// Generate password
function generatePassword($length, $characters_string)
{
    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $symbol = substr($characters_string, rand(0, strlen($characters_string) - 1), 1);
        $password .= $symbol;
    }
    return $password;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- Container -->
    <div class="container">
        <!-- Show generated password or error -->
        <?php if (isset($new_password)) { ?>
            <div class="alert alert-<?php echo $_GET['password-length'] !== "" ? 'success' : 'danger'; ?>" role="alert">
                <?php
                if ($_GET['password-length'] !== "") {
                    echo 'La tua password è: ' . $new_password;
                } else {
                    echo "ERRORE!!! Inserire la lunghezza";
                }
                ?>
            </div>
        <?php } ?>
        <!-- End Show generated password or error -->

        <!-- Form -->
        <form action="index.php" method="GET">
            <label for="length">Lunghezza password</label>
            <input type="number" id="length" name="password-length">
            <!-- Buttons -->
            <div class="buttons">
                <button class="btn btn-primary" type="submit">Invia</button>
                <button class="btn btn-secondary" type="reset">Annulla</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Container -->
</body>

</html>