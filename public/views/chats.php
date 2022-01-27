<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
            rel="stylesheet"
    />
    <title>Astre | dates, friends, astrology</title>
    <link rel="stylesheet" href="public/css/style.css"/>
</head>
<body>
<ul class="tabs">
    <a href="/swipe" class="tab">
        <i class="fas fa-heart"></i>
    </a>
    <a href="/chats" class="active tab">
        <i class="fas fa-comments"></i>
    </a>
    <a href="/profile" class="tab">
        <i class="fas fa-user"></i>
    </a>
</ul>
<div class="new-pairs-and-messages-container" style="overflow-y: scroll">
    <div class="new-pairs-container">
        <div class="container-name">New Pairs</div>
        <div class="new-pairs-fields" style="overflow-y: scroll">
                <?php foreach ($userPairs as $userChat): ?>
                    <div class="new-pair">
                        <a href="/chat?chat_id=<?= $userChat->getChatId(); ?>" class="new-pair-photo">
                            <img src="public/uploads/<?= $userChat->getPhoto(); ?>" alt=""/>
                        </a>
                        <div class="new-pair-username"><?= $userChat->getName(); ?></div>
                    </div>
                <?php endforeach; ?>
        </div>
        <div class="messages" style="margin: auto">
            <?php if (empty($userPairs)) {
                echo "All your pairs will appear here";
            } ?>
        </div>
    </div>

    <div class="messages-container">
        <div class="container-name">Messages</div>
        <div class="messages" style="text-align: center">
            <?php if (empty($userChats)) {
                echo "All your chats will appear here";
            } ?>
        </div>
        <?php foreach ($userChats as $userChat): ?>
            <a href="/chat?chat_id=<?= $userChat->getChatId(); ?>" class="message-container">
                <div class="message-container-photo">
                    <img src="public/uploads/<?= $userChat->getPhoto(); ?>" alt=""/>
                </div>
                <div class="message-container-text">
                    <h3 class="message-container-username"><?= $userChat->getName(); ?></h3>
                    <div class="message-container-snippet">
                        <?=$userChat->getMessageSnippet();?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<script
        src="https://kit.fontawesome.com/8a50b84207.js"
        crossorigin="anonymous"
        src="public/js/app.js"
></script>
</body>
</html>
