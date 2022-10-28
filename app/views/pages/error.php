
 <h1> 
 <?php
  echo "MyError";
  echo is_array($error) ?  '<p>' . implode('</p><p>', $error) . '</p>' : $error; ?>
 </h1>



