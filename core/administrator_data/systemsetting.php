<?php

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

if (isset($_POST['updateSystemSetting'])) {

    $sql = " UPDATE systemsettings SET systemName='$_POST[systemName]', systemTitle='$_POST[systemTitle]',
            systemEmail='$_POST[systemEmail]', systemAddress='$_POST[systemAddress]', systemPhone='$_POST[systemPhone]',
            systemPaypal='$_POST[systemPaypal]', systemCurrency='$_POST[systemCurrency]' WHERE id='$_POST[id]'";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['updateSuccess'] = "<div class='profileSuccess'>System Data Is Update Successful</div>";
    } else {
        $_SESSION['updateError'] = "<div class='updateError'>Oops! Data Not Updateed</div>";
    }
}

?>