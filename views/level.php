<?php include_once "../utils/level.validator.php" ?>
<?php include_once "../controllers/level.controller.php" ?>

<?php
$level = get_levels($_SESSION['level_id']);

if($_POST){
    print_r($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="level.php", method="post">
        <input class="btn-pista" type="submit" value="Pista" name="pista">
    </form>

</body>
</html>