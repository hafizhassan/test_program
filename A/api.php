<?php
header('Content-type: application/json');

//input form user
$number_of_people = $_POST['number_of_people'];
$number_of_card = $_POST['number_of_card'];

//define card
$cardNos = array('A', 2, 3, 4, 5, 6, 7, 8, 9, 'X', 'J', 'Q', 'K');
$cardTypes = array('S', 'H', 'D', 'C');
$cardDeck = array();
$players = array();


foreach ($cardTypes as $type) {
    foreach ($cardNos as $no) {
        $cardDeck[] = $type . $no;
    }
}

// shuffle the card deck
shuffle($cardDeck);

//check if number or not
if (!is_numeric($number_of_card)) {
    $data['message'] = 'Irregularity occurred';
    echo json_encode($data);
    http_response_code(400);
    exit;
}

// check if number or not
if (is_numeric($number_of_people)) {

    // check if number of people is nil or less then 0
    if ($number_of_people  <= 0) {
        $data['message'] = 'Invalid Value';
        echo json_encode($data);
        http_response_code(400);
        exit;
    } else {

        // assign card to each player
        $count = 0;
        for ($i = 1; $i <= $number_of_people; $i++) {
            $card = array();
            for ($x = 1; $x <= $number_of_card; $x++) {
                $card[] = $cardDeck[$count++];
            }

            $players[$i] = $card;

            if ($count > 51) {
                //reshuffle the card deck
                shuffle($cardDeck);
                $count = 0;
            }
        }

        // convert array to json an remove unwanted char
        $strs = '';
        foreach ($players as $key => $card) {
            $find = array("[", "]", '"');
            $replace   = array("", "", "");
            $display = str_replace($find, $replace, json_encode($card));
            $strs = $strs . 'P' . $key . '=' . $display . '<br>';
        }

        $data['message'] =  $strs;
        echo json_encode($data);
        http_response_code(200);
        exit;
    }
} else {

    $data['message'] = 'Input value does not exist or value is invalid';
    echo json_encode($data);
    http_response_code(400);
    exit;
}
