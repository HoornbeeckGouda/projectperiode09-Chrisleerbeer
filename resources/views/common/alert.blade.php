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
            {{ session('error') }}
            <button class="close" type="button" onClick="refreshPage()">Close</button>
        </div>
    </div>
@endif

@if (Session::has('leninginvoer'))
    <div class="alert-wrapper">
        <div class="alert" role="alert">
            {{ session('leninginvoer') }}
            <form action="{{ route('book.alert.loan', $book->id) }}" method="GET">
                @csrf
                <input id="id" name="id" type="text" placeholder="Enter user id">
                <button class="main-button">submit</button>
            </form>
            <button class="close" type="button" onClick="refreshPage()">Close</button>
        </div>
    </div>
@endif

@if (Session::has('no_account'))
    <div class="alert-wrapper">
        <div class="alert" role="alert">
            {{ session('no_account') }}
            <a class="close" href="{{ route('register')}}">Register</a>
            <button class="close" type="button" onClick="refreshPage()">Close</button>
        </div>
    </div>
@endif