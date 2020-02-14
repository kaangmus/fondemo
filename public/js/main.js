$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

    var allEditors = document.querySelectorAll('.ckeditor');
    for (var i = 0; i < allEditors.length; ++i) {
        
    }

    moment.updateLocale('en', {
        week: {
            dow: 1
        } // Monday is the first day of the week
    })

    $('.date').datetimepicker({
        format: 'MM/DD/YYYY',
        locale: 'en',
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.datetime').datetimepicker({
        format: 'MM/DD/YYYY HH:mm:ss',
        locale: 'en',
        sideBySide: true,
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss',
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.select-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select2').select2()

    $('.treeview').each(function () {
        var shouldExpand = false
        $(this).find('li').each(function () {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })
})
$(document).ready(function () {
    $('#chkBox').click(function () {
        if ($(this).is(':checked')) {
            $("#txt").dialog({
                close: function () {
                    $('#chkBox').prop('checked', false);
                }
            });
        } else {
            $("#txt").dialog('close');
        }
    });
});