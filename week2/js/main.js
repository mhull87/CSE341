function clickme() {
    alert('Clicked!');
}

function changecolor() {
    var color = document.getElementById('color').value;
    var div = document.getElementById('div1');
    div.style.backgroundColor = color;
}