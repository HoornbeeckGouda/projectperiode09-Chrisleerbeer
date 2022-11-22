<script>
    function refreshPage(){
        window.location.reload();
    } 
</script>

{{-- Message --}}
@if (Session::has('success'))
    <div class="alert-wrapper">
        <div class="alert" role="alert">
            {{ session('success') }}
            <button class="close" type="button" onClick="refreshPage()">Close</button>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert-wrapper">
        <div class="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('error') }}
        </div>
    </div>
@endif