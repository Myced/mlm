<script type="text/javascript">
function showNotification(colorName, text)
{
if (colorName === null || colorName === '') { colorName = 'primary'; }
    if (text === null || text === '') { text = 'Notification '; }

    var allowDismiss = true;

    var formattedText = "<strong>" + text + "</strong>";

    $.notify({
        message: formattedText
    },
    {
        status: colorName,
        allow_dismiss: allowDismiss,
        newest_on_top: true,
        timer: 3000,
        placement: {
            from: "top",
            align: "right"
        },
        animate: {
            enter: "animated fadeInRight",
            exit: "animated fadeOutRight"
        },

    });
}

@if($flash = session('success'))
    showNotification('success', "{{ $flash }}")
@endif

@if($flash = session('primary'))
    showNotification('primary', "{{ $flash }}")
@endif

@if($flash = session('warning'))
    showNotification('warning', "{{ $flash }}")
@endif

@if($flash = session('danger'))
    showNotification('danger', "{{ $flash }}")
@endif

@if($flash = session('error'))
    showNotification('danger', "{{ $flash }}")
@endif

@if($flash = session('info'))
    showNotification('info', "{{ $flash }}")
@endif
</script>
