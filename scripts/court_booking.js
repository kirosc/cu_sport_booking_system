/*
   For ease of development, each time range is assigned with a unique index.
   Time range is fixed with index 0 = 8 a.m. ~ 9 a.m.; index 14 = 10 p.m. ~ 11 p.m.
 */
const MON = 0, SUN = 6;
let jsonResponse;
let checkedSession = [];
let today = moment();
let startDay = moment().set({hour: 0, minute: 0, second: 0, millisecond: 0});
let nextStartDay = startDay.clone().add(1, 'weeks').isoWeekday(MON + 1);
let prevStartDay = null;
let lastAvailableDay = null;
console.log('startDay' + startDay.format("YYYY-MM-DD, h:mm:ss a'"));
console.log('nextStartDay' + nextStartDay.format("YYYY-MM-DD, h:mm:ss a'"));
console.log(prevStartDay);

// Create rows with time range at first column
function initializeRow(table) {
    $('tbody').empty();
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

        // Add the HTML to the DOM
        // Add the id to the cell (booking session), slot-day-timeRange
        // day = 0 ~ 6, timeRange = 0 ~ 14, e.g. Tue 10 ~ 11 p.m. is slot-1-14
        lastRow.append('<td class="time-range fit" data-slot-' + i + '>' + timeRange + '</td>');
        for (let j = MON; j <= SUN; j++) {
            lastRow.append('<td class="session text-center" id="slot-' + j + '-' + i + '">' + '</td>');
        }
    }
}

/* Highlight the past time cell with red background
 */
function highlightPastTime() {
    let today = moment();

    // Get day of the week, Monday = 1; Sunday = 7
    let day = today.isoWeekday();
    let hours = today.hours();
    let currentTimeRange;

    // Sunday and after 10 p.m.
    if (day === SUN && hours === 22) {
        day = 0;
        hours = 1;
    }
    // Convert the current time to the time range index we used in the table
    currentTimeRange = hours - 8;

    for (let col = MON; col < day; col++) {
        for (let row = 0; row <= 14; row++) {
            // Before 8 a.m.
            if (col === day - 1 && currentTimeRange < 0) {
                break;
            }
            // Generate the element selector
            let selectedSession = '#slot-' + col + '-' + row;
            $(selectedSession).addClass('bg-danger');
            // Reach current hour
            if (col === day - 1 && row === currentTimeRange) {
                break;
            }
        }
    }
}

// Get the free time slot from rawJson based on given date and venueID
// @param {Object} json
// @param {Moment} date Requested date
// @param {String} venueID Selected venueID from dropdown

function getSessions(json, date, venueID) {
    return json.filter(item => {
        return item['venue_id'] == venueID && item['date'] == date;
    });
}

// Load all available day session to the table
// SHOULD pass only one date only to the function
// @param {Object} table Reference of the table element
// @param {Object} json
function loadDaySession(table, json) {
    if (json.length !== 1) {    // If jsonResponse is empty, i.e. no available session
        console.log('No session today');
        return;
    }
    let loadingDate = moment(json[0]['date']);
    json[0]['availableTimeSlot'].forEach(function (value) {
        let day = loadingDate.isoWeekday() - 1;
        // Select all available sessions that are not in the past
        let session = $('#slot-' + (day) + '-' + value + ':not(.bg-danger)');
        // No available session
        if (session.length === 0) {
            return;
        }
        let checkboxID = 'cb-' + (day) + '-' + value;
        // Add checkbox
        session.append(
            $('<div class=\"custom-control custom-checkbox text-center\">')
                .append('<input type="checkbox" class="custom-control-input text-center" name="time[' + checkboxID + ']" value="' + checkboxID + '" id="' + checkboxID + '">' +
                    '<label class="custom-control-label" for="' + checkboxID + '">'
                )
        );
    });
}

// Load all available week session to the table
// @param {Object} table Reference of the table element
// @param {Object} json
// @param {String} venueID Selected venueID from dropdown
// @param {Moment} mStartDay The earliest day that can book
// @param {Moment} mEndDay Sunday
function loadWeekSession(table, json, venueID, mStartDay, mEndDay) {
    console.log('mStartDay ' + mStartDay.format("YYYY-MM-DD, h:mm:ss a'"));
    console.log('mEndDay ' + mEndDay.format("YYYY-MM-DD, h:mm:ss a'"));

    let loadingDay = mStartDay.clone();
    let sunday = mEndDay.clone();
    while (true) {
        console.log('Loading day: ' + loadingDay.format('YYYY-MM-DD'));
        // Filter jsonResponse result by desired day
        let daySessions = getSessions(json, loadingDay.format('YYYY-MM-DD'), venueID);
        loadDaySession(table, daySessions);
        // Reach end of the week
        if (moment(loadingDay).isSame(sunday, 'date')) {
            break;
        }
        loadingDay.add(1, 'day');
    }
    // Highlight booked session
    $("td:not(:has(*)):not(.bg-danger, .time-range)").addClass('bg-warning').fadeTo(0, 0.8);
}

