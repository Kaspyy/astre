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
    <title>Interested in | Astre</title>
    <link rel="stylesheet" href="public/css/style.css" />
  </head>
  <body>
    <div class="edit-profile-screen-background">
      <nav class="navbar">
        <h2>Interested in</h2>
        <a href="/edit_profile" class="done-button">Done</a>
      </nav>
        <div class="select-gender-settings-screen">
            <form action="updateUserInterest" method="post">
                    <div class="select-gender-wrapper">
                        <input type="radio" name="gender" id="option-1" value="Men">
                        <input type="radio" name="gender" id="option-2" value="Women">
                        <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                            <span>Men</span>
                        </label>
                        <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                            <span>Women</span>
                        </label>
                    </div>
                    <button class="btn" id="selectButton" type="submit">Update</button>
            </form>
        </div>
    </div>
    </div>
    <script
      src="https://kit.fontawesome.com/8a50b84207.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
