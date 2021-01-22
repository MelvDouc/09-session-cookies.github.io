// setTimeout(function() { window.location = "index.php"; }, 2000);

const fadeOutClass = document.getElementsByClassName('fade-out');
let fadeOut = (element) => {
    element.style.display ='none';
}

for(fadeOutElement of fadeOutClass){
    setTimeout(fadeOut(fadeOutElement), 10000);
};