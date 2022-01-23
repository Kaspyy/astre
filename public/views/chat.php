<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astre | Chat</title>
    <link rel="stylesheet" href="public/css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
      <script type="text/javascript" src="./public/js/chat.js" defer></script>
  </head>
  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <a href="/chats" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="public/uploads/<?= $userChatInfo->getPhoto()?>" alt="" />
          <div class="details">
            <span><?= $userChatInfo->getName()?></span>
          </div>
        </header>
        <div class="chat-box">
            <?php foreach ($messages as $message): ?>
            <?php if ($message->getSender() == $_SESSION['id']): ?>
          <div class="chat outgoing">
            <div class="details">
              <p><?=$message->getContent()?></p>
            </div>
          </div>
            <?php endif; ?>
            <?php if ($message->getReceiver() == $_SESSION['id']): ?>
          <div class="chat incoming">
            <img src="public/uploads/<?= $userChatInfo->getPhoto()?>" alt="" />
            <div class="details">
              <p><?=$message->getContent()?></p>
            </div>
          </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="typing-area">
            <input type="text" name="chat_id" value="<?=$userChatInfo->getChatId()?>" hidden>
            <input type="text" name="sender_id" value="<?php echo $_SESSION["id"];?>" hidden>
            <input type="text" name="receiver_id" value="<?=$userChatInfo->getId()?>" hidden>
            <input type="text" name="message" class="chat-input-field" placeholder="Type a message here..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </div>
      </section>
    </div>
    <script
      src="https://kit.fontawesome.com/8a50b84207.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<template id="message-template-outgoing">
        <div class="chat outgoing">
            <div class="details">
                <p>content</p>
            </div>
        </div>
</template>
<template id="message-template-incoming">
<div class="chat incoming">
    <img src="public/uploads/<?= $userChatInfo->getPhoto()?>" alt="" />
    <div class="details">
        <p>content</p>
    </div>
</div>
</template>