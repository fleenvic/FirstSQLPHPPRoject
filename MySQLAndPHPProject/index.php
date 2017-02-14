<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

    </head>
    <body>
        <?php
        include("config.php");

        $students_query = "SELECT * FROM tblstudent";
        $result = $db->query($students_query);

        if ($result == false) {
            $error_message = $db->error;
            echo "<p>An error occurred: $error_message</p>";
            exit();
        }
        ?>

        <table border ="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>ID Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row_count = $result->num_rows;

                for ($i = 0; $i < $row_count; $i++):
                    $student = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $student['firstName']; ?></td>
                        <td><?php echo $student['lastName']; ?></td>
                        <td><?php echo $student['studentID']; ?></td>
                        <td><a href="mailto:<?php echo $student['eMail']; ?>"><?php echo $student['eMail']; ?></a></td>
                    </tr>

                    <?php
                endfor;
                ?>

            </tbody>
        </table>

        <hr>

        <form action="insert.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Add Student</th>                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="stuFName" /></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="stuLName" /></td>
                    </tr>
                    <tr>
                        <td>Student ID:</td>
                        <td><input type="text" name="stuID" /></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="stuEmail" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="submit" value ="Add"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
