<?php 
require 'connect_file/connect.php';

class DriverPrestashop {
  public function __construct() {
    $this->getCustomers();
    $this->END_POINT = "http://localhost:8888/api.php/";
  }
  /* getCustomer, select customer from CRM API and also into PRESTASHOP API, if user doesn't exist into CRM API, we adding it */
  public function getCustomers() {
    $response = file_get_contents("http://localhost:8888/prestashop/api/customers/?display=full&ws_key=93GA82CZ26CWST1UML92YFIJCJ38V2GK&output_format=JSON");
    $response = json_decode($response);
    $url = $this->END_POINT.'client';
    $data = $response->customers;
 
    $ch = curl_init($url);

    $responseAPIBack = file_get_contents($url);
    $responseAPIBack = json_decode($responseAPIBack);

    foreach ($data as $i=>$item) {
      if ($responseAPIBack[$i]->firstname !== $item->firstname) {
        $arrData = [
          'firstname' => $item->firstname,
          'lastname' => $item->lastname,
          'email' => $item->email,
          'dateBirth' => $item->birthday,
          'id_eCommerce' => $item->id
        ];
        $jsonDataEncoded = json_encode($arrData);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
      }
    }
  }

  public function getCommande($id) {
    $response = file_get_contents("http://localhost:8888/prestashop/api/orders?filter[id_customer]=$id&display=full&ws_key=93GA82CZ26CWST1UML92YFIJCJ38V2GK&output_format=JSON");
    $response = json_decode($response);
    $data = $response->orders;

    $url = 'http://localhost:8888/api.php/userOder';
    $res = file_get_contents($url);
    $res = json_decode($res);

    $ch = curl_init($url);

    $responseAPIBack = file_get_contents($url);
    $responseAPIBack = json_decode($responseAPIBack);

      $arr = [];
      foreach ($data as $i=>$item) {
        foreach($item->associations->order_rows as $order) {
          $arrData = [
            'user_id' => $_GET['id'],
            'reference' => $item->reference,
            'product' => $order->product_name,
            'date' => $item->date_add,
            'status' => $item->payment,
            'price' => $order->product_price,
            'delivery' => $item->delivery_date
          ];
          array_push($arr, $arrData);
        }
      }
      foreach ($arr as $i=>$item) {
        if ($item['reference'] !== $responseAPIBack[$i]->reference) {
          $jsonDataEncoded = json_encode($item);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $result = curl_exec($ch);
          var_dump($result);
        }
      }
    }
  }