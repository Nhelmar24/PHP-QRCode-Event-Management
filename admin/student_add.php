<?php include("../script/_db.php"); include("_head.php");
session_start();
if(isset($_POST['add_data'])){
	
	//getting the text data from the fields
	$sfname = $_POST['sfname'];
	$slname = $_POST['slname'];
	$sgender = $_POST['sgender'];
	$sbirthday = $_POST['sbirthday'];
	$sutype = $_POST['sutype'];
    $scampus = $_POST['scampus'];
    $surole = $_POST['surole'];
	
	$add = "INSERT into 
	students(sfname,slname,sgender, sbirthday,sutype,scampus,surole)
    values('$sfname','$slname','$sgender','$sbirthday','$sutype','$scampus','$surole')";
	
	$insert_pro = mysqli_query($connect, $add);
	
	if($insert_pro){
		echo "<script>alert('New Record has been added to Database')</script>";
		echo "<script>window.open('home.php', '_SELF')</script>";
	}else{
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
	}
?>
<style>
    .admin_student{padding:20px;}
    .admin_student h3{background:rgba(25,25,25,0.3);padding:5px;margin-bottom:5px;border-radius:5px;border:1px solid rgba(25,25,25,0.5);}
    .admin_student table tr td{padding:5px;}
    .admin_student table tr td input{padding:5px;}
    .admin_student table tr td select option{padding:5px;}
</style>
<div class="admin_student">
<h3>Add User / Student Information</h3>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>First Name</td>
            <td>
            <input type="text" name="sfname" autocomplete="off" required/>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
            <input type="text" name="slname" autocomplete="off" required/>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><select name="sgender" id="">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Birthday</td>
            <td><input type="date" name="sbirthday" autocomplete="off" required/>
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <td><select name="sutype" id="">
                <option>Please Select User Type</option>
                <option value="Admin">Admin</option>
                <option value="Participant">Participant</option>
                <option value="Coordinator">Coordinator</option>
                <option value="D.P.O.">D.P.O.</option>
                <option value="C.O.P.">C.O.P.</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Campus Name</td>
            <td><select name="scampus" id="">
                <option>Please Select Campus</option>
                <?php 
                global $mysqli;
                $resultCat = $mysqli->query("SELECT cname FROM campus");
                    
                    ?>
					<?php
                        while($rows = $resultCat->fetch_assoc()){
                            $cname = $rows['cname'];
                            echo "<option value='$cname'> $cname </option>";
                        }
                    ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>User Role</td>
            <td><select name="surole" id="">
                <option>Please Select Role</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
                <option value="Guest">Guest</option>
            </select>
            </td>
        </tr>
    </table>
<input class="btn-add" type="submit" name="add_data" value="Add Record"/>
</form>
</div>
<?php include("_footer.php");?>