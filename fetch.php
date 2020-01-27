<div class="row" style="height: 500px; overflow: scroll;">
<?php
include 'Database/db.php';
if(isset($_POST["query"])){
	$search = mysqli_real_escape_string($link, $_POST["query"]);
	$query = "SELECT * FROM Lawyer 
	WHERE firstname LIKE '%".$search."%' OR lastname LIKE '%".$search."%'  OR region LIKE '%".$search."%'  OR email LIKE '%".$search."%' OR status LIKE '%".$search."%' ";
}else{
	$query = "SELECT * FROM Lawyer ORDER BY lawyer_id";
}
$result = mysqli_query($link, $query)or die(mysqli_error($link));
	while($row = mysqli_fetch_array($result)){

?>
	
	<div class="col-md-3">
	<div class="card" style="height: 250px;">
	<img style="height: 250px;" class="img img-thumbnail" src="lawyers/<?php echo $row ['image_link'];?>">
	</div>
	<br/> 
	<div class="text-center">
	<span style="text-transform: capitalize;font-weight: 500;" ><?php echo $row ['firstname'];?>  <?php echo $row ['lastname'];?><br/> Location: <?php echo $row ['region'];?> <br/> Expert: <?php echo $row ['status'];?>
	</span> <br/>
	<span style="letter-spacing: 1px;font-size: 10px;font-weight: 600;"> Mail: <a href="mailto:<?php echo $row ['email'];?>"><?php echo $row ['email'];?></a>
	</span>
	</div>

	<!-- Form Begins here -->
	<form method="POST" action="private_consultation.php" style="text-align: justify;color: black;text-align: center;font-size: 20px;">
	<input type="hidden" class="contacts" name="lawyerid" value="<?php echo $row ['lawyer_id'];?>"/>
	<button type="submit" name="contact" class="btn btn-primary" style="width: 200px;">Chat with Lawyer</button>

	</form>
	<br/><br/>
	<!-- Form Ends here -->
	
	
	</div>

	<?php } ?>
</div>