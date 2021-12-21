
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        let data = JSON.parse(xmlhttp.responseText);
        console.log("Token: " + data.token);
    }
};
xmlhttp.open("POST", "https://online-lectures-cs.thi.de/chat/1c4e8ce9-ddfa-4d80-8b43-b77fa5b8ba4c/register", true);
xmlhttp.setRequestHeader('Content-type', 'application/json');
// Create request data with message and receiver
let data = {
    username: "Tom",
    password: "12345678"
};
let jsonString = JSON.stringify(data); // Serialize as JSON
xmlhttp.send(jsonString); // Send JSON-data to server

function validateForm(){
    
} 