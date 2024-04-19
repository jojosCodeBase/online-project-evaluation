@if (session('success'))
    <div id="alertMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div id="alertMessage" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div id="alertMessage" class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
