<?php

$raw_dirs = scandir('./');
$dirs = [];
foreach ($raw_dirs as $dir) {
  if ($dir != '.' && $dir != '..' && is_dir('./' . $dir))
    array_push($dirs, $dir);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Localhost</title>

  <style>
    body {
      background-color: #3b4252;
      color: white;
      font-family: 'Fira Code', 'Courier New', Courier, monospace;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 250px;
    }

    h1 {
      font-size: 40px;
    }

    ul {
      text-align: left;
      list-style: none;
      line-height: 20px;
      font-size: 20px;
      width: 250px;
    }

    li {
      margin: 0 0 10px 0;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <h1>Localhost</h1>
  <ul>
    <?php foreach ($dirs as $dir) { ?>
      <a href="<?= $dir ?>">
        <li><?= $dir ?></li>
      </a>
    <?php } ?>
  </ul>

  <script>
    const as = document.getElementsByTagName('a');
    for (const a of as) {
      a.addEventListener('mouseenter', (e) => {
        a.style = 'text-shadow: 0 0 5px #fff, 0 0 10px #fff; font-size: 25px';
      })

      a.addEventListener('mouseleave', (e) => {
        a.style = 'text-shadow: none; font-size: 20px';
      })
    }
  </script>
</body>

</html>