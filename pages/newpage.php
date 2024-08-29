<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../sass/main/main.css">
</head>

<body id='student-registration-form-page'>
    
	<!-- <div class="form-container"> -->
		<div class="registration-form-heading">
			<h1>Student Registration form</h1>
		</div>
		<form action="" id='registration-form' method="post">
			<!-- student  -->
			<div class="form-group">
				<section>
					<label for="name">
						Name
					</label>
					<input type="text" name="name" id="name" placeholder="Full Name">
				</section>
				<span id="nameError" class="error">
					<p>name is required </p>
				</span>
			</div>

			<!-- Fathers  -->
			 <div class="form-group">
				<section>
					<label for="father-name">
						Father's Name
					</label>
					<input type="text" name="father-name" id="father-name" placeholder="Full Name">
				</section>
				<span id="fatherNameError" class="error">
					<p>
						father's name is required
					</p>
				</span>
			</div> 

			<!-- Mother -->
			<div class="form-group">
				<section>
					<label for="mother-name">
						Mother's Name
					</label>
					<input type="text" name="mother-name" id="mother-name" placeholder="Full Name">
				</section>
				<span id="motherNameError" class="error">
					<p>
						mother's name is required
					</p>
				</span>
			</div>

			<!-- contact -->
			<div class="form-group">
				<section>
					<label >
						Contact
					</label>
					<section class="mobile">
						<input type="tel" name="mobile1" id="mobile1" placeholder="91+" maxlength='10'>
						<input type="tel" name="mobile2" id="mobile2" placeholder="91+" maxlength='10'>
					</section>
				</section>
				<span class="error" id='mobile'>
					<p>
						al least one
					</p>
				</span>
			</div>

			<!-- email -->
			<div class="form-group">
				<section>
					<label for="email">
						Email
					</label>
					<input type="email" name="email" id="email" placeholder="email">
				</section>
				<span id="mail" class="error">
					<p>
						email is required
					</p>
				</span>
			</div>

			<!-- gender -->
			<div class="form-group">
				<section>
					<label >
						Gender
					</label>
					<section class="gender">
						<input type="radio" name="gender" value="m"> Male
						<input type="radio" name="gender" value="f"> Female
					</section>
				</section>
				<span id="genderError" class="error">
					<p>
						are you male or female?
					</p>
				</span>
			</div>

			<!-- class -->
			<div class="form-group">
				<section>
					<label for="class">
						Class
					</label>
					<select name="class" id="class">
						<option value="" disabled selected>-- Select Class --</option>
						
					</select>
				</section>
				<span id="" class="error">
					<p>
						class is required
					</p>
				</span>
			</div>

			<!-- date of birth -->
			<div class="form-group">
				<section>
					<label for="dob">
						Date of Birth
					</label>
					<input type="date" name="dob" id="dob">
				</section>
				<span id="dateError" class="error">
					<p>
						date of birth is required
					</p>
				</span>
			</div>

			<!-- address -->
			<div class="form-group">
				<section>
					<label for="address">
						Address
					</label>
					<textarea name="address" id="address" placeholder="address" row='1' autocorrect=off></textarea>

				</section>
				<span id="addressError" class="error">
					<p>
						address is required
					</p>
				</span>
			</div>

			<!-- pincode -->
			 <div class="form-group pincode">
				<section>
					<label for="pincode">
                        Pincode
                    </label>
                    <input type="text" name="pincode" id="pincode" placeholder="pincode">
                </section>
				<span id="pincodeError" class="error">
					<p>
                        pincode is required
                    </p>
                </span>
			 </div>

			<!-- region -->
			<div class="form-group drop-down-region">
				<section class="">
					
					<select name="country" id="country">
						<option value="" disabled selected>-- Select Country --</option>
					</select>
					<select name="state" id="state">
						<option value="" disabled selected>-- Select State --</option>
					</select>
					<select name="city" id="city">
						<option value="" disabled selected>-- Select City --</option>
					</select>
				</section>
				<span id="regionError" class="error">
					<p>
                        Please select your region
                    </p>
                </span>
			</div>

			<!-- course -->
			 <div id='course-section' class="form-group">
				<section>
					<label for="course">
                        Course
                    </label>
                    <select name="course" id="course">
						<option value="">-- Select Course --</option>
						<option value="">pcm</option>
						<option value="">pcb</option>
					</select>
				</section>
				<span id="" class="error">
					<p>
                        Which course want to study?
                    </p>
					</span>
                </section>
			 </div>

			 <!-- password -->
			  <div class="form-group">
				<section>
					<label for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="*  *  *  *  *   *" autocomplete=on>

                </section>
                <span id="passwordError" class="error">
					<p>
						enter password 
					</p>
				</section>
			  </div>

			  <!-- confirm passsword -->
			   <div class="form-group">
				<section>
					<label for="confirm-password">
						Confirm Password
						</label>
					<input type="password" name="confirm-password" id="confirm-password" placeholder="*  *  *  *  *  *">

				</section>
				<span id='confirmPasswordError' class="error">
					<p>
						confirm password should match with password 
                    </p>
					</p>
				</span>
			   </div>

			<!-- submit -->
			<div class="form-group btn">
				<section>
					<input type="submit" id='submit-btn' value="Submit">
					<input type="reset" id='reset-btn' value="Clear">
				</section>
			</div>

		</form>
	<!-- </div>  -->


	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
	<!-- <script src="../scripts/registration_form_validation.js" defer></script>
</body>

</html>