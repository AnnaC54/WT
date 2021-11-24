
window.setInterval(function () {
    getMessages();
}, 1000);


function getMessages() {


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);



            // console.log(data[1].from);

            //variables (lists in 3 divs) to save message values to

            var node = document.createElement("li");
            var user = document.getElementById("from");
            var textmsg = document.getElementById("textmessage");
            var clock = document.getElementById("time");

            var chat = document.getElementById("chat");
            chat.innerHTML = "";
            for (var i = 0; i < data.length; i++) {
                var date = new Date(data[i].time);
                //console.log(date.getHours());
                var messagebox = document.createElement("span");
                var namebox = document.createElement("span");
                var textbox = document.createElement("span");
                var timebox = document.createElement("span");
                messagebox.classList.add("messagebox");
                
                textbox.appendChild(namebox);
                messagebox.appendChild(textbox);
                messagebox.appendChild(timebox);
                namebox.classList.add("leftdiv");
                
                textbox.classList.add("centerdiv");
                timebox.classList.add("rightdiv");  
                namebox.appendChild(document.createTextNode(data[i].from));
                textbox.appendChild(document.createTextNode(data[i].msg));
                timebox.appendChild(document.createTextNode(date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()));
                chat.appendChild(messagebox);
                var userbox = document.createElement("span");

            }



        }

    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/e6cf9ca3-ab1f-4941-bdaf-441d8783950b/message/Jerry", true);
    // Add token, e. g., from Tom
    xmlhttp.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjM3NTAxMTUyfQ.TQ9KDbIYjR1ZV2nEXOHeAFq6wLeYNZZ8FI8nT2isYEo');
    xmlhttp.send();

}

function send(){
let xmlhttp1 = new XMLHttpRequest();
xmlhttp1.onreadystatechange = function () {
    if (xmlhttp1.readyState == 4 && xmlhttp1.status == 204) {
        console.log("done...");
    }
};
xmlhttp1.open("POST", "https://online-lectures-cs.thi.de/chat/e6cf9ca3-ab1f-4941-bdaf-441d8783950b/message", true);
xmlhttp1.setRequestHeader('Content-type', 'application/json');
// Add token, e. g., from Tom
xmlhttp1.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjM3NTAxMTUyfQ.TQ9KDbIYjR1ZV2nEXOHeAFq6wLeYNZZ8FI8nT2isYEo');
// Create request data with message and receiver
let data = {
    message: document.getElementById('message').value,
    to: "Jerry"
};
document.getElementById('message').value = "";
let jsonString = JSON.stringify(data); // Serialize as JSON
xmlhttp1.send(jsonString); // Send JSON-data to server
}

//document.getElementById("sendbutton").addEventListener("click", sendMessage());

