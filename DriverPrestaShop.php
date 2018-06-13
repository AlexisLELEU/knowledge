<?php 
require 'connect_file/connect.php';

class DriverPrestashop {
  public function __construct() {
    $this->getCustomers();
  }
  /* getCustomer, select customer from CRM API and also into PRESTASHOP API, if user doesn't exist into CRM API, we adding it */
  public function getCustomers() {
    $response = file_get_contents("http://localhost:8888/prestashop/api/customers/?display=full&ws_key=93GA82CZ26CWST1UML92YFIJCJ38V2GK&output_format=JSON");
    $response = json_decode($response);
    $url = "http://localhost:8888/api.php/client";
    $data = $response->customers;

    $url = 'http://localhost:8888/api.php/client';
 
    $ch = curl_init($url);

    $responseAPIBack = file_get_contents('http://localhost:8888/api.php/client');
    $responseAPIBack = json_decode($responseAPIBack);

    foreach ($data as $i=>$item) {
      if ($responseAPIBack[$i]->firstname !== $item->firstname) {
        $arrData = [
          'firstname' => $item->firstname,
          'lastname' => $item->lastname,
          'email' => $item->email,
          'dateBirth' => $item->birthday
        ];
        $jsonDataEncoded = json_encode($arrData);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
      }
    }
  }

  function editCustomer($obj, $id) {
    $req = "UPDATE client SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email WHERE `id_client` = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':firstname', $obj->firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $obj->lastname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $obj->email, PDO::PARAM_STR);
    $sql->fetch();
  }
}