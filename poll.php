<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h3>Thanks for participating!</h3>
<?php
<table>
<tr>
<td>The Kingdom of Back - Marie Lu</td>
<td><img src="lcbc-champs.github.io/Book Covers/15.jpg"
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>93%
</td>
</tr>
<tr>
<td>Educated - Tara Westover</td>
<td><img src="lcbc-champs.github.io/Book Covers/edu.jpg"
width='<?php echo(100*round($no/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>7%
</td>
</tr>
</table>
?>
