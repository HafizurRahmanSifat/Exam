<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <?php
    $error = '';
    $success = '';
    $errorinfo = '';
    
    function factorial($n) {
        if (!is_int($n) || $n < 0) {return null;}
        if($n === 0) {return 1;};
        
        for($i = 2; $i <= $n; $i++) {
            static $factorial = 1;
            $factorial *= $i;
        }
        return $factorial;
    }

    if (isset($_POST['submit'])) {
        $input = (int) $_POST['input'];
            if ($result = factorial($input)) {
                $success = "Factorial of ".$input." is ".$result ."<br>";
            } else
                $error = "Only positive integers are allowed.";
    }


    ?>
    <div class="container text-center">
        <h1>Factorial </h1>
        <form action="" method="post" class="maxmin my-4">
            <input type="number" class="form-control" name="input" placeholder="ex: 12" value="<?= htmlspecialchars($_POST['input'] ?? '') ?>">
            <input class="btn btn-primary mt-2" type="submit" value="Submit" name="submit">
        </form>
        <div class="status">
            <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>
';
            }

            if (!empty($success)) {
                echo '<div class="alert alert-success" role="alert">' . $success . '</div>
';
            }

            if (!empty($errorinfo)) {
                echo '<div class="alert alert-info" role="alert">' . $errorinfo . '</div>
        ';
            }

            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>