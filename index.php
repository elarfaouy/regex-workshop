<?php

if (isset($_POST['save'])) {
    $titleError = $phoneError = $mailError = null;

    $titlePattern = "//";
    $phonePattern = "//";
    $mailPattern = "//";

    if (!preg_match($titlePattern, $_POST['title']))
        $titleError = "invalid title";

    if (!preg_match($phonePattern, $_POST['phone']))
        $phoneError = "invalid phone";

    if (!preg_match($mailPattern, $_POST['mail']))
        $mailError = "invalid mail";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REG-EX</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .text-danger {
            color: red;
        }
    </style>
</head>
<body>
<h1>Simple Form</h1>
<form action="" method="POST">
    <div>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $_POST['title'] ?? "" ?>"/>
            <i style="color: <?= isset($titleError) ? "red" : "green" ?>" class="fa-solid fa-circle-check"></i>
            <p class="text-danger">
                <?php isset($titleError) && print($titleError); ?>
            </p>
        </div>
        <div>
            <label for="phone">Telephone</label>
            <input type="text" name="phone" id="phone" value="<?= $_POST['phone'] ?? "" ?>"/>
            <i style="color: <?= isset($phoneError) ? "red" : "green" ?>" class="fa-solid fa-circle-check"></i>
            <p class="text-danger">
                <?php isset($phoneError) && print($phoneError); ?>
            </p>
        </div>
        <div>
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail" value="<?= $_POST['mail'] ?? "" ?>"/>
            <i style="color: <?= isset($mailError) ? "red" : "green" ?>" class="fa-solid fa-circle-check"></i>
            <p class="text-danger">
                <?php isset($mailError) && print($mailError); ?>
            </p>
        </div>
    </div>
    <div>
        <button type="submit" name="save">Save</button>
    </div>
</form>
</body>
</html>
