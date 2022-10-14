<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link rel="stylesheet" href= <?=_URL."/src/public/css/style.css"?>>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
  </head>

  <body class="container-fluid">
        <div class="container">
            <header>
                <div style=" display: flex; align-items: flex-end;" >
                    <a href="<?= $_SERVER['PHP_SELF'] ?>"> <img style="height: 150px; width: 150px; " src="..\resource\logo.png"></img></a>
                    
                        <a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=admin" role="button">Адмінка</a>
                        <a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=news" role="button">Новина</a>  
                        <a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=about" role="button">Про нас</a>  
                </div> 
               
                <div style="height: 5px; background-color: red; "> </div>
             </header>

             <?php
                       // echo 'It\'s work ';
                       // echo 'test2';
                ?>
              <div>             
                <?php require_once VIEWS_PATH."/pages/{$page}.php"; ?>
              </div> 
             
        </div>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src= <?=_URL."/js/js.js"?>></script>

</html>