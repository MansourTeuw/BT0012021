
// Sub menu 

// const showSubMenu = () => {
//     let submenu = document.getElementById('submenu');
//     if (submenu.className.indexOf("w3-show") == -1) {
//         submenu.className += " w3-show";
//     } else {
//         submenu.className = submenu.className.replace(" w3-show", "");
//     }

// }

function showSubMenu() {
   let submenu = document.getElementById("submenu").length;
    document.getElementById("submenu").size = submenu
}




// Animation du slide 

let slideIndex = 0;



const showSlides = () => {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000);


}

showSlides();


























