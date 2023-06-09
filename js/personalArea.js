function setInitialDisplay() {
    let zone1 = document.getElementById('zone1');
    let zone2 = document.getElementById('zone2');
    let zone3 = document.getElementById('zone3');
    let zone4 = document.getElementById('zone4');

    zone1.style.display = 'block';
    zone2.style.display = 'none';
    zone3.style.display = 'none';
    zone4.style.display = 'none';

    let button1 = document.getElementById('btn-1');
    button1.focus();
    button1.style.outline = '0';
}

window.onload = setInitialDisplay;

// use the querySelectorAll method to select all <div> elements whose id starts with "zone"
// using the attribute selector ^=. This allows you to target multiple <div>
// elements without explicitly specifying each one

let zones = document.querySelectorAll('div[id^="zone"]');

function toggleDisplay(zoneId) {
    for (let i = 0; i < zones.length; i++) {
        let zone = zones[i];

        if (zone.id === zoneId) {
            if (zone.style.display === 'block') {
                zone.style.display = 'none';
            } else {
                zone.style.display = 'block';
            }
        } else {
            zone.style.display = 'none';
        }
    }
}