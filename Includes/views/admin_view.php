<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <script>
    
        document.addEventListener('DOMContentLoaded', () => {
            const radioButtons = document.querySelectorAll('.radio-button');

            radioButtons.forEach(button => {
                button.addEventListener('change', (event) => {
                    const selectedStatus = event.target.value;
                    const studentId = event.target.name.split('_')[2];
                    console.log(`Student ID: ${studentId}, Selected Status: ${selectedStatus}`);

                    
            
                });
            });

            const documentButtons = document.querySelectorAll('.doc-button');

            documentButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    console.log('Document button clicked!');
                    
                });
            });
        });
    </script>
</head>

<body>
    <h1>Admin Panel</h1>
    <table class="student-table">
        <thead>
            <tr>
                <th class="table-header">S.No</th>
                <th class="table-header">Student Name</th>
                <th class="table-header">Student Email</th>
                <th class="table-header">Documents</th>
                <th class="table-header">Verification Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $students = [
                ["id" => 1, "name" => "John Doe", "email" => "john.doe@example.com"],
            ];

            
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td class=\"table-data\">" . $student['id'] . "</td>";
                echo "<td class=\"table-data\">" . $student['name'] . "</td>";
                echo "<td class=\"table-data\">" . $student['email'] . "</td>";
                echo "<td class=\"table-data\"><input class=\"doc-button\" type=\"image\" src=\"document_icon.png\" alt=\"Document\"></td>";
                echo "<td class=\"table-data\">";
                echo "<input class=\"radio-button\" type=\"radio\" name=\"verification_status_" . $student['id'] . "\" value=\"verified\"> Verified";
                echo "<input class=\"radio-button\" type=\"radio\" name=\"verification_status_" . $student['id'] . "\" value=\"not_verified\"> Not Verified";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
