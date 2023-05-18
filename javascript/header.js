function arrangeSizeHeader() {
    var x = document.getElementsByTagName("header")[0];
    if (x.className === "") {
        x.className = "responsive";
    } else {
        x.className = "";
    }
}