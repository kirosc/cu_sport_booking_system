const MON = 0, TUE = 1, WED = 2, THU = 3, FRI = 4, SAT = 5, SUN = 6;
let startDay = moment();
moment(startDay).isoWeekday(1);
let endDay = startDay;
if (startDay.day() !== SUN - 1) {
    endDay = moment(startDay).day(SUN + 1);
}
console.log(startDay.format("YYYY-MM-DD"));
console.log(endDay.format("YYYY-MM-DD"));

Date.prototype.yyyymmdd = function () {
    var mm = this.getMonth() + 1; // getMonth() is zero-based
    var dd = this.getDate();

    return [this.getFullYear(), '-' +
    (mm > 9 ? '' : '0') + mm, '-' +
    (dd > 9 ? '' : '0') + dd
    ].join('');
};

function initializeRow(table) {
    $('td').remove();
    for (let i = 0; i <= 14; i++) {
        let lastRow = $('<tr/>').appendTo(table.find('tbody:last'));
        let startTime = (i + 8) % 12;
        let endTime = startTime + 1;
        if (startTime === 0) {
            startTime = 12;
        }
        let timeRange;

        if (i < 4) {
            startTime = startTime + ' a.m.';
            if (i === 3) {
                endTime = endTime + ' n.n.';
            } else {
                endTime = endTime + ' a.m.'
            }
        } else {
            endTime = endTime + ' p.m.';
            if (i === 4) {
                startTime = startTime + ' n.n.';
            } else {
                startTime = startTime + ' p.m.'
            }
        }

        timeRange = startTime + ' ~ ' + endTime;

        lastRow.append('<td class="time-range fit" data-slot-' + i + '>' + timeRange + '</td>');
        for (let j = MON; j <= SUN; j++) {
            lastRow.append('<td class="session" id="slot-' + j + '-' + i + '">' + '</td>');
        }
    }
}

function initializeSession(table) {
    let date = moment();
    let day = date.day();
    let hours = date.hours();
    console.log(hours);
    let currentSession;

    if (day === SUN && hours === 22) {
        // Sunday and after 10 p.m.
        day = 0;
        hours = 1;
    }
    currentSession = hours - 8;

    for (let col = MON; col < day; col++) {
        for (let row = 0; row <= 14; row++) {
            let selectedSession = '#slot-' + col + '-' + row;
            $(selectedSession).addClass('bg-danger');
            if (col === day - 1 && row === currentSession) {
                break;
            }
        }
    }
}

// Get the free time slot from rawJson based on given date and venueID
function getAvailableTimeSlot(json, date, venueID) {
    return json.filter(item => {
        return item['venue_id'] == venueID && item['date'] == date.format("YYYY-MM-DD");
    });
}

// Load all available session to the table
function loadAvailableSession(table, json) {

}

$(function () {
    let table = $('#table');
    initializeRow(table);
    initializeSession(table);
    // let rawJson = JSON.parse(atob($('script[type="text/json"]#' + 'base64-JSON').text().trim()));
    // Test JSON below
    let rawJson = JSON.parse('[{"venue_id":"16","date":"2019-04-07","availableTimeSlot":[4,5,6]},{"venue_id":"16","date":"2019-04-07","availableTimeSlot":[2,4,5]},{"venue_id":"31","date":"2019-04-07","availableTimeSlot":[5,6,7,8,9]}]');
    console.log(rawJson);
    let availableDate = moment('2019-04-07', 'YYYY-MM-DD')
    let venueID = 16; // TODO: Get from dropdown menu
    console.log(getAvailableTimeSlot(rawJson, availableDate, venueID))
});