let menu = document.querySelector(".menu");
let burger = document.querySelector("#burger_container");

burger.addEventListener('click', () => {
    if (!menu.classList.contains("menu_opened")) {
        menu.style.opacity = "1";
        menu.style.visibility = "visible";
        menu.classList.add("menu_opened");
        burger.style.transform = "rotate(90deg)";
    }
    else {
        menu.style.opacity = "0";
        menu.style.visibility = "hidden";
        menu.classList.remove("menu_opened");
        burger.style.transform = "rotate(0deg)";
    }
});

menu.addEventListener('mouseout', (event) => {
    let relatedTarget = event.relatedTarget;

    if (!menu.contains(relatedTarget) && !burger.contains(relatedTarget)) {
        setTimeout(() => {
            if (!burger.matches(':hover') && !menu.matches(':hover')) {
                menu.style.opacity = "0";
                menu.style.visibility = "hidden";
                menu.classList.remove("menu_opened");
                burger.style.transform = "rotate(0deg)";
            }
        }, 300);
    }
});