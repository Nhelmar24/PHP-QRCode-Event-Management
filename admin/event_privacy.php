<?php session_start(); ?>
<?php include("script/_db.php");?>
<?php
//getting id from url
$eid = $_GET['eid'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");
 
while($res = mysqli_fetch_array($result))
{
    $eid = $res['eid'];
    $ename = $res['ename']; 
    $edesc = $res['edesc'];
    $ecoor = $res['ecoor'];
    $elocation = $res['elocation'];
    $eunits = $res['eunits'];
    $eaudience = $res['eaudience'];
    $edatestart = $res['edatestart'];
    $edateend = $res['edateend'];
    $etimestart = $res['etimestart'];
    $etimeend = $res['etimeend'];
}
?>
<div style="padding:10px 10px">

</div>
<h2>Data Privacy Notice & Consent</h2><br />
<p>By filling up this form you are consenting to the collection, processing and use of the information in accordance to this privacy notice. Data Privacy Notice and Consent is committed to protecting the privacy of its data subjects, and ensuring the safety and security of personal data under its control and custody. This policy provides information on what personal data is gathered by AC about its current, past, and prospective students; how it will use and process this; how it will keep this secure; and how it will dispose of it when it is no longer needed. If you have concerns and queries on Data Privacy, email dpo@rsu.edu.ph Rest assured that the office of DPO will respect and protect the confidentiality and privacy of these data information as required by the <b>Data Privacy Act of 2012(R.A 10173)</b>.</p><br />
    <p><a align='center' href='event_qrscan.php?eid=<?php echo $eid; ?>'><button class='eview' style='padding:10px;font-size:38px;'>I AGREE</button></a></p>