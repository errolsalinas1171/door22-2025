<?php
namespace Phppot;

use Phppot\DataSource;
require_once __DIR__ . '/lib/UserModel.php';
$userModel = new UserModel();
if (isset($_POST["import"])) {
    $response = $userModel->readUserRecords();
}
?>
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
function validateFile() {
    var csvInputFile = document.forms["frmCSVImport"]["file"].value;
    if (csvInputFile == "") {
      error = "No source found to import";
      $("#response").html(error).addClass("error");;
      return false;
    }
    return true;
  }

</script>
<style type="text/css">
.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
    margin-bottom: 10px;
}
.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #3276b1;
    border: #285e8e 1px solid;
    color: #fff;
    font-size: 0.9em;
    width: 190px;
    border-radius: 3px;
    cursor: pointer;
    height: 40px;
}
</style>
<div class="outer-scontainer">
    <div>
    	<span style="font-size: 16px;">Please select CSV file...</span><br><br>
        <form class="form-horizontal" action="" method="post"
            name="frmCSVImport" id="frmCSVImport"
            enctype="multipart/form-data"
            onsubmit="return validateFile()">
            <div Class="input-row">
                <input type="file" name="file" id="file"
                    class="file" accept=".csv,.xls,.xlsx"><br>
                <div class="import">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="response"
    class="<?php if(!empty($response["type"])) { echo $response["type"] ; } ?>">
    <?php if(!empty($response["message"])) { echo $response["message"]; } ?>
</div>