<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">

  <strong>Please check the form below for errors</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif

<script >
$("document").ready(function(){
    setTimeout(function(){
       $(".alert").remove();
    }, 2000 ); // 5 secs

});
</script>

