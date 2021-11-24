//Teilaufgaben b: Mögliche Freunde

//In der Freundesliste soll bei der Eingabe eines Nutzernames im Formular zum Hinzufügen von neuen Freunden eine Liste mit möglichen Optionen unter der Eingabe angezeigt werden.

//Diese Liste soll sich mit jedem Tastaturanschlag aktualisieren und entsprechend filtern.

//Ein Klick auf einen Vorschlag in der Liste soll den Wert im Formularfeld einsetzen.

//Nutzen Sie hierfür aus den Dummy-Datensatz und Informationen die Server-Funktion List Users.

//Es ist darauf zu achten, dass das Formular nur abgesendet werden kann, wenn der Nutzername in der Liste existierte.

//Für die Erzeugung der Liste sind Methoden zur Manipulation und Erweiterung des DOM notwendig (vgl. Experimente).

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        let data = JSON.parse(xmlhttp.responseText);
        console.log(data);

        var list = document.getElementById("friendsList");
        data.forEach(element => {
            var listOption = document.createElement("option");
            listOption.value = element;
            list.appendChild(listOption);
        });
    }
};
xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/44de65ae-0bf9-424e-ae7b-4a851bdd84f3/user", true);
// Add token, e. g., from Tom
xmlhttp.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjM3MTgyNjI3fQ.WcP0yHyCKpg7UIbql8oQCXOZ8XKSArg1AY1s24Qv0pA');
xmlhttp.send();
