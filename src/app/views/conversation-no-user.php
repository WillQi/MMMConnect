<!DOCTYPE html>
<html>
    <head>
        <title>MMMConnect | Conversations</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="<?php echo $params["BASE"] ?>assets/css/pizza.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $params["BASE"] ?>assets/css/no-conversation.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $params["BASE"]; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/conversation-suggest.js"></script>
        <script>
            const ROOT = `${document.location.protocol}//${document.location.hostname}<?php echo $params["BASE"]; ?>`;
        </script>
    </head>
    <body>

        <div class="nav is-blue">
            <div class="nav-left">
                <a href="<?php echo $params["BASE"]; ?>"><span>MMM</span>Connect</a>
            </div>
            <div class="nav-right">
                <a href="<?php echo $params["user"]["profileURL"] ?>"><?php echo $params["user"]["name"] ?></a>
                <a href="<?php echo $params["BASE"]; ?>"><i class="fas fa-home"></i></a>
                <a href="<?php echo $params["BASE"]; ?>"><i class="fas fa-bell"></i></a>
                <a href="<?php echo $params["BASE"]; ?>requests"><i class="fas fa-user-friends"></i></a>
                <a href="<?php echo $params["BASE"]; ?>conversation"><i class="fas fa-envelope"></i></a>
                <a href="<?php echo $params["BASE"]; ?>settings"><i class="fas fa-cogs"></i></a>
                <a href="<?php echo $params["BASE"]; ?>logout"><i class="fas fa-sign-out-alt"></i></a>
            </div>
            
        </div>
        <div id="wrapper">
            <div class="one-quarter">
                <div class="box">
                    <div class="half">
                        <img class="image image-128x128" src="<?php echo $params["user"]["avatar"] ?>" />
                    </div>
                    <div class="one-quarter">
                        <span><a href="<?php echo $params["user"]["profileURL"] ?>" class="link"><?php echo $params["user"]["name"] ?></a></span><br />
                        <span>Posts: <span data-stat="posts"><?php echo $params["user"]["posts"] ?></span></span><br />
                        <span>Likes: <span data-stat="likes"><?php echo $params["user"]["likes"] ?></span></span>
                    </div>
                </div>
                <div class="box">
                    <h2>Conversations</h2>
                    <hr />
                    <?php
                        foreach ($params["conversations"] as $conversation) {
                            $who = "You";
                            if ($conversation["message"]["author"]["id"] != $params["user"]["id"]) {
                                $who = "They";
                            }
                            $body = $conversation["message"]["body"];
                            if (strlen($body) > 10) {
                                $body = substr($body, 0, 10) . "...";
                            }
                            echo "<a href=\"" . $params["BASE"] . "conversation/" . $conversation["user"]["username"] . "\"><div class=\"post\">
                                <div class=\"avatar\">
                                    <img class=\"image image-64x64\" src=\"" . $conversation["user"]["avatar"] . "\" />
                                </div>
                                <div class=\"content\">
                                    <span class=\"link\">" . $conversation["user"]["name"] . "</span> <i class=\"faded\">" . $conversation["message"]["timestamp"] . "</i><br />
                                    $who said " . $body . "
                                </div>
                            </div></a><hr />";
                            
                        }
                    ?>
                    <a href="<?php echo $params["BASE"]; ?>conversation">New Message</a>
                </div>
            </div>
            <div class="seven-tenths">
                <div class="box">
                    <h1>New Conversation</h1>
                    <hr />
                    <div class="center-text"> 
                        <p>Search for the friend you would like to message...</p>
                        <div class="input">
                            <input type="text" placeholder="Type a username..." />
                        </div>
                    </div>
                    <div id="suggestions"></div>
                </div>
            </div>
        </div>

    </body>
</html>