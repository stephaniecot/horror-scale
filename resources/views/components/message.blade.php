@if(session()->has('message'))
<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <p>{{ session()->get('message') }}</p>
    </div>

</div>
@endif
