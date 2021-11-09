const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '<img src="static/images/icons/chatbox-icon.svg" />',
    isNotClicked: '<img src="static/images/icons/chatbox-icon.svg" />'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);



const btnSend = document.getElementById("btn");
const chat = document.getElementById("chat");

const getMessage = (msg) => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const response = xhr.responseText;
      const chatBody = document.querySelector(".chatbox__messages");
      const divCpu = document.createElement("div");
      divCpu.className = "messages__item messages__item--operator";
      divCpu.innerHTML = response;
      const divUser = document.createElement("div");
      divUser.className = "messages__item messages__item--visitor";
      divUser.textContent = msg;
      chatBody.append(divUser);
      setTimeout(() => {
        chatBody.append(divCpu);
      }, 600);
      $("#chatbox__messages").animate({ scrollTop: $("#chatbox__messages").prop("scrollHeight")}, 1000);
      //   console.log(divCpu);
    }
  };
  xhr.open("GET", "admin/chatBotModule/chat.php?msg=" + msg, true);
  xhr.send();
};

btnSend.addEventListener("click", (e) => {
  e.preventDefault();
  if (chat.value == "") {
  } else {
    getMessage(chat.value);
    chat.value = "";
  }
});
