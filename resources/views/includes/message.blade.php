@if(session('message'))
    <div class=" row alert alert-success" style="margin-top:20px;">
        <div class="col s12 m12" >
        {{ session('message')}}
        </div>
    </div>
@endif