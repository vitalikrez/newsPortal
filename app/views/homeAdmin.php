<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL . "/css/style.css" ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>

  <title>Адмінка</title>
</head>

<h1> <?= "Main ADMIN Page" ?> </h1>
<a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=home" role="button">Головна</a>
<!-- <a class="btn btn-primary" href="<?= '' // $_SERVER['PHP_SELF']
                                      ?>?action=listPosts" role="button">Мої пости</a> -->
<div style="display: flex;">
  <?php foreach ($posts as $val) : ?>
    <div style="flex-direction: row; margin-left: 0.5em; margin-right: 0.5em;">

      <a style="color: black; text-decoration: none;" href="<?= $_SERVER['PHP_SELF'] ?>">
        <h4 class="titlePost">
          <?= $val["title"] ?>
          <br>
          <span>Posted: <?= $val['date_posted'] ?></span>
          <span>Updated: <?= $val['date_updated'] ?></span>
          </h2>
          <!-- Якщо задати фіксовану ширину стиль знизу замінить функцію з php -->
          <p style="
      overflow: hidden; 
      white-space: nowrap;
      text-overflow: ellipsis;">
            <?= strlen($val['content']) > 30 ? substr($val['content'], 0, 40) . "..." : $val['content'] ?>
          </p>
      </a>
      <a class="btn btn-secondary">Видалити</a>
    </div>
  <?php endforeach ?>
</div>
</body>

</html>