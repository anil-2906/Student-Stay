<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation Registration</title>
    <link rel="stylesheet" href="../../CSS/register.css">
</head>
<body>

    <h1>Student Accommodation Registration</h1>

    <form method="POST" action="../controller/register_controller.php">
        <label for="userType">Register as:</label>
        <select id="userType" name="userType">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
            <option value="Landlord">Landlord</option>
        </select>
        <br><br>
        <fieldset>
            <legend>Personal Information</legend>
            
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter a password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </fieldset>

        <button type="submit">Register</button>
    </form>

</body>
</html>
