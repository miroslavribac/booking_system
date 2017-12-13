<?php

storeBookingObject($_POST['data']);

function storeBookingObject($post){
    echo json_encode($post);
}

