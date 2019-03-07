<?
header("Content-Type: text/plain");
$s=file("typing_lesson_converter.php");
echo implode('',$s);
?>