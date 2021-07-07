const mybar = document.querySelector('.icon-bar');
const mysearch = document.querySelector('#search');
const myhome = document.querySelector('#home');
const mycontact = document.querySelector('#contact');
const mymenu = document.querySelector('#menu');
const mylogin = document.querySelector('#login');
const mypanel = document.querySelector('#panier');
const myform = document.querySelector("#slider");
const inputSearch = document.querySelector("#input_search");
const searchButton = document.querySelector("#searchButton");
const sign_up_link = document.querySelector("#sign-up-link");
const sign_in_link = document.querySelector("#sign-in-link");
const container = document.querySelector("#sr")
const menucontainer = document.querySelector("#tab")
const contenttab = document.querySelector(".contenttab")
const ctct = document.querySelector("#ctct")

function setbutton(id) {
    if (id == 1) {
        //set background 
        myhome.style.background = '#04AA6D';
        mysearch.style.background = '#555';
        mycontact.style.background = '#555';
        mymenu.style.background = '#555';
        mypanel.style.background = '#555';
        mylogin.style.background = '#555';
        //action

        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'hide');

        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'sirlhih');
        contenttab.style.display = "none";

        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'so')

    }

    else if (id == 2) {
        //set background 
        myhome.style.background = '#555';
        mysearch.style.background = '#04AA6D';
        mycontact.style.background = '#555';
        mymenu.style.background = '#555';
        mypanel.style.background = '#555';
        mylogin.style.background = '#555';

        //action
        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-in');


        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'hide');

        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'sirlhih');
        contenttab.style.display = "none";


        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'so')
    }

    else if (id == 3) {
        myhome.style.background = '#555';
        mysearch.style.background = '#555';
        mycontact.style.background = '#04AA6D';
        mymenu.style.background = '#555';
        mypanel.style.background = '#555';
        mylogin.style.background = '#555';
        //action
        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'show');



        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'sirlhih');
        contenttab.style.display = "none";


        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'so')
    }

    else if (id == 4) {
        myhome.style.background = '#555';
        mysearch.style.background = '#555';
        mycontact.style.background = '#555';
        mymenu.style.background = '#04AA6D';
        mypanel.style.background = '#555';
        mylogin.style.background = '#555';

        //action

        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'ajilhna');
        if (isOpenaa) {

            contenttab.style.display = "none";
        }
        else {
            contenttab.style.display = "grid";
        }

        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'hide');
        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'so')

    }

    else if (id == 5) {
        myhome.style.background = '#555';
        mysearch.style.background = '#555';
        mycontact.style.background = '#555';
        mymenu.style.background = '#555';
        mypanel.style.background = '#04AA6D';
        mylogin.style.background = '#555';

        //action



        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'hide');
        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'sirlhih');
        contenttab.style.display = "none";


        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'so')

    }

    if (id == 6) {
        myhome.style.background = '#555';
        mysearch.style.background = '#555';
        mycontact.style.background = '#555';
        mymenu.style.background = '#555';
        mypanel.style.background = '#555';
        mylogin.style.background = '#04AA6D';

        //action


        var isOpenaa = menucontainer.classList.contains('ajilhna');
        menucontainer.setAttribute('class', isOpenaa ? 'sirlhih' : 'sirlhih');
        contenttab.style.display = "none";
        var isOpenat = ctct.classList.contains('show');
        ctct.setAttribute('class', isOpenat ? 'hide' : 'hide');


        var isOpena = container.classList.contains('si');
        container.setAttribute('class', isOpena ? 'so' : 'si');
        var isOpen = slider.classList.contains('slide-in');
        slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');


    }

}


sign_up_link.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
})

sign_in_link.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
})




function openIt(evt, Name) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(Name).style.display = "block";
    evt.currentTarget.className += " active";
}

//slide show
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
