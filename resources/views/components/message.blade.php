@if(session()->has('message'))


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>{{ session()->get('message') }}</p>
  </div>

</div>
@endif
