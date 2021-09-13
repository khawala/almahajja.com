(function($) {

    new ClipboardJS('.btn');

    
    /*
    |------------------------------------------------------------------------------------
    | Data Table
    |------------------------------------------------------------------------------------
    */
    function strip(html)
    {
       var tmp = document.createElement("DIV")
       tmp.innerHTML = html
       return tmp.textContent || tmp.innerText || ""
    }
    var table = $('.data-tables').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this
                var select = $('<input type="text" class="form-control" />')
                    .appendTo( $(column.header()) )
                    .on( 'keyup', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        )
 
                        column
                            .search( val ? val : '', true, false )
                            .draw()
                    } )
 
                // column.data().unique().sort().each( function ( d, j ) {
                //     x = strip(d)
                //     select.append( '<option value="'+x+'">'+x+'</option>' )
                // } )
            } )
        },
        "sDom": 'T<"clear ">lfrtip',
        'aaSorting': [],
        'language': {
            // 'url': '/assets/i18n/dataTables-french.json'
            'url' : '/plugins/i18n/dataTables-arabic.json'
            // More languages : http://www.datatables.net/plug-ins/i18n/
        }
    })


    /*
    |------------------------------------------------------------------------------------
    | Init DateTime
    |------------------------------------------------------------------------------------
    */
    $('.datetime').datetimepicker({
        format: 'Y-m-d H:i'
    })
    $('.date').datetimepicker({
        format: 'Y-m-d'
    })

    /*
    |------------------------------------------------------------------------------------
    | We change select we send the form
    |------------------------------------------------------------------------------------
    */
    $('select.onchange').change(function() {
        // $(this).parents('form').submit()
        $(this).closest('form')[0].submit();
    })


    /*
    |------------------------------------------------------------------------------------
    | Chosen
    |------------------------------------------------------------------------------------
    */
    if ($('select.chosen-rtl').length > 0 && !isMobile()) {
        // alert(1)
        $('select.chosen-rtl').chosen({
            no_results_text: "عفوا، تم العثور على أي شيء!",
            placeholder_text_single: "إختيار أحد الخيارات",
            placeholder: "إختيار أحد الخيارات"
        })
        $('select.chosen-rtl').addClass('desktop')
    }

    /*
    |------------------------------------------------------------------------------------
    | Submit delete form
    |------------------------------------------------------------------------------------
    */
    $(document).on('click', "form.delete button", function(e) {
        var _this = $(this)
        e.preventDefault()
        swal({
            title: 'سيتم حذف البيانات',   
            text: 'هل أنت متأكد ؟',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            confirmButtonText: 'نعم، بالتأكيد!',   
            cancelButtonText: 'إلغاء',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {
                _this.closest("form").submit()
            }
        })
    })

    /*
    |------------------------------------------------------------------------------------
    | Open active menu
    |------------------------------------------------------------------------------------
    */
    $('.treeview-menu .active')
    .closest('.treeview-menu')
        .addClass('menu-open')
        .slideDown()
    .closest('.treeview')
        .addClass('active')

    /*
    |------------------------------------------------------------------------------------
    | Disable form
    |------------------------------------------------------------------------------------
    */
    $("form.disabled :input").prop("disabled", true)

    $(".print-btn").click(()=>{
        window.print()
    })

    $('form:not(.delete):not(.send):not([target=_blank])').submit(function(){
        $('form').find('button:not(.print)').attr('disabled','disabled')
        $(this).submit()
    })

    $('.one-click').click(function(e){
        e.preventDefault()
        $(this).attr('disabled','disabled')
        window.location = $(this).attr('href')
    })
    
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
    }

})(jQuery)
