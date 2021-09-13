(function($) {

    /*
    |------------------------------------------------------------------------------------
    | Init DateTime
    |------------------------------------------------------------------------------------
    */
   $('.datetime').datetimepicker({
        format: 'Y-m-d H:i'
    })
    $('.date').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    })

})(jQuery)
