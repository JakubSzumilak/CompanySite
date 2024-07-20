let min = 10;
let max = 100;

let limit = 5;
let counter = 0;

function changeFont(amount) {

    if (counter + amount > limit || counter + amount < -limit)
    {
        return;
    }
    counter = counter + amount;
    let elements = document.getElementsByClassName('scallable');
    for (i = 0; i < elements.length; i++) {
        let el = elements[i];
        let style = window.getComputedStyle(el, null).getPropertyValue('font-size');
        let fontSize = parseFloat(style);

        let newSize = fontSize + amount;

        if (newSize > max) {
            newSize = max;
        } else if (newSize < min) {
            newSize = min;
        }
        el.style.fontSize = newSize + 'px';
    }
}

function toggleImages() {

    let imgField = document.getElementById('icons');

    let imgs = document.getElementsByTagName("img");
    for (i = 0; i < imgs.length; i++) {
        let img = imgs[i];

        if (img.parentNode.parentNode.isEqualNode(imgField)) {
            break;
        }
        if (img.style.visibility == 'hidden') {
            img.style.visibility = 'visible';
        } else {
            img.style.visibility = 'hidden';
        }
    }


}

function toggleImage(img) {
    if (img.style.visibility == 'hidden') {
        img.style.visibility = 'visible';
    } else {
        img.style.visibility = 'hidden';
    }
}

