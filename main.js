// setTimeout(function() { window.location = "index.php"; }, 2000);

// const fadeOutClass = document.getElementsByClassName('fade-out');
// let displayNone = (element) => {
//     element.style.display ='none';
// }

// for(fadeOutElement of fadeOutClass){
//     setTimeout(displayNone(fadeOutElement), 10000);
// };

const allButtons = document.querySelectorAll(`button, input[type='submit']`);
const linkButtons = document.querySelectorAll('a > button');

let getRandomInteger = (min, max) => {
    return Math.floor(Math.random() * (max - min) ) + min;
}

for(button of allButtons){
    button.addEventListener('mouseover', function() {
        this.style.transform = 'rotate(' + getRandomInteger(1, 45) + 'deg)';
    });
    button.addEventListener('mouseout', function() {
        this.style.transform = 'none';
    })
}

for(linkButton of linkButtons){
    linkButton.parentElement.style.textDecoration = 'none';
}