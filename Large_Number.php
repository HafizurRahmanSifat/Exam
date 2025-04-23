<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Large Number</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php  
    error_reporting(0);
    $error = '';
    $success = '';
    $errorinfo = '';
    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        $inputArray = explode(',',$input);
        $large = '';
        foreach($inputArray as $num) {
            if (is_numeric($num)) {
                $large = trim($num);
                $large > $num ? $large : $large = $num;              
            } else {
                $NN[] = $num;
                $errorinfo = 'Only Numbers are allowed. Not numbers: '. implode(',',$NN);
            }
        }
        if(!empty($large)) {
        $success = 'Largest Number is '.$large;
        }
    }
    ?>
    <div class="container text-center">
    <h1>Max min</h1>
    <form action="" method="post" class="maxmin mb-2">
    <input type="text" name="input" placeholder="ex: 12,41,4,90,51..."> <br>
    <input class="mt-2" type="submit" value="Submit" name="submit">
    </form>
    <div class="status">
        <?php
        if(!empty($error)){
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>
';
exit();
}

if(!empty($success)){
    echo '<div class="alert alert-success" role="alert">'.$success.'</div>
';
        } 

        if(!empty($errorinfo)){
            echo '<div class="alert alert-info" role="alert">'.$errorinfo.'</div>
        ';
                }

        ?>
    </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>