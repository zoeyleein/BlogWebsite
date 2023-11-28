/*
    Student: JingYi Li, Wei Deng
    File Name: comment.js
    Date of creating: Nov 27 2023
    Description: This allows user to make comment
*/
let commentInput = document.querySelector(".comment");

let newComment=document.createElement('p');
document.querySelectorAll(".comment-group")[0].append(newComment);
newComment.textContent = commentInput;

