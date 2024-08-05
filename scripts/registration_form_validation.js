$('button').on('click',() => {
    const student = {
        firstName : $('#firstName').val().trim(),
        lastName : $('#lastName').val().trim(),
        father : {
            firstName : $('#fatherFirstName').val().trim(),
            lastName : $('#fatherLastName').val().trim()
        },
        mother : {
            firstName : $('#motherFirstName').val().trim(),
            lastName : $('#motherLastName').val().trim()
        },
        address : {
            house : $('#address').val().trim(),
            pincode : $('#pincode').val().trim(),
            //todo city : $('#city').val(),
        },
        contact : {
            mobile : $('#mobile').val().trim(),
            phone : $('#phone').val().trim(),
            email : $('#email').val().trim(),
        },
        gender : $('input[type = "radio"]:checked').val(),
        dob : $('#dob').val(),
        class : $('#class').val(),
        activity : $('input[type="checkbox"]:checked').text(), 
        password : $('#password').val(), 
}
    console.log(student);
    console.log('first name : '+student.firstName)
    console.log('last name : '+student.lastName)
    console.log('father first name : '+student.father.firstName)
    console.log('father last name : '+student.father.lastName)
    console.log('mother first name :' + student.mother.firstName)
    console.log('mother last name : '+student.mother.lastName)
    console.log('address : '+ student.address.house)
    console.log('pincode :  ' + student.address.pincode)
    console.log('mobile : ' + student.contact.mobile)
    console.log('email : ' + student.contact.email)
    console.log('phone : ' + student.contact.phone)
    console.log('gender : '+ student.gender)
    console.log('activity : ' + student.activity)
    console.log('dob : ' + student.dob)
    console.log('class : ' + student.class)
    console.log('password : ' + student.password)



})
$('input[type="radio"]').on('click', function(e){
    console.log(e.target.value);
});