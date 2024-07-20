function disableStylesheet() {
    document.styleSheets[3].disabled = 1;

}

function changeColor() {
    document.styleSheets[3].disabled = !document.styleSheets[3].disabled;
    let field = document.getElementById("AccessibilityField");

    if (document.styleSheets[3].disabled == 1) {
        field.style.backgroundColor = "#AAAAAA";
    } else {
        field.style.backgroundColor = "#222222";
    }
}

