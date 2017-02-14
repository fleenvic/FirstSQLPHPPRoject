<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("config.php");
        
        $query = "SELECT * FROM tblstudent";
        $result = $db->query($query);
        
        if ($result == false) {
            $error_message = $db->error;
            echo "<p>An error occurred: $error_message</p>";
            exit();
        }
        ?>
        
        <table border="1">
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
                
                for ($i = 0; $i < $row_count; $i++) :
                    $student = $result->fetch_assoc();
                ?>
                
                <tr>
                    <td><?php echo $student['firstName']; ?></td>
                    <td><?php echo $student['lastName']; ?></td>
                    <td><?php echo $student['studentID']; ?></td>
                    <td><a href="mailto:<?php echo $student['eMail']; ?>"><?php echo $student['eMail']; ?></a></td>
                    <td><form action="delete.php" method="post">
                        <input type="hidden" name="stuID"
                               value="<?php echo $student['studentID']; ?>" />
                        <input type="submit" value="Delete" /></form>
                    </td>
                </tr>
                <?php
                endfor; 
                ?>
                
            </tbody>
        </table>
        <!-- post link to add new student -->
            <ul>
            <p><a href="addStudent.php">Add New Student</a></p>
                <br></br>
                <br></br>
                <br></br>                

            </ul>
        
    </body>
</html>
