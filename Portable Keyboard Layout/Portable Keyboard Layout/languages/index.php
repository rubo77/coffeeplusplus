<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Eastcoast Laboratories</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Michael Schleicher, michael@schleicher-farm.com">
<meta name="publisher" content="Michael Schleicher, michael@schleicher-farm.com">
<meta name="copyright" content="Michael Schleicher, michael@schleicher-farm.com">
<meta http-equiv="language" content="en,de">
<meta name="robots" content="all">
<meta name="robots" content="follow">
<meta name="description" content="H19-Produktion: von Vinyl bis CD, von Super8 bis DVD - kreative Inhalte für multimediale Projekte, Präsentationen und Anwendungen">
<meta name="keywords" content="DVD-Produktion, Tonstudio, Web-Design, Label, multimedia, mastering, jazz, musik, label code, video schnitt, videoschnitt, vervielfältigung, audio, catering, produktion, sound, mix, recording, booking, live konzert, kiel, norddeutschland">
<meta name="page-topic" content="tonstudio, dvd, multimedia">
<style type="text/css">
<!--
.fliess, body,td,tr,table,p,span,div{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFCC;
}
.fliessLink {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFCC;
    text-decoration: none;
}
.fliessLink:hover {
    text-decoration: underline;
}
-->
</style>
  
</head>

<body bgcolor="darkblue" background="Bilder/index_07.gif" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFFCC">
W&auml;hle eine datei aus mit dem rechten Mausknopf und dann "speichern unter"<p><p></p></p>
<?php
$DirPath=$_GET['DirPath'];
if($DirPath=="")
{
    $DirPath='./';
}
if (($handle=opendir($DirPath)))
{
    while ($node = readdir($handle))
    {
        $nodebase = basename($node);
        if ($nodebase!="." && $nodebase!="..")
        {
            if(is_dir($DirPath.$node))
            {
                $nPath=$DirPath.$node."/";
                echo "-> -> -> <a href='index.php?DirPath=$nPath'>$node</a><br>";
            }
            else if(!preg_match("/^\./",$node) and !preg_match("/^index\./",$node))
            {
                echo "<a href='$node'>$node</a> ".round(filesize($node)/1000).' KB<br>';
		
            }
        }
    }
}

?>
</body>
</html>
