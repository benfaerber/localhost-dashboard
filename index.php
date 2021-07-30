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
      background-color: #2f3542;
      color: white;
      font-family: 'Fira Code', 'Courier New', Courier, monospace;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 80vh;
    }

    h1 {
      font-size: 40px;
      width: 270px;
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
      text-shadow: none;
      font-size: 20px;
    }

    a:hover {
      text-shadow: 0 0 5px #fff, 0 0 10px #fff; 
      font-size: 25px;
    }

    .ip {
      margin-top: 0px;
      font-size: 16px;
    }

    .fadeIn {
      animation: fadeInAnim 1s;
    }

    @keyframes fadeInAnim {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

  </style>
</head>

<body>
  <h1 id="header">Localhost</h1>
  <ul>
    <?php foreach ($dirs as $dir) { ?>
      <a href="<?= $dir ?>">
        <li><?= $dir ?></li>
      </a>
    <?php } ?>
  </ul>
  <script>
    const localIPAddress = `<?= exec('ipconfig getifaddr en0') ?>`;
    const header = document.querySelector('#header');
    const defaultText = header.innerHTML;

    const animate = () => {
      header.classList.add('fadeIn');
      setTimeout(() => header.classList.remove('fadeIn'), 1000);
    }

    header.addEventListener('mouseenter', () => {
      header.innerHTML = localIPAddress;
      animate();
    });

    header.addEventListener('mouseleave', () => {
      header.innerHTML = defaultText
      animate();
    });
  </script>

</body>
</html>
