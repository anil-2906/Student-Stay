

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation Login</title>
    <link rel="stylesheet" href="../../CSS/login.css"> 
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h1>Welcome to Student Accommodation</h1>
            <form action="/login" method="POST">
                <label for="userType">Login as:</label>
                <select id="userType" name="userType">
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    <option value="landlord">Landlord</option>
                </select>
                <br><br>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div> 
                <a class ="forgotpassword" href="/studentstay/forgotpassword">Forgot Password?</a>
                <button type="submit" class="btn">Log In</button>
                <p class="register-link">Don't have an account? <a href="../views/register_view.php">Register here</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>
