//update slide bars values when they are moving
var angles2 = document.getElementsByTagName('input');
var spans = document.getElementsByTagName('span');

function showAngles() {
    for (var i = 0; i < spans.length; i++) {
        spans[i].innerText = angles2[i].value;
    }
}
showAngles();

for (var i = 0; i < 6; i++) {
    angles2[i].addEventListener("input", showAngles);
}


