const MON = 0, TUE = 1, WED = 2, THU = 3, FRI = 4, SAT = 5, SUN = 7;

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
        console.log(timeRange + '\n');

        lastRow.append('<td class="time-range fit" data-slot-' + i + '>' + timeRange + '</td>');
        for (let j = MON; j < SUN; j++) {
            lastRow.append('<td class="session" data-session-' + j + '-' + i + '>' + '</td>');
        }
    }
}

$(function () {
    initializeRow($('#table'))
});