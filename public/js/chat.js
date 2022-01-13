

function refreshChat(sender, receiver) {
    console.log(sender, receiver)
    fetch(`/chatJS/${sender}/${receiver}`, {
        method: "GET"
    }).then(function (response) {
        return response.json();
    }).then(function(messages) {
        // console.log(messages);
    });
}

let receiver = document.querySelector("[name='receiver_id']");
let sender = document.querySelector("[name='sender_id']");

console.log(receiver.value)
setInterval((sender, receiver) => refreshChat(sender,receiver), 1000, sender.value, receiver.value);
