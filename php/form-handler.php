<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message_content = $_POST['message'];
    $service = $_POST['service'];

    $message = "New Form Request:<br><br>First Name: $first_name<br>Last Name: $last_name<br>Email: $email<br>Service: $service<br>Message: $message_content";

    $data = [
        'message' => $message,
        'notification_type' => 'email'
    ];

    $data_string = json_encode($data);

    $ch = curl_init('https://astapi1.voitexdev.com/v1/internal_notify/index.php');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string),
        'auth_key: p75KL0vqz3MSuQRrpUiHonu9PkblYwti'
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(['status' => 'error', 'message' => 'Curl error: ' . curl_error($ch)]);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code >= 400) {
            echo json_encode(['status' => 'error', 'message' => 'HTTP error: ' . $http_code]);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully.']);
        }
    }
    curl_close($ch);
    exit;
}
?>
