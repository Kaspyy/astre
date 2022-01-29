let overallCompatibilityPercentage = document.querySelector(".overall-percentage-foreground-bar");
let loveCompatibilityPercentage = document.querySelector(".love-percentage-foreground-bar");
let sexCompatibilityPercentage = document.querySelector(".sex-percentage-foreground-bar");
let friendshipCompatibilityPercentage = document.querySelector(".friendship-percentage-foreground-bar");
let zodiacInfo = document.querySelector("#zodiacInfo");

function setCompatibility(element, percentage) {
    element.innerHTML = percentage.toString() + "%";
    element.style.width = percentage + "%";
    if (percentage >= 0 && percentage <= 29)
        element.style.backgroundColor = "#fd5068"
    if (percentage >= 30 && percentage <= 69)
        element.style.backgroundColor = "#ffea00"
    else if (percentage >= 70 && percentage <= 100)
        element.style.backgroundColor = "#1be4a1"
}

function setInfo(zodiacSign) {
    if (zodiacSign === "aries") {
        zodiacInfo.innerHTML = "Aries is by nature a fighter. This sign thrives on adventure and conflict. Aries wants a relationship that will bring excitement and likes to argue. This means that even the most compatible combinations for Aries will involve at least some volatility.";
    }
    if (zodiacSign === "taurus") {
        zodiacInfo.innerHTML = "Taurus is steady and stable. This sign is also highly domestic. In general, Taurus enjoys relationships and is highly sensuous. Yet, Taurus has a low activity level and prefers to stay home rather than go out. Taurus is also highly possessive and jealous, which can negatively impact relationships.";
    }
    if (zodiacSign === "gemini") {
        zodiacInfo.innerHTML = "Gemini is cheerful, friendly, and easy-going. This sign can go with the flow and adapt to almost anyone or anything. Yet, Gemini is easily bored and can quickly lose interest in a relationship. This can make it hard for Gemini natives to have lasting partnerships.";
    }
    if (zodiacSign === "cancer") {
        zodiacInfo.innerHTML = "Cancer is a natural parent and caregiver. This sign thrives in a domestic setting and is completely devoted to a partner. On the other hand, Cancer can also be quite moody, and not every sign wants the kind of life that Cancer dreams of."
    }
    if (zodiacSign === "leo") {
        zodiacInfo.innerHTML = "Leo is a bright, shining star, who loves to be the center of attention. Yet, there is nothing shallow about Leo. This sign is dedicated and loyal to a partner and is quite stable in relationships. On the other hand, Leo will wither without enough attention and this can get tiring to some signs."
    }
    if (zodiacSign === "virgo") {
        zodiacInfo.innerHTML = "Virgo is a modest and hard-working sign, who desires to be of service. This sign is a loyal and devoted partner. Yet, Virgo is also famous for being a perfectionist and can have a bad habit of being overcritical of others."
    }
    if (zodiacSign === "libra") {
        zodiacInfo.innerHTML = "Relationships are the lifeblood of Libra. The symbol for this sign is the scales, and Libra needs the balance of a partnership. On the other hand, Libra is positively allergic to conflict and has an indirect communication style that can be baffling to other signs."
    }
    if (zodiacSign === "scorpio") {
        zodiacInfo.innerHTML = "Scorpio has a reputation for being passionate and excellent in the bedroom. Yet, this sign is completely devoted to a partner and wants to connect on an emotional level as well as a physical one. Scorpio has intense emotions and a tendency to become quite jealous."
    }
    if (zodiacSign === "sagittarius") {
        zodiacInfo.innerHTML = "Sagittarius is pleasant, easy-going, and entertaining. This sign has a great sense of humor and tends to be the life of a party. When it comes to relationships, however, Sagittarius tends to shy away from commitments, valuing freedom above all other concerns."
    }
    if (zodiacSign === "capricorn") {
        zodiacInfo.innerHTML = "Capricorn is an ambitious and hard-working sign. Natives of this sign take everything that they do seriously, including their relationships. Capricorn is extremely practical, and in general, natives of this sign do not marry only for love. Even so, Capricorn can be quite devoted and loving to a partner."
    }
    if (zodiacSign === "aquarius") {
        zodiacInfo.innerHTML = "Aquarius natives pride themselves on being individualistic and independent. It can take Aquarius a long time to decide to enter into a relationship. Once this sign does, however, Aquarius can be remarkably stable. Aquarius does not compromise well, though, and can be quite stubborn."
    }
    if (zodiacSign === "pisces") {
        zodiacInfo.innerHTML = "Pisces is a deeply romantic sign, who is capable of extreme sacrifices on behalf of a loved one. This sign is gentle, kind, and spiritual. On the other hand, this sign can have some difficulties when it comes to the practicalities involved in sustaining a relationship."
    }
}

function checkCompatibility() {
    let percentage1 = Math.floor(Math.random() * 100);
    let percentage2 = Math.floor(Math.random() * 100);
    let percentage3 = Math.floor(Math.random() * 100);
    let percentage4 = Math.floor(Math.random() * 100);
    setCompatibility(overallCompatibilityPercentage, percentage1);
    setCompatibility(loveCompatibilityPercentage, percentage2);
    setCompatibility(sexCompatibilityPercentage, percentage3);
    setCompatibility(friendshipCompatibilityPercentage, percentage4);

    if (otherZodiacSign === "♈︎") {
        setInfo("aries");
    }
    if (otherZodiacSign === "♉︎") {
        setInfo("taurus");
    }
    if (otherZodiacSign === "♊︎") {

        setInfo("gemini");
    }
    if (otherZodiacSign === "♋︎") {

        setInfo("cancer");
    }
    if (otherZodiacSign === "♌︎") {

        setInfo("leo");
    }
    if (otherZodiacSign === "♍︎") {

        setInfo("virgo");
    }
    if (otherZodiacSign === "♎︎") {

        setInfo("libra");
    }
    if (otherZodiacSign === "♏︎") {

        setInfo("scorpio");
    }
    if (otherZodiacSign === "♐︎") {

        setInfo("sagittarius");
    }
    if (otherZodiacSign === "♑︎") {

        setInfo("capricorn");
    }
    if (otherZodiacSign === "♒︎") {

        setInfo("aquarius");
    }
    if (otherZodiacSign === "♓︎") {

        setInfo("pisces");
    }

}