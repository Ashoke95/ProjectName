<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Laravel 5.8 CRUD Example Tutorial</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="content">
<div class="row">
<div class="col-md-12">
<div class="card card-user">
<div class=" btn btn-info">
<h5 class="card-title ">Contact Us</h5>
</div>
<div class="card-body">


<form method="post" action="contact-us">
{{csrf_field()}}
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label> Name </label>
<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label> Email </label>
<input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div> 
<div class="col-md-12">
<div class="form-group">
<label> Phone Number </label>
<input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number">
@error('phone_number')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label> Subject </label>
<input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
@error('subject')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label> Message </label>
<textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
@error('message')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>







</div>
<!-- <div class="col-md-12">
<div class="form-group">
<label> image </label>
<input type="file" name="image" placeholder="image">

</div>
</div> -->
<br>
<div class="row">
<div class="update ml-auto mr-auto">
<button type="submit" class="btn btn-primary btn-round">Send</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
