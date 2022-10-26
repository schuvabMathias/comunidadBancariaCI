var select = document.getElementById("selectForma");


if (select.value == 'numero') {
    document.getElementById('valores').style.display = "block";
    document.getElementById('selection').style.display = "none";
}

if (select.value == 'tipo_cuenta') {
    document.getElementById('valores').style.display = "block";
    document.getElementById('selection').style.display = "none";
}


document.getElementById("selectForma").addEventListener("change", function () {
    document.getElementById('valores').style.display = this.value == "numero" ? "block" : "none";
    document.getElementById('selection').style.display = this.value == "tipo_cuenta" ? "block" : "none";
});