<?php
    include(config.php);
    include(main.php);
    session_start();

    $sql = "SELECT * FROM Marks WHERE Marks.UTORid = '$myutorid'";
    //Check connection
    $query = mysqli_query($conn, $sql);

    if (!$query) {
	    die ('SQL Error: ' . mysqli_error($conn));
    }

	$no = 1;
    $total 	= 0;
    while ($row = mysqli_fetch_array($query)){
		$amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
		echo '<tr>
		<td>'.$quiz1.'</td>
		<td>'.$quiz2.'</td>
		<td>'.$quiz3.'</td>
		<td>'.$midterm. '</td>
        <td>'.$assignment1.'</td>
        <td>'.$assignment2. '</td>
        <td>'.$assignment3. '</td>
        <td>'.$final. '</td>
		</tr>';
		$total += $row['amount'];
		$no++;
	}
?>