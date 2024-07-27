<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="../sass/main/main.css">
</head>
<body class='' id="registration-page">
	
	<main class="">
		<div id="form-heading">
			<h1>Student Registration Form</h1>
		</div>
		<div id="form-container">
			<form action="">
				<div class="row">
					<fieldset>
						<legend>Student Name</legend>
						<section class="section-row">
							<label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" placeholder="first name" required>
						</section>
						<section class="section-row">
							<label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" placeholder="last name" required>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Father's Name</legend>
						<section class="section-row">
                            <label for="fatherFirstName">First Name:</label>
                            <input type="text" id="fatherFirstName" name="fatherFirstName" placeholder="first name" required>
                        </section>
						<section class="section-row">
                            <label for="fatherLastName">Last Name:</label>
                            <input type="text" id="fatherLastName" name="fatherLastName" placeholder="last name" required>
                        </section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Mother's Name</legend>
						<section class="section-row">
							<label for="motherFirstName">First Name:</label>
							<input type="text" name="motherFirstName" id="motherFirstName" placeholder="first name" required>
						</section>
						<section class="section-row">
							<label for="motherLastName">Last Name:</label>
                            <input type="text" name="motherLastName" id="motherLastName" placeholder="last name" required>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Address</legend>
						<section class="section-row">
							<section class="section-row">
								<label for="address">building/street:</label>
								<input type="text" id="address" name="address" placeholder="building/street">
							</section>
							<section class="section-row">
								<label for="pincode">Pincode:</label>
                                <input type="text" id="pincode" name="pincode" placeholder="PinCode" required>
							</section>
						</section>
						<section class="section-row">
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
						<section class="section-row">
							<label for="mobile">Mobile No.</label>
							<input type="text" name="mobile" id="mobile" placeholder="mobile no." required>
						</section>
                        <section class="section-row">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="email " >(optional)
                        </section>
                        <section class="section-row">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" placeholder="phone no " >(optional)
                        </section>
                    </fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Gender</legend>
						<section class="section-row">
							<label for="male">Male:</label>
							<input type="radio" id="male" name="gender" value="male" required>
						</section>
						<section class="section-row">
							<label for="female">Female</label>
							<input type="radio" name="gender" id="female" value="female" required>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Date Of Birth</legend>
						<section class="section-row">
							<input type="date" name="dob" id="dob" required>
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Class</legend>
						<select name="class" id="class">
							<option value="" selected disabled>Select Class</option>
						</select>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Extra Activity</legend>
						<section class="section-row">
							<input type="checkbox" name="cricket" id="cricket" value=""> : Cricket
							<input type="checkbox" name="football" id="football" value=""> : Football
							<input type="checkbox" name="basketball" id="basketball" value=""> : Basketball
							<input type="checkbox" name="swimming" id="swimming" value=""> : swimming
						</section>
					</fieldset>
				</div>
				<div class="row">
					<fieldset>
						<legend>Password</legend>
						<section class="section-row">
							<label for="enter">Enter:</label>
							<input type="password" id="enter" name="enter" required>
						</section>
						<section class="section-row">
							<label for="confirm">Confirm:</label>
                            <input type="password" id="confirm" name="confirm" required>
						</section>
					</fieldset>
				</div>
			</form>
		</div>
	</main>
</body>
</html>