<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <link rel="stylesheet" href="./css/auth/register.css">
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="" method="post" id="registerForm" novalidate>
            @csrf
            <div class="form-group">
                <label for="username">First Name</label>
                <input type="text" name="first_name" id="username" required />
                <div class="error" id="usernameError"></div>
            </div>
            
            <div class="form-group">
                <label for="username">Last Name</label>
                <input type="text" name="last_name" id="username" required />
                <div class="error" id="usernameError"></div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />
                <div class="error" id="emailError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />
                <div class="error" id="passwordError"></div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirmPassword" required />
                <div class="error" id="confirmPasswordError"></div>
            </div>


            <button type="submit">Register</button>
        </form>
    </div>

        <script src="./js/register.js"></script>
</body>

</html>