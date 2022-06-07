@extends('contacts.layout')
@section('content')
<div class="card">
  <div class=" btn btn-secondary">Insert student record Page</div>
  <div class="card-body">
      
      <form action="{{ url('contact') }}" method="post"   enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" required></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" required ></br>
        <label class="form-label" for="inputImage">Image:</label>
                <input
                    type="file"
                    name="image"
                    id="inputImage"
                    class="form-control @error('image') is-invalid @enderror">
   
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br><br>
                <label> Select State</label>
                <select class="form-control" name="state" required>
                <option value="#">select</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Kerala">Kerala</option>
                <option value="Tamilnaidu">Tamilnaidu</option>
                <option value="Orisha">Orisha</option>
                <option value="Panjab">Panjab</option>
                <option value="UP">UP</option>

                </select><br>
                <label> Select District</label>
                <select class="form-control" name="district" required>
                <option value="#">select</option>
                <option value="Paschim Medinipur">Paschim Medinipur</option>
                <option value="Purba Medinipur">Purba Medinipur</option>
                <option value="Kochbihar">Kochbihar</option>
                <option value="Howrah">Howrah</option>
                <option value="Dargiling">Dargiling</option>
                <option value="Siliguri">Siliguri</option>
                <option value="North-24-paragana">North-24-paragana</option>
                </select><br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop