var form = document.querySelector("#chatform")
var Input = document.querySelector("#messageInput");
var incoming_id = form.querySelector(".incoming_id").value;
var chatBox = document.querySelector("#chatbox");
const now = new Date();
// Format the time as HH:MM:SS
const hours = now.getHours().toString().padStart(2, '0');
const minutes = now.getMinutes().toString().padStart(2, '0');
const seconds = now.getSeconds().toString().padStart(2, '0');
var timeString = `${hours}:${minutes}:${seconds}`;
// form submit
  form.onsubmit = (e) => {
    e.preventDefault();
  let xhr = new XMLHttpRequest();
  xhr.open("POST", 'func/chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      // const father = document.createElement("div");
      // const child = document.createElement("div");
      // const p = document.createElement("p");
      // const span = document.createElement("span");
      // father.className = "space-y-2 flex flex-col items-end";
      // p.className =
      //   "bg-blue-500 text-white px-4 py-2 text-sm leading-4 rounded-full shadow border border-blue-50";
      // span.className =
      //   "text-[9px] flex justify-end pr-2  leading-4 italic text-right font-sans text-black";
      // span.style = "font-size: 12px;";
      // p.innerHTML = Input.value;
      // span.innerHTML = timeString;
      // child.appendChild(p);
      // child.appendChild(span);
      // father.appendChild(child);
      // chatBox.appendChild(father);
      Input.value = "";
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}
chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/RenderSender.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
    
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id=" + incoming_id);
}, 500);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
  
