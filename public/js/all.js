
$("#next").click(function(){
    console.log('hello world')
});
$("#next2").click(function(){
    console.log('world hello')
});

$('#initialRegistration').submit(function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get form data and convert it to a JSON object
    var formData = {
        firstName: $('#firstName').val(),
        middleName: $('#middleName').val(),
        lastName: $('#lastName').val(),
        nameExtension: $('#nameExtension').val(),
        district: $('#district').val(),
        cityTown: $('#cityTown').val(),
        barangay: $('#barangay').val(),
        zipCode: $('#zipCode').val(),
        emailAddress: $('#emailAddress').val(),
        mobileNumber: $('#mobileNumber').val(),
        password: $('#password').val(),
        confirmPassword: $('#confirmPassword').val()
    };

    // Make an AJAX POST request to your localhost API
    $.ajax({
        url: 'http://127.0.0.1:8000/api/v1/students/register', // Update the URL with your API endpoint
        type: 'POST',
        contentType: 'application/json', // Set the content type to application/json
        dataType: 'json', // Specify the data type expected in the response
        data: JSON.stringify(formData), // Convert formData to JSON string
        success: function(response) {
            // Handle successful response
            console.log(response.student);
            var myObject =  response.student;
            var output = '';
            for (var key in myObject) {
                output += key + ': ' + myObject[key] + ', ';
            }
            alert(output);
            // You can do something with the response data here
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
            alert(status, xhr);
        }
    });
});


$('#adminLogin').on('submit', function (e) {
    e.preventDefault();
    var formData = {
        username: $('#username').val(),
        password: $('#password').val(),
    };

    // Make an AJAX POST request to your localhost API
    $('#adminLogin').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        var formData = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        
        $.ajax({
            url: 'http://127.0.0.1:8000/api/v1/admin?username[eq]='+username+'&password[eq]='+password, // Update the URL with your API endpoint
            type: 'GET',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(formData),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                // Handle successful response
                console.log(response.student);
                var myObject =  response.student;
                var output = '';
                for (var key in myObject) {
                    output += key + ': ' + myObject[key] + ', ';
                }
                // Redirect to another page
                window.location.href = '/admin'; // Change '/dashboard' to the URL of the page you want to redirect to
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
                alert('Login failed. Please check your credentials.'); // Provide a user-friendly error message
            }
        });
    });
})





