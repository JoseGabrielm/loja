
@push('scripts-gn')


<script type="text/javascript">
    window.addEventListener('billet-page', event => {
            //alert('url: ' + event.detail.url);
            var url =  event.detail.url;
            w = window.open(url, "_blank");
    })
</script>

<script type="text/javascript">
    window.addEventListener('paymentLink-page', event => {
            //alert('url: ' + event.detail.url);
            var url =  event.detail.url;
            w = window.open(url, "_blank");
    })
</script>

@endpush
