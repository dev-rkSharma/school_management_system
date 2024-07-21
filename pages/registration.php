<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration Page</title>
      <link rel="stylesheet" href="../sass/registration/registration.css">
</head>

<body>
      <div class="form-container">
            <form action="" id="registration-form" name="registration-form">
                  <div class="row">
                        <section class="column">
                              <label for="fname">First Name : </label>
                              <input type="text" name="fname" id="fname" placeholder="enter your first name">
                        </section>
                        <section class="column">
                              <label for="fname">Last Name : </label>
                              <input type="text" name="lname" id="lname" placeholder="enter your last name">
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="father_name">Father's Name : </label>
                              <input type="text" name="father_name" id="father_name" placeholder=" father's name">
                        </section>
                        <section class="column">
                              <label for="mother_name">Mother's Name : </label>
                              <input type="text" name="fatherlastname" id="fatherlastname" placeholder=" mother's name">
                        </section>
                  </div>
                  <div class="row">
                        <label for="address">Address : </label>
                        <textarea name="address" id="address" cols="30" rows="10"></textarea>
                  </div>
                  <div class="row">
                        <section class='column'>
                              <label for="country">Country :
                                    <select name="" id=""></select>
                              </label>
                        </section>
                        <section class='column'>
                              <label for="country">State :
                                    <select name="" id=""></select>
                              </label>
                        </section>
                        <section class='column'>
                              <label for="country">City :
                                    <select name="" id=""></select>
                              </label>
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="date"> Date Of Birth
                                    <input type="date" name="date" id="data">
                              </label>
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="class">
                                    <select name="class" id="class"></select>
                              </label>
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="email">
                                    E-Mail : <input type="email" name="email" id="email">
                              </label>
                        </section>
                        <section class="column">
                              <label for="mobile-no">
                                    Mobile no : <input type="text" name="mobile-no" id="mobile_no" placeholder="enter mobile no">
                              </label>
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="password">
                                    Password : <input type="password" name="password" id="password" placeholder="enter password">
                              </label>
                        </section>
                        <section class="column">
                              <label for="confirm-password">
                                    Confirm Password : <input type="Confirm-password" name="Confirm-password" id="Confirm-password" placeholder="confirm password">
                        </section>
                  </div>
                  <div class="row">
                        <section class="column">
                              <label for="gender">
                                    Gender :
                                    <input type="radio" name="gender" value="male"> Male
                                    <input type="radio" name="gender" value="female"> Female
                                    <input type="radio" name="gender" value="other"> Other
                              </label>
                        </section>
                        <section class="column">
                              <label for="activity">
                                    Activity :
                                    <input type="checkbox" name="activity" value="reading"> Reading
                                    <input type="checkbox" name="activity" value="playing"> Playing
                                    <input type="checkbox" name="activity" value="dancing"> Dancing
                                    <input type="checkbox" name="activity" value="sports"> Sports
                                    <input type="checkbox" name="activity" value="cooking"> Cooking
                                    <input type="checkbox" name="activity" value="other"> Other
                                    <input type="checkbox" name="activity" value="none"> None

                              </label>
                        </section>
                  </div>
            </form>
      </div>
</body>

</html>