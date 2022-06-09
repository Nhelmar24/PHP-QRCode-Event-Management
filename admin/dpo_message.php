
<link rel="stylesheet" href="../css/style.css">
<?php include("../script/_db.php"); include("_head.php");

if(isset($_POST['add_message'])){
	
	//getting the text data from the fields
	
    $rid = $_POST['rid'];
    $sid = $_POST['sid'];
    $tag = $_POST['tag'];
    $mdetails = $_POST['mdetails'];
	
	$add = "INSERT into 
	messages(rid, sid, mdetails, tag)
    values('$rid','$sid','$mdetails','$tag')";
	
	$insert_pro = mysqli_query($connect, $add);
	
	if($insert_pro){
		echo "<script>window.open('dpo_message.php?rid=$rid', '_SELF')</script>";
	}else{
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
	}


?>

<div style="padding:20px">

<div class="report_right">
    <h3>Data Breach Messaging</h3><br />
    <div class="report_message"><table>
    <?php
// including the database connection file
 

//getting id from url 
$rid = $_GET['rid'];
 
//selecting data associated with this particular id
//$result = mysqli_query($connect, "SELECT * FROM reports WHERE rid=$rid");

$result = mysqli_query($connect, "SELECT * FROM messages WHERE rid=$rid");
 
while($res = mysqli_fetch_array($result))
{
    $rid = $res['rid'];
    $sid = $res['sid'];
    $tag = $res['tag'];
    $mdetails = $res['mdetails'];

    echo "
    <tr><td>$tag</td><td>$mdetails</td></tr>
    ";

}
?></table>
    </div>
    <div class="report_create">
        <h4>Create a message</h4>
        <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <tr>
                <input type="hidden" name="rid" value="<?php echo $rid; ?>"/>
                <input type="hidden" name="sid" value="<?php echo $sid; ?>"/>
                <input type="hidden" name="tag" value="Admin"/>
           
                <td width="80%"><input style="padding:10px;" type="text" name="mdetails"></td>
                <td align="left"><input align="left" class="view" type="submit" name="add_message" value="Send"/></td>
            </tr>
        </table>

        </form>
        
    </div>
</div>
<style>
    .report_left{width:50%;float:left;overflow:hidden;}
    .report_right{width:50%;float:left;overflow:hidden;}
    .report_message{overflow:scroll;height:400px;width:85%;border:1px solid rgba(25,25,25,0.2);margin-bottom:5px;}
    .report_create input{width:50%;}
    @media screen and (max-width: 600px){
		.report_left{width:100%;float:left;overflow:hidden;}
        .report_right{width:100%;float:right;overflow:hidden;}
        .report_message{overflow:scroll;height:400px;width:85%;border:1px solid rgba(25,25,25,0.2);margin-bottom:5px;}
        .report_create input{width:50%;}
	}
</style>

<?php include("_footer.php"); ?>