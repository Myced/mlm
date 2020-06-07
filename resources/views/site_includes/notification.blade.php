<script type="text/javascript">

@if($flash = session('success'))
    notify("{{ $flash }}", 'success')
@endif

@if($flash = session('primary'))
    notify("{{ $flash }}",'primary')
@endif

@if($flash = session('warning'))
    notify("{{ $flash }}", 'warning')
@endif

@if($flash = session('danger'))
    notify("{{ $flash }}", 'error')
@endif

@if($flash = session('error'))
    notify("{{ $flash }}", 'error')
@endif

@if($flash = session('info'))
    notify("{{ $flash }}", 'info')
@endif
</script>
