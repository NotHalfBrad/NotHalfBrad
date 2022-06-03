<?php
	session_start();

	if ( !empty( $_POST ) ) {
	    if ( isset( $_POST['password'] ) ) {
	        // Getting submitted user data from database
	        /*$brad = 'brad';
	        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	        $conn = new mysqli("localhost","bluesfa1",'"Sams0nT0by"',"bluesfa1_NHB");
	        if(! $conn ) {
	            die('Could not connect: ' . mysqli_error());
	        }

	        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
			$stmt->bind_param('s', $brad);
			$stmt->execute();
			$user = $stmt->get_result()->fetch_all();

	        echo $user;
	        echo $user->ID;
	    		
			echo "num results: ".mysqli_num_rows($user);*/

	    	// Verify user password and set $_SESSION
	    	//if ( password_verify( $_POST['password'], $user->password ) ) {
	        if ( $_POST['password'] == "samson" ) {
	    		$_SESSION['user_id'] = "0";
	    		header('Location: http://www.nothalfbrad.com/admin.php');
	    	}
	    	//else
	    	//	echo "wrong pass<br>";

	    	//mysqli_close($conn);
	    }
	}
	
	include './layout/header.php';
?>

Login page<br>

	<form action="login.php" method="post">
	    <input type="password" name="password" placeholder="Enter your password" required>
	    <input type="submit" value="Submit">
	</form>

<?php
    include './layout/footer.php';
?>
