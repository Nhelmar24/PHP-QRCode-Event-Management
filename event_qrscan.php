<?php session_start(); ?>
<?php include("script/_db.php");

//getting id from url
$eid = $_GET['eid'];

?>
<script src="script/html5-qrcode.min.js"></script>
<style>
  .result {
    background-color: green;
    color: #fff;
    padding: 20px;
  }

  .row {
    display: flex;
  }
</style>
<!DOCTYPE html>
<html>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="row">
  <div class="col">
    <div style="width:80%;margin:0 auto;" id="reader"></div>
  </div>
  <!--div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div id="result">Result Here</div>
  </div-->
</div>


<script type="text/javascript">
  function onScanSuccess(qrCodeMessage) {
    location.replace(qrCodeMessage);
    //document.getElementById'result'.innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
  }

  function onScanError(errorMessage) {
    //handle scan error
  }

  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
      fps: 10,
      qrbox: 250
    });
  html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>

</html>