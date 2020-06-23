
function home() {
    window.location.pathname = "Final Project/index.php";
}

function talkToUs() {
    window.location.pathname = "Final Project/contact.php";
}


function search() {
    var i, country, title, countryTXT, titleTXT;
    var input = document.getElementById("myInp");
    var filter = input.value.toUpperCase();
    var elems = document.getElementsByClassName("article");

    for (i = 0; i < elems.length; i++) {
        country = elems[i].getElementsByClassName("country")[0];
        countryTXT = country.textContent || country.innerHTML;
        if (countryTXT.toUpperCase().indexOf(filter) > -1) {
            elems[i].style.display = "";
        } else {
            elems[i].style.display = "none";
        }
        title = elems[i].getElementsByClassName("title")[0];
        titleTXT = title.textContent || title.innerHTML;
        if (titleTXT.toUpperCase().indexOf(filter) > -1) {
            elems[i].style.display = "";
        } else {
            elems[i].style.display = "none";
        }
    }
}