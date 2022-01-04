//on click -> open bootstrap modal
var removeFriendModal = new bootstrap.Modal(document.getElementById("cancelFriendshipModal"));

function openModal($friendname) {
    removeFriendModal.show();
    document.getElementById("cancelFriendshipLabel").innerHTML = "Remove <?= $friendname ?> as Friend";

    // -> Jup, skip em: -> create Form with two hidden input fields to give name="action"+value="remove-friend" PLUS name="friendName"+value=§friendname to friends.php

    //Shiny nice Lösung
    //document.location.href = „sometarget.php?username=…“

    document.getElementById("cancelFriendship").onclick = function () {

        const newPostForm = document.createElement("form");
        newPostForm.method = "post";
        newPostForm.action = "friends.php";
        // newPostForm.name = "myform";

        // create hidden Input Fields -> give friends.php

        const hiddenInput = document.createElement("input");
        const friendName = document.createElement("input");

        hiddenInput.type = "hidden";
        hiddenInput.name = "remove";
        hiddenInput.value = "skipfriend";

        friendName.type = "hidden";
        friendName.name = "friend";
        friendName.value = "<?= $friendname ?>";

        newPostForm.appendChild(hiddenInput);
        newPostForm.appendChild(friendName);

        document.getElementById("cancelFriendshipModal").appendChild(newPostForm);
        newPostForm.submit(); // -> submit() method is provided by object , see -> https://www.javascript-coder.com/javascript-form/javascript-form-submit/
    };
}