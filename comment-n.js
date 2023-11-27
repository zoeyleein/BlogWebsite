let commentInput = document.querySelector(".comment");

let newComment=document.createElement('p');
document.querySelectorAll(".comment-group")[0].append(newComment);
newComment.textContent = commentInput;

