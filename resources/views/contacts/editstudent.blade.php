@extends('contacts.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">




  <div>
                 @foreach($editstudent as $activity) 
                    
                   <form method="POST" action="{{ route('updatestudent') }}" enctype="multipart/form-data">
                    @csrf
                   
                    
                    <div >
                       <input type="text" name="id" class="form-control" value="{{$activity['id']}}" hidden>
                     </div>
                     
                     <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" class="form-control" value="{{$activity['name']}}">
                       
                     </div>



                     <div class="form-group">
                       <label>Address</label>
                       <input id="address" name="address" type="" class="form-control" value="{{$activity['address']}}">
                     </div>
                      
                     <div class="form-group col-4">
                       <label>Mobile</label>
                       <input type="text" name="mobile" class="form-control" value="{{$activity['mobile']}}" >
                     </div>

                     <div class="form-group col-4">
                       <label>state</label>
                       <input type=" "name="state" class="form-control" value="{{$activity['state']}}" >
                     </div>
                     
                     <div class="form-group col-4">
                       <label>district</label>
                       <input type=" " name="district" class="form-control" value="{{$activity['district']}}">
                     </div>
                     <div class="form-group">
                       
                       <input type="submit" value="Update" class="btn btn-primary">
                     </div>
                    
                   </form>
                   @endforeach 
                 </div>











  