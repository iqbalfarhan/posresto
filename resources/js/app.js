import "./bootstrap";

function cetakStruk(url) {
    const showprint = window.open(url, "_blank", "height=600, width=400");

    showprint.addEventListener("load", function () {
        showprint.print();
        showprint.addEventListener("afterprint", function () {
            showprint.close();
        });
    });

    return false;
}

window.cetakStruk = cetakStruk;
