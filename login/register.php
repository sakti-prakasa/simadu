<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h2>Teacher Registration</h2>
                <form id="teacherForm" method="POST" action="register_teacher.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Show Both Password</label>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Class:</label>
                        <select class="form-control" id="class_id" name="class_id">
                            <option value="">Select Class</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch class data using AJAX
            $.ajax({
                url: "fetch_classes.php",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Populate class options
                    var options = "";
                    $.each(data, function(index, item) {
                        options += '<option value="' + item.id_class + '">' + item.name + '</option>';
                    });
                    $("#class_id").append(options);
                },
                error: function(xhr, status, error) {
                    console.log("Error fetching class data: " + error);
                }
            });

            // Toggle password visibility
            $("#showPassword").click(function() {
                var passwordInput = $("#password");
                var confirmPasswordInput = $("#confirmPassword");

                if ($(this).is(":checked")) {
                    passwordInput.attr("type", "text");
                    confirmPasswordInput.attr("type", "text");
                } else {
                    passwordInput.attr("type", "password");
                    confirmPasswordInput.attr("type", "password");
                }
            });

            // Password validation
            $("#teacherForm").submit(function(event) {
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();

                if (password !== confirmPassword) {
                    alert("Passwords do not match.");
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>