<?php 

session_start();

	if(!isset($_SESSION['userLogin'])){
		header("Location: login.php");
	}


	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Logout: login.php");
	}
	

?>

<?php include '../internetnoma/mainpagestyles/headernav.php'?>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">MLTA</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Welcome to our landing page, to see about us click button bellow</h2>
                        <a class="btn btn-primary" href="aboutus.html">Get Started</a>
                    </div>
                </div>
            </div>
        </header>



<?php include '../internetnoma/mainpagestyles/footerindex.php'?>
