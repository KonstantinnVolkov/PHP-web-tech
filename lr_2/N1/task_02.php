<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>task_2</title>
</head>
<body>
<form method="get" action="">
    <input type="text" name="amount" id="amount" placeholder="Enter amount of rows">
</form>
<table>
        <?php
            $amount = (int) $_GET['amount'];
            for ($i = 0; $i < $amount; $i++){
                echo "<tr><th>$i</th></tr></tr>";
            }
        ?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</body>
</html>