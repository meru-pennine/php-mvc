
<?php
// Check if there's a flash message in the session
if (isset($_SESSION['flash_message'])) {
    $flash = $_SESSION['flash_message'];

    // Set the Bootstrap alert class based on message type
    $alertClass = '';
    switch ($flash['type']) {
        case 'success':
            $alertClass = 'alert-success';
            break;
        case 'error':
            $alertClass = 'alert-danger';
            break;
        case 'warning':
            $alertClass = 'alert-warning';
            break;
        case 'info':
            $alertClass = 'alert-info';
            break;
        default:
            $alertClass = 'alert-secondary';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Book Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			      	<a class="navbar-brand" href="<?= BASE_URL ?>/">
			      		<img src="<?= BASE_URL ?>/assets/images/logo-1.png">
			      	</a>
			    </div>
			    <ul class="nav navbar-nav pull-right">
			      	<li class="active"><a href="<?= BASE_URL ?>/news/">News</a></li>
			      	<li class=""><a href="<?= BASE_URL ?>/news/top-headline/">Top Headlines</a></li>
			      	<li class=""><a href="<?= BASE_URL ?>/book/">Book</a></li>
			    </ul>
		  	</div>
		</nav>
	</header>
	<main>
	    <div class="container">

	    	 <?php
	    	 if (isset($_SESSION['flash_message'])) {
		    	// Display the flash message
			    echo "<div class='alert {$alertClass} alert-dismissible show' role='alert'>";
			    echo $flash['message'];
			    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
			    echo "<span aria-hidden='true'>&times;</span>";
			    echo "</button>";
			    echo "</div>";

			    // Clear the flash message after displaying it
			    unset($_SESSION['flash_message']);
			}
		       ?>
	    	<?= $content ?>
	    </div>
	</main>
</body>
</html>
