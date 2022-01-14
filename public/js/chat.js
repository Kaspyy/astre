const chatBox = document.querySelector('.chat-box');
const receiver = document.querySelector("[name='receiver_id']");
const sender = document.querySelector("[name='sender_id']");
const sendButton = document.querySelector('button');
const chatId = document.querySelector("[name='chat_id']");
const messageContent = document.querySelector('input[placeholder="Type a message here..."]');

console.log(receiver.value)
setInterval((sender, receiver) => refreshChat(sender,receiver), 1000, sender.value, receiver.value);

function refreshChat(sender, receiver) {
    console.log(sender, receiver)
    fetch(`/chatJS/${sender}/${receiver}`, {
        method: "GET"
    }).then(function (response) {
        return response.json();
    }).then(function(messages) {
        // console.log(messages);
        chatBox.innerHTML = "";
        loadMessages(messages)
    });
}

function loadMessages(messages) {
    messages.forEach (message => {
        // console.log(message);
        createMessage(message);
    });
}

function createMessage(message) {
    const messageTemplateOutgoing = document.querySelector("#message-template-outgoing");
    const messageTemplateIncoming = document.querySelector("#message-template-incoming");

    const cloneMessageIncoming = messageTemplateIncoming.content.cloneNode(true);
    const cloneMessageOutgoing = messageTemplateOutgoing.content.cloneNode(true);

    const contentIncoming = cloneMessageIncoming.querySelector("p");
    contentIncoming.innerHTML = message.message_content;

    const contentOutgoing = cloneMessageOutgoing.querySelector("p");
    contentOutgoing.innerHTML = message.message_content;

    if (message.sender_id == sender.value)
        chatBox.appendChild(cloneMessageOutgoing);
    else
        chatBox.appendChild(cloneMessageIncoming);
}

sendButton.addEventListener("click", function (event) {
    event.preventDefault();

    const data = {
        content: messageContent.value
    };
    // console.log(data);

    fetch(`/sendMessageJS/${chatId.value}/${sender.value}/${receiver.value}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function () {
        refreshChat(sender, receiver);
    });
});

