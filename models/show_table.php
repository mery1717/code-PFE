<?php
	include('connect.php');
	if (isset($_POST['show'])) {
		?>
		<div>
			<table border="1">
				<thead>
          <th>Fournisseur</th>
          <th>Contact</th>
          <th>Adresse</th>
          <th>Action</th>
				</thead>
				<tbody>
					<?php
					$query=mysqli_query($conn,"select * from fournisseurs") or die(mysqli_error());
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['nomFournisseur']; ?></td>
							<td><?php echo $row['contactFournisseur']; ?></td>
							<td><?php echo $row['adresseFournisseur']; ?></td>
							<td><button type="button" value="<?php echo $row['idFournisseur']; ?>" class="delete">Delete</button></td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
		</div>
	}
