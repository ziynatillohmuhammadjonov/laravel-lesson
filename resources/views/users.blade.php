<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users route</title>
</head>

<body>
    <h1>Users routeri</h1>
    <?php
// echo '<h1>User id: '.$id.'</h1>';
// echo '<h1>User name: '.$name.'</h1>';
    ?>
    <form action="<?php echo route('store')?>" method="POST">

        <?php echo csrf_field();?>
        <label for="name">Ismingizni kiriting: </label><br>
        <input type="text" name="name" id="name"><br>
        <label for="sername">Familiyangizni kiriting: </label><br>
        <input type="text" name="sername" id="sername"><br>
        <button type="submit">Yuborish.</button>

    </form>
</body>

</html>