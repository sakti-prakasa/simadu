<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h3 class="text-center">Forgot Password</h3>
                <div id="response-message"></div>
                <form id="reset-password-form">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                    <a href="../login/login.php" class="btn btn-secondary">Back to Login</a>
                </form>
                <div id="new-password" class="mt-4" style="display: none;">
                    <h5>New Password:</h5>
                    <div id="new-password-text" class="form-group">
                        <input type="text" class="form-control" readonly>
                    </div>
                    <button id="copy-password" class="btn btn-secondary">Copy Password</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reset-password-form').submit(function(e) {
                e.preventDefault();

                var email = $('#email').val();

                $.ajax({
                    type: 'POST',
                    url: 'reset_password.php',
                    data: {
                        email: email
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#response-message').html('<div class="alert alert-' + (response.success ? 'success' : 'danger') + '">' + response.message + '</div>');

                        if (response.success) {
                            $('#new-password-text input').val(response.newPassword);
                            $('#new-password').show();
                        }
                    }
                });
            });

            $('#copy-password').click(function() {
                var passwordText = $('#new-password-text input');
                passwordText.select();
                document.execCommand('copy');
                passwordText.val('');
                alert('Password copied to clipboard');
            });
        });
    </script>
</body>

</html>