<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <title>Edit profile | Astre</title>
  <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>
  <div class="edit-profile-screen-background" style="overflow-y: scroll;">
    <nav class="navbar">
      <h2>EDIT PROFILE</h2>
      <a href="/profile" class="done-button">Done</a>
    </nav>
    <div class="edit-profile-photos-container">
      <div class="edit-profile-photo-container">
        <img src="public/img/profilepics/profile-pic.jpg" alt="" />
        <div class="action-remove">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="edit-profile-photo-container">
        <div class="action-add">
          <i class="fas fa-plus"></i>
        </div>
      </div>
      <div class="edit-profile-photo-container">
        <div class="action-add">
          <i class="fas fa-plus"></i>
        </div>
      </div>
    </div>
    <div class="edit-profile-bio">
      <h4>About me</h4>
      <textarea id="user-bio" name="bio" maxlength="250" placeholder="Tell something about yourself."></textarea>
    </div>
    <div class="edit-profile-choose">
      <h4>Hobbies</h4>
      <a href="/select_hobbies">
        <div class="edit-profile-choose-container">
          Workout, Drinks
          <div class="arrow-button">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="edit-profile-choose">
      <h4>Lives in</h4>
      <div class="edit-profile-choose-container">
        Cracow
        <div class="arrow-button">
          <i class="fas fa-chevron-right"></i>
        </div>
      </div>
    </div>
    <div class="edit-profile-choose">
      <h4>Gender</h4>
      <a href="/select_gender">
        <div class="edit-profile-choose-container">
          Man
          <div class="arrow-button">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="edit-profile-choose">
      <h4>Interested in</h4>
      <a href="/interested_in">
        <div class="edit-profile-choose-container">
          Women
          <div class="arrow-button">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
  </div>
  <script src="https://kit.fontawesome.com/8a50b84207.js" crossorigin="anonymous"></script>
</body>

</html>