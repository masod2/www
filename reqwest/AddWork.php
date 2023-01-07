<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./src/css/main.css" rel="stylesheet" type="text/css">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="src/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/css/util.css">
	<link rel="stylesheet" type="text/css" href="src/css/main.css">
	<!--===============================================================================================-->

</head>

<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-11.png" alt="IMG">
			</div>

			<form action="postWork.php" method="POST" class="contact1-form validate-form" enctype="multipart/form-data"
				id="my-form">
				<span class="contact1-form-title">
					puplish your work
				</span>

				<div class="wrap-input1 validate-input" data-validate="Name is required">
					<input class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate="Subject is
						required">
					<input class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate="details is
						required">
					<textarea class="input1" name="details" placeholder="details"></textarea>
					<span class="shadow-input1"></span>
				</div>
				<div class="multiple-uploader" id="multiple-uploader">
					<div class="mup-msg">
						<span class="mup-main-msg">click to upload images.</span>
						<span class="mup-msg" id="max-upload-number">Upload up to 10 images</span>
						<span class="mup-msg">Only images, pdf and psd files are allowed for
							upload</span>
					</div>
				</div>
				<div class="container-contact1-form-btn">
					<button type="submit" name="submit"  value="UPLOAD" class="contact1-form-btn">
						<span>
							conferm and send
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="./src/js/multiple-uploader.js"></script>
	<script>

		let multipleUploader = new MultipleUploader('#multiple-uploader').init({
			maxUpload: 20, // maximum number of uploaded images
			maxSize: 2, // in size in mb
			filesInpName: 'images', // input name sent to backend
			formSelector: '#my-form', // form selector
		});

	</script>
</body>

</html>