<?php
    include('connection.php'); 

    $stmt = $con->prepare("INSERT INTO admin_config (gmail, text_to_receive, server_name, trigger_for_activation) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $gmail, $textToReceive, $serverName, $triggerForActivation);

    $gmail = $_POST['gmailToReceive'];
    $textToReceive = $_POST['textToReceive'];
    $serverName = $_POST['serverName'];
    $triggerForActivation = $_POST['triggerForActivation'];

    if ($stmt->execute()) {
        echo "<h2>Configuration changed successfully.</h2>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
?>