// Set available venueID to dropdown
function getVenue() {
    let college = $("#college").val();
    let sport = $("#sport").val();

    let params = {
        type: "POST",
        url: "util/search_venue_handler",
        dataType: 'json'
    };
    if (college !== 'None' && sport !== 'None') {
        params.data = {"college_id": college, "sport_id": sport};
    } else if (college !== 'None') {
        console.log('2');
        params.data = {"college_id": college};
    } else if (sport !== 'None') {
        params.data = {"sport_id": sport};
    } else {
        params.data = {};
    }

    $.ajax(params).done(result => {
        console.log(result);
        let html_string = "<option value='None' selected>-----</option>";
        for (let i = 0; i < result.length; i++) {
            html_string = html_string + '<option value="' + result[i].venue_id + '">' + result[i].venue + '</option>';
        }
        $("#venue")
            .find('option')
            .remove()
            .end()
            .append(html_string);
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.log('Request failed');
    });
}

// Update the week at the top left corner of the table
function updateDate() {
    let monday = startDay.clone().isoWeekday(1);
    let week = '' + monday.format('D/M') + ' ~ ' + monday.isoWeekday(7).format('D/M');
    $('.th-inner:first').html(week).css('text-align', 'center');
    updateTooltips();
}

// Update the content of the tooltip of the navigation buttons
function updateTooltips() {
    let prevButton = $('#prev');
    let nextButton = $('#next');
    let weekRange;
    if (!prevButton.hasClass('disabled')) {
        if (prevStartDay === null) {
            weekRange = '' + moment().format('D/M') + ' ~ ' + moment().isoWeekday(7).format('D/M');

        } else {
            weekRange = '' + prevStartDay.format('D/M') + ' ~ ' + prevStartDay.clone().isoWeekday(7).format('D/M');
        }
        prevButton.attr('data-original-title', weekRange);
    } else {
        prevButton.attr('data-original-title', 'No available session');
    }
    if (!nextButton.hasClass('disabled')) {
        weekRange = '' + nextStartDay.format('D/M') + ' ~ ' + nextStartDay.clone().isoWeekday(7).format('D/M');
        nextButton.attr('data-original-title', weekRange);
    } else {
        nextButton.attr('data-original-title', 'No available session');
    }
}

// Perform AJAX request to get the available sessions when venue is selected
// and update the table
// @param {Object} venueDropdown Reference of the venue dropdown
// @param {Object} table Reference of the table element
function getJSON(venueDropdown, table) {
    let venue_id = venueDropdown;
    $.ajax({
        type: "POST",
        url: "util/search_session_handler",
        data: {venue_id},
        dataType: 'json',
    })
        .done(result => {
            console.log('Request success');
            console.log('len' + result.length);
            if (result.length === 0) {
                console.log('Empty response');
                $('tbody').empty().append(
                    $('<tr class="no-records-found">')
                        .append('<td colspan="8" class="text-center">No available session</td>')
                );
                $('#next, #prev, #today').addClass('disabled');
                updateTooltips();
            } else {
                initializeRow(table);
                highlightPastTime();
                loadWeekSession(table, result, venue_id, startDay, startDay.clone().isoWeekday(SUN + 1));
                lastAvailableDay = moment(result[result.length - 1].date, 'YYYY-MM-DD');
                // If there is available session on next week
                if (lastAvailableDay.isAfter(startDay.clone().isoWeekday(SUN + 1), 'date')) {
                    $('#today, #next').removeClass('disabled');
                }
                updateTooltips();
                $('#today').attr('data-original-title', startDay.format('D/M'));
                jsonResponse = result;
            }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log('Request failed');
        });
}

// Reset everything to original state and hide the table
function resetTable() {
    jsonResponse = null;
    checkedSession = [];
    today = moment();
    startDay = moment().set({hour: 0, minute: 0, second: 0, millisecond: 0});
    nextStartDay = startDay.clone().add(1, 'weeks').isoWeekday(MON + 1);
    prevStartDay = null;
    lastAvailableDay = null;
    $('#booking-info-container').addClass('hidden');
    updateDate();
    updateTooltips();
}

