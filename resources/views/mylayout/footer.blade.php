<footer>
    <div class="my-row">
        <div class="my-column my-flex-8">
            <img src="{{asset('img/logo-light.png')}}" alt="" width="179">
            <p class="my-footer-address">Jalan Bendungan Sutami No.188, Sumbersari, Lowokwaru, Kecamatan Lowokwaru, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145, Indonesia</p>
        </div>
    </div>
</footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
</body>

</html>