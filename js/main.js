const mybar=document.querySelector('.icon-bar');
const mysearch=document.querySelector('#search');
const myhome=document.querySelector('#home');
const mycontact=document.querySelector('#contact');
const mymenu=document.querySelector('#menu');
const mylogin=document.querySelector('#login');
const mypanel=document.querySelector('#panier');
const myform=document.querySelector("#slider");


function setbutton(id) {
    if (id==1) {
    //set background 
    myhome.style.background = '#04AA6D'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#555'; 
    //action

    var isOpen = slider.classList.contains('slide-in');
    slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so': 'so' )

}

    else if (id==2) {
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
    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so': 'so' )   
}

    else if (id==3) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#04AA6D'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#555';
    //action
    var isOpen = slider.classList.contains('slide-in');
    slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so': 'so' )   
}

    else if (id==4) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#04AA6D'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#555';
    
    //action
    var isOpen = slider.classList.contains('slide-in');
    slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so': 'so' )

}

    else if (id==5) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#04AA6D'; 
    mylogin.style.background = '#555';

    //action

    var isOpen = slider.classList.contains('slide-in');
    slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');
    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so': 'so' )

}

    if (id==6) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#04AA6D'; 

    //action

    var isOpena = container.classList.contains('si');
    container.setAttribute('class', isOpena ? 'so' : 'si');
    var isOpen = slider.classList.contains('slide-in');
    slider.setAttribute('class', isOpen ? 'slide-out' : 'slide-out');


}

    }

const sign_up_link = document.querySelector("#sign-up-link");
const sign_in_link = document.querySelector("#sign-in-link");
const container = document.querySelector("#sr")


sign_up_link.addEventListener("click", ()=>{
    container.classList.add("sign-up-mode");
})

sign_in_link.addEventListener("click", ()=>{
    container.classList.remove("sign-up-mode");
})