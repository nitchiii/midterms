<?php
ob_start();
session_start();
include 'conn.php';

$sql = "SELECT students.first_name,
       students.last_name,
       courses.course_name,
       majors.major_name,
       specializations.specialization_name,
       exams.exam_name,
       exams.date,
       grades.grade_value
    FROM grades
    LEFT JOIN exams ON exams.exam_id = grades.exam_id
    LEFT JOIN courses ON courses.course_id = grades.course_id
    LEFT JOIN majors ON majors.major_id = grades.major_id
    LEFT JOIN specializations ON specializations.specialization_id = grades.specialization_id
    LEFT JOIN students ON  students.student_id = grades.student_id
 ";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Join 3 Table Level 1</title>
	
	
</head>
<body>

<div class="container">
    <h3 align="center">1st Level Join Table</h3>
    <div class="table-responsive">
       <table id="student_data" class="table table-striped table-bordered">
          <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course Name</th>
                <th>Major Name</th>
                <th>Specialization Name</th>
                <th>Exam Name</th>
                <th>Date</th>
                <th>Grade Value</th>
              

              </tr>
              
              
          </thead>

           <?php  
		
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo '
                    <tr >
                        <td> '.$row["first_name"].' </td>
                        <td> '.$row["last_name"].' </td>
                        <td> '.$row["course_name"].' </td>
                        <td> '.$row["major_name"].' </td>
                        <td> '.$row["specialization_name"].' </td>
                        <td> '.$row["exam_name"].' </td>
                        <td> '.$row["date"].' </td>
                        <td> '.$row["grade_value"].' </td>

                    </tr>
                    ';
                }

		  ?>
       </table>
        
    </div>
    
    
</div>

	

<!--
		<a href="index2.php">Insert Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="search_filter_print.php">Search Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="update.php">Update Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php">Go to Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
-->

</body>
</html>


