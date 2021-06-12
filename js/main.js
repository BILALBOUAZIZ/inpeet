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

}

    if (id==2) {
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
}

    if (id==3) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#04AA6D'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#555';  }

    if (id==4) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#04AA6D'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#555';}

    if (id==5) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#04AA6D'; 
    mylogin.style.background = '#555'; }

    if (id==6) {myhome.style.background = '#555'; 
    mysearch.style.background = '#555'; 
    mycontact.style.background = '#555'; 
    mymenu.style.background = '#555'; 
    mypanel.style.background = '#555'; 
    mylogin.style.background = '#04AA6D'; }

    }
