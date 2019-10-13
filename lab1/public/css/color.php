<?php
header("content-type:text/css");
$a = rand(0, 255);
$b = rand(0, 255);
$c = rand(0, 255);
$rgb = "rgb($a,$b,$c)";

?>

body{
background-color: <?php echo ($rgb) ?>;
}