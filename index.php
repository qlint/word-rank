
<?php
echo "<h3>Word Rank From One File</h3>";
$counted = strtolower(file_get_contents("docs/one.txt"));
$wordArray = preg_split('/[^a-z]/', $counted, -1, PREG_SPLIT_NO_EMPTY);
/* get associative array of values from $filteredArray as keys and their frequency count as value */
$wordFrequencyArray = array_count_values($wordArray);
 
/* Sort array from higher to lower, keeping keys */
arsort($wordFrequencyArray);
 
/* grab Top 100 - sorted */
$top10words = array_slice($wordFrequencyArray,0,100);
 
/* display them */
foreach ($top10words as $topWord => $frequency)
    echo "$topWord --  $frequency<br/>";
 
echo "<h3>Total From All Files</h3>";
$path = realpath('docs');
	$wordArrayTotal = [];
	foreach (glob($path.'/*.*') as $file) {
	    $counted = strtolower(file_get_contents($file));
	    $wordArray = preg_split('/[^a-z]/', $counted, -1, PREG_SPLIT_NO_EMPTY);
	    $wordArrayTotal = array_merge($wordArrayTotal, $wordArray);
	}

	$wordFrequencyArray = array_count_values($wordArrayTotal);

	/* Sort array from higher to lower, keeping keys */
	arsort($wordFrequencyArray);

	/* grab Top 10 - sorted */
	$top10words = array_slice($wordFrequencyArray, 0, 100);

	/* display them */
	foreach ($top10words as $topWord => $frequency) {
	    echo "$topWord --  $frequency<br/>";
	}

?>
