<?php
function logActivity($action, $username) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $remoteHost = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $location = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

    $log = [
        'timestamp' => date("Y-m-d H:i:s"),
        'action' => $action,
        'username' => $username,
        'ip' => $ip,
        'browser' => $browser,
        'remoteHost' => $remoteHost,
        'location' => $location
    ];

    $logFile = fopen(__DIR__ . '/../logs/activity.log', 'a');
    fwrite($logFile, json_encode($log) . PHP_EOL);
    fclose($logFile);
}
?>
