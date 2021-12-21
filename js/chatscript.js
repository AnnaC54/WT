window.setInterval(function () {
    getMessages();
}, 1000);


function getMessages() {


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            var chat = document.getElementById("chat");
            chat.innerHTML = "";

            for (var i = 0; i < data.length; i++) {
                var date = new Date(data[i].time);
                var messagebox = document.createElement("div");
                messagebox.classList.add("row");
                var namebox = document.createElement("div");
                var textbox = document.createElement("div");
                var timebox = document.createElement("div");
                namebox.classList.add("col-2");
                textbox.classList.add("col-7");
                timebox.classList.add("col-3");
                timebox.classList.add("text-right");
                //messagebox.classList.add("messagebox");
                //textbox.appendChild(namebox);
                messagebox.appendChild(namebox);
                messagebox.appendChild(textbox);
                messagebox.appendChild(timebox);
                namebox.appendChild(document.createTextNode(data[i].from));
                textbox.appendChild(document.createTextNode(data[i].msg));
                timebox.appendChild(document.createTextNode(date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()));
                chat.appendChild(messagebox);
                //var userbox = document.createElement("span");

            }
        }
    };

    xmlhttp.open("GET", chatServer + "/" + chatCollectionId + "/message/" + chatGoal, true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + chatToken);
    xmlhttp.send();
}

function send() {
    let xmlhttp1 = new XMLHttpRequest();
    xmlhttp1.onreadystatechange = function () {
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 204) {
            console.log("done...");
        }
    };
    xmlhttp1.open("POST", chatServer + "/" + chatCollectionId + "/message", true);
    xmlhttp1.setRequestHeader('Content-type', 'application/json');
    // Add token, e. g., from Tom
    xmlhttp1.setRequestHeader('Authorization', 'Bearer ' + chatToken);
    // Create request data with message and receiver
    let message = document.getElementById('message').value;
    console.log(message);
    let data = {
        message: message,
        to: chatGoal
    };

    document.getElementById('message').value = "";
    let jsonString = JSON.stringify(data); // Serialize as JSON
    xmlhttp1.send(jsonString); // Send JSON-data to server

}