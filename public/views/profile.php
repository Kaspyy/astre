<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <title>My profile | Astre</title>
    <link rel="stylesheet" href="public/css/style.css" />
  </head>
  <body>
    <ul class="tabs">
      <a href="/swipe" class="tab">
        <i class="fas fa-heart"></i>
      </a>
      <a href="/chats" class="tab">
        <i class="fas fa-comments"></i>
      </a>
      <a href="/profile" class="active tab">
        <i class="fas fa-user"></i>
      </a>
    </ul>

    <div class="profile-screen-foreground">
      <div class="profile-main-photo-container">
        <div class="profile-main-photo-background-1">
          <div class="profile-main-photo-background-2">
            <div class="profile-main-photo">

              <div class="user-zodiac-sign"><?= $userDetails->getZodiacSign() ?></div>
              <img src="public/uploads/<?= $userPhoto->getPhoto() ?>" alt="" />
            </div>
          </div>
        </div>
        <h2><?= $userDetails->getName() ?> <?= $userDetails->getAge() ?></h2>
      </div>
      <div class="profile-options-panel">
        <div class="profile-action-container">
          <a href="/settings" class="action">
            <i class="fas fa-cog"></i>
          </a>
          Settings
        </div>
        <div class="profile-action-container">
          <a href="/edit_profile" class="action">
            <i class="fas fa-pencil-alt"></i>
          </a>
          Edit profile
        </div>
      </div>
    </div>
  </div>

    <script
      src="https://kit.fontawesome.com/8a50b84207.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
