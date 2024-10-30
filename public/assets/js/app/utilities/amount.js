function AmountKeyUp(input) {
    input.addEventListener("keyup", (event) => {
        if (event.isComposing) {
            return;
        }

        let amount = numberFormat(input.value);
        input.value = amount;
    });
}

function isNumber(evt, input, deposit) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 47 && charCode < 58) {
        return true;
    }
    return false;
}

function numberFormat(n) {
    let number = n.toString();
    number = number.replaceAll(',', '').replaceAll('.', '').replace(/^0+/, '');

    if (number.length === 0) {
        return "0,00";
    }

    if (number.length === 1) {
        return "0,0" + number;
    }

    if (number.length === 2) {
        return "0," + number;
    }
    number = number.replace(/^0+/, '');
    let firstPart = number.substr(0, number.length - 2);
    let divided = Object.assign([], firstPart);
    if (divided.length > 3) {
        let times3 = divided.length / 3;
        if (Number.isInteger(times3)) {
            times3--;
        } else {
            times3 = Math.floor(times3);
        }

        if (times3 > 0) {
            let count = 0;
            for (let i = divided.length - 3; i > 0; i = i - 3) {
                divided.splice(i, 0, '.');
                count++;
                i = times3 === count ? 0 : i;
            }
        }
    }
    firstPart = divided.join('');
    let lastPart = number.substr(-2, 2);
    let formattedNumber = firstPart + "," + lastPart;
    return formattedNumber;
}