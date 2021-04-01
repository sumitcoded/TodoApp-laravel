<div>
    @if(session()->has('message'))
        <div class="alert my-1 alert-success">
            {{ session()->get('message')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert my-1 alert-danger">
            {{ session()->get('error')}}
        </div>
    @endif
        @if ($errors->any())
            <div class="alert my-1 alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
