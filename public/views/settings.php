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
    <title>Settings | Astre</title>
    <link rel="stylesheet" href="public/css/style.css" />
  </head>
  <body>
    <div class="edit-profile-screen-background">
      <nav class="navbar">
        <h2>SETTINGS</h2>
        <a href="/profile" class="done-button">Done</a>
      </nav>
        <form class="settings-screen" action="updateUserDetails" method="post">
            <h3>Name</h3>
            <input type="text"
            class="input" name="name" value=<?= $userDetails->getName() ?>>
            <h3>Birthday</h3>
            <input type="date"
             class="input" name="birthday" value="<?= $userDetails->getBirthday() ?>">
            <h3>Email</h3>
            <input type="text"
            class="input" name="email" value="<?= $user->getEmail() ?>">
            <h3>Password</h3>
            <input type="password" class="input" name="password" value="<?= $user->getPassword() ?>">
            <button
            class="btn" type="submit">Update</button>
        </form>
    </div>
    </div>
    <script
      src="https://kit.fontawesome.com/8a50b84207.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
