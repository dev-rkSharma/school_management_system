<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="../sass/main/main.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class='' id="registration-page">

	<main class="">
		<div id="form-heading">
			<h1>Student Registration Form</h1>
		</div>
		<div id="form-container">
			<form action="" id="registrationForm">
				<div class="row">
					<fieldset>
						<legend>Student Name</legend>
						<section class="section-row">
							<label for="firstName">First Name:</label>
							<input type="text" id="firstName" name="firstName" placeholder="first name">
						</section>
						<section class="section-row">
							<label for="lastName">Last Name:</label>
							<input type="text" id="lastName" name="lastName" placeholder="last name">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Father's Name</legend>
						<section class="section-row">
							<label for="fatherFirstName">First Name:</label>
							<input type="text" id="fatherFirstName" name="fatherFirstName" placeholder="first name">
						</section>
						<section class="section-row">
							<label for="fatherLastName">Last Name:</label>
							<input type="text" id="fatherLastName" name="fatherLastName" placeholder="last name">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Mother's Name</legend>
						<section class="section-row">
							<label for="motherFirstName">First Name:</label>
							<input type="text" name="motherFirstName" id="motherFirstName" placeholder="first name">
						</section>
						<section class="section-row">
							<label for="motherLastName">Last Name:</label>
							<input type="text" name="motherLastName" id="motherLastName" placeholder="last name">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset class="address-bar">
						<legend>Address</legend>
						<section class="section-row-address">
							<section class="section-row">
								<label for="address">building/street:</label>
								<input type="text" id="address" name="address" placeholder="building/street">
							</section>
							<section class="section-row">
								<label for="pincode">Pincode:</label>
								<input type="text" id="pincode" name="pincode" placeholder="PinCode">
							</section>
						</section>
						<section class="section-address--row2">
							<section class="section-inner-row">
								<select name="country" id="country">
									<option value="" selected disabled>Select Country</option>
								</select>
							</section>
							<section class="section-inner-row">
								<select name="state" id="state">
									<option value="" selected disabled>Select State</option>
								</select>
							</section>
							<section class="section-inner-row">
								<select name="city" id="city">
									<option value="" selected disabled>Select City</option>
								</select>
							</section>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Contact Information</legend>
						<section class="section-row-contact">
							<label for="mobile">Mobile No.</label>
							<input type="tel" name="mobile" id="mobile" placeholder="mobile no." maxlength="10">
						</section>
						<section class="section-row-contact">
							<label for="email">Email:</label>
							<input type="email" id="email" name="email" placeholder="email ">
						</section>
						<section class="section-row-contact">
							<label for="phone">Phone:</label>
							<input type="tel" id="phone" name="phone" placeholder="phone no " maxlength="10">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset class="gender">
						<legend>Gender</legend>
						<section class="section-row-gender">
							<label for="male">Male:</label>
							<input type="radio" id="male" name="gender" value="m">
						</section>
						<section class="section-row-gender">
							<label for="female">Female:</label>
							<input type="radio" name="gender" id="female" value="f">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Date Of Birth</legend>
						<section class="section-row-birth">
							<input type="date" name="dob" id="dob">
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset class='class'>
						<legend>Class</legend>
						<select name="class" id="class">
							<option value="" selected disabled>Select Class</option>
						</select>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Extra Activity</legend>
						<section class="section-row-activity">
							<label for='cricket'>Cricket
								<input type="checkbox" name="activity" id="cricket" value="">
							</label>
							<label for='cricket'>basketball
								<input type="checkbox" name="activity" id="basketball" value="">
							</label>
							<label for='cricket'>football
								<input type="checkbox" name="activity" id="football" value="">
							</label>
							<label for='cricket'>swimming
								<input type="checkbox" name="activity" id="swimming" value="">
							</label>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Password</legend>
						<section class="section-row">
							<label for="enter">Enter:</label>
							<input type="password" id="enter" name="enter" placeholder='password'>
						</section>
						<section class="section-row">
							<label for="confirm">Confirm:</label>
							<input type="password" id="confirm" name="confirm" placeholder='confirm password'>
						</section>
					</fieldset>
				</div>
				<div class='row-button'>
					<button type="button">Submit</button>
				</div>
			</form>
		</div>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../scripts/registration_form_validation.js"></script>
</body>


</html>