<!doctype html>
<html>
<head>
<title>legitk(s)i</title>
<meta charset="utf-8" />
</head>
<body>
<a href="legitksi.php">generuj!</a>
<hr />
Będę generował następujące legitk(s)i [z pliku <b>ludzie.txt</b>]:<br /><ul>
<?php 
$handle = fopen("config/ludzie.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		echo "<li>$line</li>";
	}
    fclose($handle);
}?>
</ul>
Z następującym terminem ważności [z pliku <b>data.txt</b>]: <?php echo "ważna do <b>".file_get_contents("config/data.txt")."</b>"; ?>
</body></html>