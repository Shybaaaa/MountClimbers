<?php
function LogsRegister($typeLogs, $logsMessage)
{

    /* Var $db de dbIni.php*/
    global $db;

    /* On mets la timezone en GMT */
    date_default_timezone_set('GMT');

    /* On enregistre la date en format MYSQL */
    $logsTime = date("Y-m-d H:i:s");

    /* On récupère l'ip de la personne */
    $ip = $_SERVER['REMOTE_ADDR'];

    /* On prépare la requète SQL */
    $sql = "INSERT INTO `logs` (logs_date, logs_type, logs_message, ip) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    /* Exécution de la requête avec les données */
    $stmt->execute([$logsTime, $typeLogs, $logsMessage, $ip]);
}