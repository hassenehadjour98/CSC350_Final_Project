function disableOther(current, otherId) {
    var other = document.getElementById(otherId);

    if (current.value != "") {
        other.disabled = true;
        other.value = "";
        other.style.backgroundColor = "#bbb";
    } else {
        other.disabled = false;
        other.style.backgroundColor = "#d9d9d9";
    }

    updateTotal();
}

function updateTotal() {
    var total = 0;

    for (var i = 0; i < 4; i++) {
        var dev = document.getElementById("dev" + i);
        var acc = document.getElementById("acc" + i);

        if (dev && dev.value != "") {
            total += parseInt(dev.value);
        } else if (acc && acc.value != "") {
            total += parseInt(acc.value);
        }
    }

    document.getElementById("total-display").innerHTML = total;
}