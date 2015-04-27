

$(document).ready(function () {


    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    console.log(mm + '/' + dd + '/' + yyyy);

    $('#dateRangePicker')
        .datepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            },
            format: 'mm/dd/yyyy',
            weekStart: 1,
            startDate: mm + '/' + dd + '/' + yyyy,
            endDate: '12/30/2017',
            daysOfWeekDisabled: [0, 7]
        })
});
