
<?php
session_start();

include("db.php");

?>
<!DOCTYPE html>
<?php
	//Store Data input into variables
	$emailtxt = $_POST["emailtxt"];
	$projectID = $_POST["projectID"];
    $content = $_POST["content"];
	
    // Query String
    $query = "INSERT INTO `comment` (`projectID`,`userEmail`, `content`) VALUES ($projectID,'$emailtxt','$content')";	
    
    
    $success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
 ?>
 
     <form method="POST" action="comment.php" id="BackToCommentForm">
		<input type="hidden" name="projectID" value=<?php echo "$projectID" ?>/>
	</form>
		
	<script language='javascript'>;
        alert('Comment added');
        document.getElementById("BackToCommentForm").submit();
	</script>