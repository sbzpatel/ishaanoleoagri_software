<!DOCTYPE html>
<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
Enter emails seperated by comma: <input type="mail" name="mail" multiple>
<input type="submit">
</form>
</body>
</html>
<?php

if(isset($_POST['mail']))
{
$t = $_POST['mail'];
$arra=explode(",",$t);  
for($i=0;$i<count($arra);++$i)
   {echo $arra[$i];
    echo"<br>";
   }
}
?>
