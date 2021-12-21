/*let addFriend = document.getElementById("friendRequest");
addFriend.addEventListener('click', function () {

    let friendName = document.getElementById("name-span").textContent;
    //lert(friendName);
    let modalHeader = document.getElementById("modalFriendRequestHeader");
    modalHeader.innerText = "Friend Request from " + friendName;
}); */

var requestModal = new bootstrap.Modal(document.getElementById("exampleModal"));
function openModal(){
    requestModal.show();
}