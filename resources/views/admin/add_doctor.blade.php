
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      
    </style>
  </head>
  <body>

      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
       
         <form style="padding-top:100px;" action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
         @if(session()->has('message'))
         <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
             {{session()->get('message')}}

         
         </div>
         @endif
         <div class="col-sm-6 col-lg-6">
                <label for="name">Doctor name</label><br>
                <input type="text" name="name" style="color:black;" placeholder="Enter doctor name" required>
         </div>
         <div class="col-sm-6 col-lg-6">
                <label for="phone">Doctor Phone Number</label><br>
                <input type="text" name="phone" style="color:black;" placeholder="Enter phone number" required>
         </div>
         </div>
         <div class="row">
         <div class="col-sm-6 col-lg-6">
                <label for="speciality">Speciality</label><br>
                <select name="speciality" style="width:200px;color:black" required>
              
                   <option value="Eye">Eye</option>
                   <option value="ENT">ENT</option>
                   <option value="Heart">Heart</option>
                   <option value="Skin">Skin</option>
                   <option value="Child">Child</option>
                </select>
                
         </div>
         <div class="col-sm-6 col-lg-6">
                <label for="room">Room Number</label><br>
                <input type="text" name="room" style="color:black;" placeholder="Enter Room no" required>
         </div>
            </div>
          
       
         
         <div class="col-sm-6 col-lg-6" style="padding-bottom:10px;">
                <label for="image">Doctor Image</label><br>
                <input type="file" name="image" required>
         </div>
         <button type="submit" class="btn btn-success" value="submit">Submit</button>
         </form>
        

</div>
      
        <!-- main-panel ends -->
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>