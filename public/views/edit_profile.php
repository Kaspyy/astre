<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"/>
    <title>Edit profile | Astre</title>
    <link rel="stylesheet" href="public/css/style.css"/>
</head>

<body>
<div class="edit-profile-screen-background" style="overflow-y: scroll;">
    <nav class="navbar">
        <h2>EDIT PROFILE</h2>
        <a href="/profile" class="done-button">Done</a>
    </nav>
    <div class="edit-profile-photos-container">
        <div class="edit-profile-photo-container">
            <img src="public/uploads/<?= $userPhoto->getPhoto() ?>">
        </div>
    </div>
    <a href="/uploadPhoto">
        <button class="edit_profile_btn"><i class="fas fa-upload"></i></button>
    </a>
    <div class="edit-profile-bio">
        <h4>About me</h4>
        <form action="updateUserBio" method="post">
            <textarea id="user-bio" name="bio" maxlength="250"
                      placeholder="Tell something about yourself."><?= $userBio->getBio() ?></textarea>
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
        <a href="/select_location">
            <div class="edit-profile-choose-container">
                <?=$userLocation->getLocation();?>
                <div class="arrow-button">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="edit-profile-choose">
        <h4>Gender</h4>
        <a href="/select_gender">
            <div class="edit-profile-choose-container">
                <?= $userGender->getGender() ?>
                <div class="arrow-button">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>
    </div>
    <button
            class="edit_profile_btn" type="submit">Update
    </button>
    </form>
</div>
<script src="https://kit.fontawesome.com/8a50b84207.js" crossorigin="anonymous"></script>
</body>

</html>