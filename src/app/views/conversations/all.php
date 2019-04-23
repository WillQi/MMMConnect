<?php
    $data = array();

    foreach ($params["conversations"] as $convo) {
        array_push($data, array(
            "user" => array(
                "avatar" => $convo["user"]["avatar"],
                "profile" => $convo["user"]["profileURL"],
                "name" => $convo["user"]["name"],
                "username" => $convo["user"]["username"]
            ),
            "message" => array(
                "id" => $convo["message"]["id"],
                "weSentThis" => $convo["message"]["author"]["id"] == $params["user"]["id"],
                "body" => $convo["message"]["body"],
                "timestamp" => $convo["message"]["timestamp"]
            )
        ));
    }

    echo json_encode($data);
?>