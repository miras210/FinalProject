var slideIndex = 1;


function carousel() {
    var x = document.getElementById("slider");
    if (x == null || x==undefined) {
        console.log("NULL");
    }
    if (slideIndex==1) {
        x.style.backgroundImage = "url(imgs/firstPic.jpg)";
        document.getElementById("first").style.backgroundColor = "#FF0033";
        document.getElementById("second").style.backgroundColor = "#ffffff";
        document.getElementById("third").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "CHINEESE";
    }
    if (slideIndex==2) {
        x.style.backgroundImage = "url(imgs/secondPic.jpg)";
        document.getElementById("second").style.backgroundColor = "#FF0033";
        document.getElementById("first").style.backgroundColor = "#ffffff";
        document.getElementById("third").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "INDIAN";
    }
    if (slideIndex==3) {
        x.style.backgroundImage = "url(imgs/thirdPic.jpg)";
        document.getElementById("third").style.backgroundColor = "#FF0033";
        document.getElementById("second").style.backgroundColor = "#ffffff";
        document.getElementById("first").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "JAPANEESE";
    }
    slideIndex++;
    if (slideIndex > 3) {slideIndex = 1;}
    setTimeout(carousel, 5000);
}

function showDivs(n, element) {
    var x = document.getElementById("slider");
    var el = document.getElementById(element);
    if (n==1) {
        x.style.backgroundImage = "url(imgs/firstPic.jpg)";
        el.style.backgroundColor = "#FF0033";
        document.getElementById("second").style.backgroundColor = "#ffffff";
        document.getElementById("third").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "CHINEESE";
    }
    if (n==2) {
        x.style.backgroundImage = "url(imgs/secondPic.jpg)";
        el.style.backgroundColor = "#FF0033";
        document.getElementById("first").style.backgroundColor = "#ffffff";
        document.getElementById("third").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "INDIAN";
    }
    if (n==3) {
        x.style.backgroundImage = "url(imgs/thirdPic.jpg)";
        el.style.backgroundColor = "#FF0033";
        document.getElementById("second").style.backgroundColor = "#ffffff";
        document.getElementById("first").style.backgroundColor = "#ffffff";
        document.getElementById("underline").innerHTML = "JAPANEESE";
    }
}

function scrollDown() {
    window.scrollTo(0, 900);
}


function home() {
    window.location.pathname = "Final Project/index.php";
    console.log("HEY WTF");
}

function talkToUs() {
    window.location.pathname = "Final Project/contact.php";
}