$(function () {
    // Initialize Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    updateDate();
    let table = $('#table');

    // Dropdown listener
    $('select').change(function () {
        if (this.id === 'venue') {
            let venue_id = $(this).val();

            if (prevStartDay !== null) {
                resetTable();
            }
            if (venue_id === 'None') {
                $('.table-control-container').addClass('hidden');
            } else {
                $('.table-control-container').removeClass('hidden');
                getJSON($(this).val(), table);
            }
        } else {
            resetTable();
            $('.table-control-container').addClass('hidden');
        }
    });

    // Radio listener
    $('input[type=radio][name=is-share]').change(function () {
        if (this.value === '1') {
            $('#row-seat, #row-description').toggleClass('hidden');
            $('#seat').prop('required', true);
        } else {
            $('#row-seat, #row-description').toggleClass('hidden');
            $('#seat').prop('required', false);
        }
    });

    // Nav buttons listener
    $('button').click(function () {
        if ($(this).hasClass('disabled')) {
            return;
        }
        let venue_id = $('#venue').val();
        let value = $(this).val();
        let goToToday = () => {
            startDay = moment().set({hour: 0, minute: 0, second: 0, millisecond: 0});
            nextStartDay = startDay.clone().add(1, 'weeks').isoWeekday(MON + 1);
            prevStartDay = null;
            initializeRow(table);
            highlightPastTime();
            loadWeekSession(table, jsonResponse, venue_id, startDay, startDay.clone().isoWeekday(SUN + 1));
            $('#prev').addClass('disabled');
            $('#next').removeClass('disabled');
            updateDate();
        };

        if (value === 'prev') {
            checkedSession = [];
            // If last week and current week
            if (prevStartDay === null || prevStartDay.isSame(today, 'date')) {
                goToToday();
                $(this).tooltip('show');
                return;
            }
            // Swap value
            [prevStartDay, startDay] = [startDay, prevStartDay];
            [prevStartDay, nextStartDay] = [nextStartDay, prevStartDay];
            prevStartDay = null;
            initializeRow(table);
            loadWeekSession(table, jsonResponse, venue_id, startDay, startDay.clone().add(6, 'days'));
            updateDate();
            $(this).tooltip('show');
        } else if (value === "next") {
            checkedSession = [];
            if (venue_id === 'None' && jsonResponse === undefined) {
                return;
            }
            initializeRow(table);
            loadWeekSession(table, jsonResponse, venue_id, nextStartDay, nextStartDay.clone().add(6, 'days'));
            [prevStartDay, startDay] = [startDay, prevStartDay];
            [nextStartDay, startDay] = [startDay, nextStartDay];
            nextStartDay = startDay.clone().add(1, 'weeks').isoWeekday(MON + 1);
            console.log(prevStartDay.format("YYYY-MM-DD, h:mm:ss a'"));
            console.log(startDay.format("YYYY-MM-DD, h:mm:ss a'"));
            console.log(nextStartDay.format("YYYY-MM-DD, h:mm:ss a'"));

            // Change buttons appearance
            $('#prev').removeClass('disabled');
            if (lastAvailableDay.isBefore(nextStartDay, 'date')) {
                $('#next').addClass('disabled');
            }
            updateDate();
            $(this).tooltip('show');
        } else if (value === 'today') {
            checkedSession = [];
            if (startDay != null) {
                if (startDay.diff(moment(), 'days') === 0) {
                    return;
                }
            }
            goToToday();
        }
        console.log(value);
    });

    // Checkbox Listener
    $("body").change(function (event) {
        if ($(event.target).is('input:checkbox:checked')) {
            // User click to check a checkbox
            let id = event.target.id;
            let day, timeSlot;
            let isSameDay = true, isContinuous = false;
            day = id.substring(
                id.indexOf("-") + 1,
                id.lastIndexOf("-")
            );
            timeSlot = Number(id.substring(id.lastIndexOf("-") + 1));

            if (checkedSession.length === 0) {
                isContinuous = true;
            } else {
                checkedSession.forEach((value) => {
                    if (value.day !== day && isSameDay) {
                        alert('Only can select same day');
                        isSameDay = false;
                        $(event.target).prop("checked", false);
                    } else if ((timeSlot === value.timeSlot - 1 || timeSlot === value.timeSlot + 1) && !isContinuous) {
                        isContinuous = true;
                    }
                });
                if (isSameDay && !isContinuous) {
                    alert('Only can select continuous session');
                    $(event.target).prop("checked", false);
                }
            }
            // Record what user chooses
            if (isSameDay && isContinuous) {
                $('#slot-' + day + '-' + timeSlot).addClass('bg-success');
                checkedSession.push({
                    day: day,
                    timeSlot: timeSlot
                });
                checkedSession.sort((a, b) => a.timeSlot - b.timeSlot);
                $('#booking-info-container').removeClass('hidden');
            }
        } else if ($(event.target).is('input:checkbox:not(:checked)')) {
            // User click to uncheck a checkbox
            let id = event.target.id;
            let timeSlot = Number(id.substring(id.lastIndexOf("-") + 1));
            console.log('timeSlot ' + timeSlot);
            if (checkedSession.length !== 0 &&
                timeSlot !== checkedSession[0].timeSlot &&
                timeSlot !== checkedSession[checkedSession.length - 1].timeSlot) {
                alert('Only can select continuous session');
                $(event.target).prop("checked", true);
            } else {
                // Remove from list
                for (let i = 0; i < checkedSession.length; i++) {
                    if (checkedSession[i].timeSlot === timeSlot) {
                        $('#slot-' + checkedSession[i].day + '-' + timeSlot).removeClass('bg-success');
                        checkedSession.splice(i, 1);
                        break;
                    }
                }
                if (checkedSession.length === 0) {
                    $('#booking-info-container').addClass('hidden');
                }
            }
        }
    });

    // Add the booking date on submission
    $('form').submit(function () {
        let dayOfWeek = Number(checkedSession[0].day) + 1;
        let finalDate = startDay.clone().isoWeekday(dayOfWeek);
        $('<input />').attr('type', 'hidden')
            .attr('name', "date")
            .attr('value', finalDate.format("YYYY-MM-DD"))
            .appendTo('form');
    });
});
