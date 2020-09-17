function toonmenu(toon) {
    if (toon == 'toon') {
        document.getElementById("menu").style.display = 'block';
    }
    else if (toon == 'sluit') {
        document.getElementById("menu").style.display = 'none';
    }
}


datum = new Date()
document.getElementById("vandaag").innerHTML = datum.getDate() + "-" + (datum.getMonth() + 1)
    + "-" + datum.getFullYear();