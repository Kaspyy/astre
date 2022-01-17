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
    <a href="/swipe" class="active tab">
        <i class="fas fa-heart"></i>
    </a>
    <a href="/chats" class="tab">
        <i class="fas fa-comments"></i>
    </a>
    <a href="/profile" class="tab">
        <i class="fas fa-user"></i>
    </a>
</ul>
<div class="astre">
    <div class="astre--status">
        <i class="fas fa-times"></i>
        <i class="fa fa-heart"></i>
    </div>
    <div class="astre--cards">
        <?php foreach ($profiles as $profile): ?>
            <div class="astre--card" style="overflow-y: scroll">
                <div class="photo-and-text-content">
                    <div class="photo">
                        <img src="public/uploads/<?= $profile->getPhoto() ?>">
                        <div class="zodiac-sign"><?= $profile->getZodiacSign() ?></div>
                    </div>
                    <div class="photo-text">
                        <div class="photo-name-and-age">
                            <h2><?= $profile->getName() ?></h2>
                            <h2><?= $profile->getAge() ?></h2>
                        </div>
                        <div class="info">
                            <div class="localization">
                                <i class="fas fa-map-marker-alt"></i>
                                <h3>Cracow</h3>
                            </div>
                            <div class="sex">
                                <i class="fas fa-user"></i>
                                <h3><?= $profile->getGender() ?></h3>
                            </div>
                        </div>
                        <h4>About me</h4>
                        <div class="photo-bio">
                            <?= $profile->getBio() ?>
                        </div>
                        <hr/>
                        <div class="hobbies">
                            <h4>Hobbies</h4>
                            <div class="hobby">music</div>
                            <div class="hobby">walks</div>
                            <div class="hobby">workout</div>
                        </div>
                        <hr/>
                        <div class="compatibility">
                            <h4>Compatibility</h4>
                            <div class="zodiac-signs-container">
                                <div class="user-zodiac-sign-container">
                                    <div class="user-zodiac-sign">
                                        <div class="sign-icon">
                                            <?= $userDetails->getZodiacSign() ?>
                                        </div>
                                        <div class="user-zodiac-sign-indicator">You</div>
                                    </div>
                                </div>
                                <i class="fas fa-plus"></i>
                                <div class="their-zodiac-sign"><?= $profile->getZodiacSign() ?></div>
                            </div>
                            <div class="percentages-container">
                                <div class="overall-percentage-container">
                                    <div class="overall-percentage-background-bar">
                                        <div class="overall-percentage-foreground-bar">50%</div>
                                    </div>
                                </div>
                                <div class="other-percentages-container">
                                    <div class="other-percentage-container">
                                        <h4>Love</h4>
                                        <div class="other-percentage-background-bar">
                                            <div class="love-percentage-foreground-bar">40%</div>
                                        </div>
                                    </div>
                                    <div class="other-percentage-container">
                                        <h4>Sex</h4>
                                        <div class="other-percentage-background-bar">
                                            <div class="sex-percentage-foreground-bar">80%</div>
                                        </div>
                                    </div>
                                    <div class="other-percentage-container">
                                        <h4>Friendship</h4>
                                        <div class="other-percentage-background-bar">
                                            <div class="friendship-percentage-foreground-bar">60%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="photo-bio">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel sequi ipsam temporibus
                                corporis
                                rerum delectus provident placeat amet ut necessitatibus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="astre--buttons">
        <button id="nope">
            <i class="fas fa-times"></i>
        </button>
        <button id="love">
            <i class="fas fa-heart"></i>
        </button>
    </div>
</div>
<script
        src="https://kit.fontawesome.com/8a50b84207.js"
        crossorigin="anonymous"
></script>
<script type="text/javascript" src="/public/js/hammer.min.js"></script>
<script src="/public/js/cards.js"></script>
<script src="/public/js/compatibility.js"></script>
</body>
</html>
