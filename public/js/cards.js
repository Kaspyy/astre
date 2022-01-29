'use strict';

const astreContainer = document.querySelector('.astre');
const allCards = document.querySelectorAll('.astre--card');
const nope = document.getElementById('nope');
const love = document.getElementById('love');
const userId = document.querySelector("[name='userId']").value;
const messages = document.querySelector(".messages p");
let targetUserId = 0;
let otherZodiacSign = '';
const image = document.querySelector(".image");
let userZodiacSign = null;

function like(userId, targetUserId) {
    fetch(`/giveLike/${userId}/${targetUserId}`)
        .then(function () {
            console.log("love " + userId + " " + targetUserId);
        });
}

function initCards(card, index) {
    const newCards = document.querySelectorAll('.astre--card:not(.removed)');


    newCards.forEach(function (card, index) {
        card.style.zIndex = allCards.length - index;
        card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
        card.style.opacity = (10 - index) / 10;
    });

    if (newCards.length !== 0) {
        userZodiacSign = document.querySelector(".sign-icon").textContent.trim();
        targetUserId = newCards[0].children[0].value;
        otherZodiacSign = newCards[0].querySelector(".their-zodiac-sign").textContent.trim();
        overallCompatibilityPercentage = newCards[0].querySelector(".overall-percentage-foreground-bar");
        loveCompatibilityPercentage = newCards[0].querySelector(".love-percentage-foreground-bar");
        sexCompatibilityPercentage = newCards[0].querySelector(".sex-percentage-foreground-bar");
        friendshipCompatibilityPercentage = newCards[0].querySelector(".friendship-percentage-foreground-bar");
        zodiacInfo = newCards[0].querySelector("#zodiacInfo");
        checkCompatibility();
    }
    else {
        image.removeAttribute("hidden");
        image.style.display = "inline-block";
        messages.innerHTML = "No more new profiles";
    }
    console.log("loaded");
    astreContainer.classList.add('loaded');
}

initCards();

allCards.forEach(function (el) {
    let hammertime = new Hammer(el);

    hammertime.on('pan', function (event) {
        el.classList.add('moving');
    });

    hammertime.on('pan', function (event) {
        if (event.deltaX === 0) return;
        if (event.center.x === 0 && event.center.y === 0) return;

        astreContainer.classList.toggle('astre_love', event.deltaX > 0);
        astreContainer.classList.toggle('astre_nope', event.deltaX < 0);

        let xMulti = event.deltaX * 0.03;
        let yMulti = event.deltaY / 80;
        let rotate = xMulti * yMulti;

        event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
    });

    hammertime.on('panend', function (event) {
        el.classList.remove('moving');
        astreContainer.classList.remove('astre_love');
        astreContainer.classList.remove('astre_nope');

        let moveOutWidth = document.body.clientWidth;
        let keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

        event.target.classList.toggle('removed', !keep);

        if (keep) {
            event.target.style.transform = '';
        } else {
            let endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
            let toX = event.deltaX > 0 ? endX : -endX;
            let endY = Math.abs(event.velocityY) * moveOutWidth;
            let toY = event.deltaY > 0 ? endY : -endY;
            let xMulti = event.deltaX * 0.03;
            let yMulti = event.deltaY / 80;
            let rotate = xMulti * yMulti;

            event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
            if (event.deltaX > 0) {
                like(userId, targetUserId);
            } else
                console.log("nope " + targetUserId)
            initCards();
        }
    });
});

function createButtonListener(love) {
    return function (event) {
        let cards = document.querySelectorAll('.astre--card:not(.removed)');
        let moveOutWidth = document.body.clientWidth * 1.5;
        if (!cards.length) return false;

        let card = cards[0];
        console.log(cards)

        card.classList.add('removed');

        if (love) {
            card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
            like(userId, targetUserId);
        } else {
            card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
        }

        initCards();

        event.preventDefault();
    };
}

const nopeListener = createButtonListener(false);
const loveListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
love.addEventListener('click', loveListener);
