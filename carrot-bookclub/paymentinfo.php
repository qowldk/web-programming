<?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Retrieve the data sent from the client-side
  $imp_uid = $_POST['imp_uid'];
  $merchant_uid = $_POST['merchant_uid'];

  // Process the payment information
  // You can perform necessary operations with the received data here
  // ...

  // Prepare the response
  $response = array('status' => 'success', 'message' => 'Payment has been completed');

  // Send the response back to the client-side
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
} else {
  // Return an error if the request method is not POST
  http_response_code(405);
  $response = array('status' => 'error', 'message' => 'Invalid request method');
  echo json_encode($response);
  exit();
}
?>