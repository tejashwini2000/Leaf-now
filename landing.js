"use strict";
function burgerClick() {
    const hamburger = document.querySelector('.hamburger');         
    const navLinks = document.querySelector('.nav-links');          
    const links = document.querySelectorAll(".nav-links li");       
    hamburger.addEventListener("click", function(event) {            
        navLinks.classList.toggle('open');                          
        links.forEach(function(link) {
            link.classList.toggle('fade');
        });
    });
}
function setupEventHandlers() {
    burgerClick();
}
function initialize() {
    setupEventHandlers();
}
$(initialize);