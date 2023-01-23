const open = document.querySelector(".open");
const close = document.querySelector(".close");
const menu = document.querySelector(".menu");

open.addEventListener("click", ()=>{
    menu.classList.remove("hidden");
    document.body.style.overflow = "hidden";
});

close.addEventListener("click", ()=>{
    menu.classList.add("hidden");
    document.body.style.overflow = "scroll";
});