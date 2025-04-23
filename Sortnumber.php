<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sort Numbers Ascending</title>
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">
</head>
<body>
  <?php
    $error     = '';
    $success   = '';
    $errorinfo = '';

    if (isset($_POST['submit'])) {
      $input      = $_POST['input'];
      $inputArray = explode(',', $input);

      $sorted = [];
      $invalids = [];

      foreach ($inputArray as $num) {
        $num = trim($num);
        if (is_numeric($num)) {
          $sorted[] = (float)$num; 
        } else {
          $invalids[] = $num;
        }
      }

      if (!empty($sorted)) {
        $n = count($sorted);
        for ($i = 0; $i < $n - 1; $i++) {
          for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($sorted[$j] > $sorted[$j+1]) {
              $tmp = $sorted[$j];
              $sorted[$j] = $sorted[$j+1];
              $sorted[$j+1] = $tmp;
            }
          }
        }
        $success = 'Sorted Number(s) ascending: ' . implode(', ', $sorted);
      } else {
        $error = 'No valid numbers provided.';
      }

      if ($invalids) {
        $errorinfo = 'Ignored (not numbers): ' . implode(', ', $invalids);
      }
    }
  ?>
  <div class="container text-center mt-5">
    <h1>Sort Numbers Ascending</h1>
    <form method="post" class="my-4">
      <input type="text" name="input"
             class="form-control"
             placeholder="e.g. 12,41,4,90,51"
             value="<?= htmlspecialchars($_POST['input'] ?? '') ?>">
      <button type="submit" name="submit"
              class="btn btn-primary mt-2">Submit</button>
    </form>

    <div class="status">
      <?php if ($error):     ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif ?>

      <?php if ($success):   ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif ?>

      <?php if ($errorinfo): ?>
        <div class="alert alert-info"><?= $errorinfo ?></div>
      <?php endif ?>
    </div>
  </div>
</body>
</html>
