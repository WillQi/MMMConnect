<!DOCTYPE html>
<html>
    <head>
        <title>MMMConnect | Feed</title>
        <link href="<?php echo $params["BASE"]; ?>assets/css/fa/css/all.css" rel="stylesheet" type="text/css" />  
        <link href="<?php echo $params["BASE"]; ?>assets/css/pizza.css" rel="stylesheet" type="text/css" />  
        <link href="<?php echo $params["BASE"]; ?>assets/css/feed.css" rel="stylesheet" type="text/css" />  
        <script>
            const ROOT = `${document.location.protocol}//${document.location.hostname}<?php echo $params["BASE"]; ?>`;
        </script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/templates.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/conversations/index.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/notifications/index.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/nav.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/feed/index.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/feed/common.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/feed/feed.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/timestamps.js"></script>
        <script src="<?php echo $params["BASE"]; ?>assets/js/markdown.js"></script>

    </head>
    <body>
        <?php
            require(dirname(__FILE__) . "/templates.php"); // I would have prefered this elsewhere. But it works.
            require(dirname(__FILE__) . "/nav.php");
        ?>
        <div id="wrapper">
            <div class="one-quarter">
                <div class="box">
                    <div class="half">
                        <img class="image image-128x128" src="<?php echo $params["user"]["avatar"] ?>" />
                    </div>
                    <div class="one-quarter" id="userInfo">
                        <span><a href="<?php echo $params["user"]["profileURL"] ?>" class="link"><?php echo $params["user"]["name"] ?></a></span><br />
                        <span>Posts: <span data-stat="posts"><?php echo $params["user"]["posts"] ?></span></span><br />
                        <span>Likes: <span data-stat="likes"><?php echo $params["user"]["likes"] ?></span></span>
                    </div>
                </div>
                <div class="box">
                    <h2>Trending</h2>
                    <?php
                        foreach ($params["trending"] as $trending) {
                            echo $trending["term"] . "<br />";
                        }
                    ?>
                </div>
            </div>
            <div class="seven-tenths">
                <div class="box">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo $params["BASE"]; ?>feed/post" id="postForm" data-form="feed-message">
                        <input name="image" type="file" /><br />
                        <textarea class="form-textarea" name="body" placeholder="What's on your mind?"></textarea>
                        <input type="submit" class="input submitButton" name="activitySubmit" value="Post" />
                    </form>
                    <p>Tip: you can bold text by typing <b>**text**</b>, you can underline text by typing <b>__text__</b>, you can cross text out with <b>~~text~~</b></p>
                    <hr />
                    <div id="feed"></div>
                    <img class="loading" src="<?php echo $params["BASE"]; ?>assets/images/gifs/loading.gif" />
                </div>
            </div>
        </div>


        <div class="modal" id="deleteModal">
            <div class="background"></div>
            <div class="content">
                <div class="box">
                    <a class="link"><span class="keep-right">X</span></a>
                    <p>Are you sure you want to delete this?</p>
                    <hr />
                    <form method="POST">
                        <div class="input is-red">
                            <input name="delete" value="Delete" type="submit" />
                        </div>
                        <input name="isPost" type="hidden" />
                        <input name="commentId" type="hidden" />
                        <input name="postId" type="hidden" />
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="editModal">
            <div class="background"></div>
            <div class="content">
                <div class="box">
                    <a class="link"><span class="keep-right">X</span></a>
                    <p>What would you like to edit this to?</p>
                    <p>Tip: you can bold text by typing <b>**text**</b>, you can underline text by typing <b>__text__</b>, you can cross text out with <b>~~text~~</b></p>
                    <hr />
                    <form method="POST" action="<?php echo $params["BASE"] ?>feed/editpost">
                        <textarea style="width: 90%; min-height: 10em; padding: 1%; margin-left: 1em;" name="message" placeholder="What do you want to change this comment to?"></textarea><br />
                        <div class="input is-green">
                            <input name="edit" value="Edit" type="submit" />
                        </div>
                        <input name="id" type="hidden" />
                    </form>
                </div>
            </div>
        </div>


    </body>
</html>