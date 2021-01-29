


datum = new Date()
document.getElementById("vandaag").innerHTML = datum.getDate() + "-" + (datum.getMonth() + 1)
    + "-" + datum.getFullYear();