const MON = 0, TUE = 1, WED = 2, THU = 3, FRI = 4, SAT = 5, SUN = 6;
let startDay = moment().set({hour: 0, minute: 0, second: 0, millisecond: 0});
let endDay = moment().set({hour: 23, minute: 59, second: 59, millisecond: 9});
if (startDay.isoWeekday() !== SUN - 1) {
    endDay = moment(endDay).day(SUN + 1);
}
console.log(startDay.format("YYYY-MM-DD, h:mm:ss a'"));
console.log(endDay.format("YYYY-MM-DD, h:mm:ss a'"));

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
            lastRow.append('<td class="session text-center" id="slot-' + j + '-' + i + '">' + '</td>');
        }
    }
}

function initializeSession(table) {
    let date = moment();
    let day = date.isoWeekday();
    let hours = date.hours();
    let currentSession;

    if (day === SUN && hours === 22) {
        // Sunday and after 10 p.m.
        day = 0;
        hours = 1;
    }
    currentSession = hours - 8;

    for (let col = MON; col < day; col++) {
        for (let row = 0; row <= 14; row++) {
            // Before 8 a.m.
            if (col === day - 1 && currentSession < 0) {
                break;
            }
            let selectedSession = '#slot-' + col + '-' + row;
            $(selectedSession).addClass('bg-danger');
            // Reach current hour
            if (col === day - 1 && row === currentSession) {
                break;
            }
        }
    }
}

// Get the free time slot from rawJson based on given date and venueID
function getSessions(json, date, venueID) {
    return json.filter(item => {
        return item['venue_id'] == venueID && item['date'] == date;
    });
}

// Load all available session to the table
// SHOULD pass only one date only to the function
function loadDaySession(table, json) {
    if (json.length !== 1) {
        return;
    }
    let loadingDate = moment(json[0]['date']);
    json[0]['availableTimeSlot'].forEach(function (value) {
        let day = loadingDate.isoWeekday() - 1;
        let session = $('#slot-' + (day) + '-' + value + ':not(.bg-danger)');
        console.log('#slot-' + (day) + '-' + value + ':not(.bg-danger)');
        if (session.length === 0) {
            return;
        }
        let checkboxID = 'cb-' + (day) + '-' + value;
        session.append(
            $('<div class=\"custom-control custom-checkbox text-center\">')
                .append('<input type="checkbox" class="custom-control-input text-center" id="' + checkboxID + '">' +
                    '<label class="custom-control-label" for="' + checkboxID + '">'
                )
        );
    });
}

function loadWeekSession(table, json, venueID) {
    let loadingDay = startDay.clone();
    while (true) {
        console.log('loading: ' + loadingDay.format('YYYY-MM-DD'));
        let daySessions = getSessions(json, loadingDay.format('YYYY-MM-DD'), venueID);
        loadDaySession(table, daySessions);
        if (moment(loadingDay).isSame(endDay, 'date')) {
            break;
        }
        loadingDay.add(1, 'day');
    }
}

$(function () {
    let table = $('#table');
    initializeRow(table);
    initializeSession(table);
    let rawJson = JSON.parse(atob($('script[type="text/json"]#' + 'base64-JSON').text().trim()));
    console.log(rawJson);
    let availableDate = moment('2019-04-06', 'YYYY-MM-DD');
    let venueID = 16; // TODO: Get from dropdown menu
    // console.log(getSessions(rawJson, availableDate, venueID))
    // loadDaySession(table, getSessions(rawJson, availableDate, venueID))
    loadWeekSession(table, rawJson, venueID);
});