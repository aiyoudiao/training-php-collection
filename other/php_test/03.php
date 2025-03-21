<html>

<body>
  <h1>我的第一张 PHP 页面</h1>
  <?php
    for($i = 1; $i < 5; $i++) {
      echo '<h'.$i.'>'.($i).'Hello World!</h'.$i.'>';
    }
  ?>
</body>

</html>
