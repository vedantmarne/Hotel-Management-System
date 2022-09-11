<?php
		
		include("connection.php");
		error_reporting(0);

		$query="SELECT * FROM room";
		$data=mysqli_query($conn,$query);

		$total=mysqli_num_rows($data);


		if($total!=0)
		{

			?>
			<table border="3">
				<tr>
				<th>room</th>
				<th>avail</th>
				<th>clean</th>
				<th>price</th>
				<th>bed</th>
			</tr>

			<?php

			while($result=mysqli_fetch_assoc($data))
			{

				echo "<tr>
				<td>".$result[room_number]."</td>
				<td>".$result[availability]."</td>
				<td>".$result[clean_status]."</td>
				<td>".$result[price]."</td>
				<td>".$result[bed_type]."</td>
				</tr>";
			}
		}	
		else
		{
				echo "No record found";
		}
	



?>

</table>