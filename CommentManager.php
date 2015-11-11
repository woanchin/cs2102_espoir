
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
    $commentID = $_POST["commentID"];
	
    // Query String for edit comment
    if($commentID != -1 ){
        $query = "UPDATE comment SET content = '$content' WHERE commentID = '$commentID'";

    } else{ // Query String for new comment
 
        $query = "INSERT INTO comment (projectID,userEmail,content) VALUES ('$projectID','$emailtxt','$content')";	
    }
    
    
    $success= mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
    // Execute Query					
 ?>
 
     <form method="POST" action="comment.php" id="BackToCommentForm">
		<input type="hidden" name="projectID" value=<?php echo "$projectID" ?>/>
	</form>
		
	<script language='javascript'>;
        alert('Comment added/updated');
        document.getElementById("BackToCommentForm").submit();
	</script>