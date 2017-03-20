<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <?php foreach ($arrays as $key => $value) {?>
        <li><?php echo $value[] ?></li>
      <?php}?>
    </ul>
    <ul id="list_html">
      
    </ul>
    <script type="text/javascript" src="/public/js/api.js"></script>
  </body>
</html>
