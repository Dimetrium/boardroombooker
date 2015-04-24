    $(document).ready(function () {
        $('#dateRangePicker')
            .datepicker({
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                },
                format: 'mm/dd/yyyy',
                weekStart: 1,
                startDate: '04/20/2015',
                endDate: '12/30/2015',
                daysOfWeekDisabled: [0, 7]
            })
    });
