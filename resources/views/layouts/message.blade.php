@if (session()->has('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{session()->get('success')}}",
            theme: 'sunset',
            timeout: 2500,
            killer: true
        }).show();
    </script>

@endif 

@if (session()->has('delete'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{session()->get('delete')}}",
            theme: 'metroui',
            timeout: 2500,
            killer: true
        }).show();
    </script>

@endif

@if (session()->has('update'))

    <script>
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: "{{session()->get('update')}}",
            theme: 'relax',
            timeout: 2500,
            killer: true
        }).show();
    </script>

@endif