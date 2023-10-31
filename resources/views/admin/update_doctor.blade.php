<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
      @include('admin.css')
    
  </head>
  <body>

      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
       
   
        <form method="POST" style="padding-top:100px;" action="{{url('editDoctor')}}/{{$doctor->id}}" enctype="multipart/form-data">
         @csrf

         <div class="row">
            <div class="col-sm-6 col-lg-6">
                <label for="name">Doctor Name</label><br>
                <input type="text" name="name" style="color:black;width:300px" placeholder="Enter Doctor Name" value="{{$doctor->name}}">

            </div>
            <div class="col-sm-6 col-lg-6">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" style="color:black;width:300px;" placeholder="Enter phone number" value="{{$doctor->phone_no}}">
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6 col-lg-6">
                <label for="speciality">Speciality</label>
                <select name="speciality" style="color:black;width:300px;">
                   <option>--Select--</option>
                   @if($doctor->speciality=="ENT")
                   <option value="Eye">Eye</option>
                   <option value="ENT" selected="selected">ENT</option>
                   <option value="Heart">Heart</option>
                   <option value="Skin">Skin</option>
                   <option value="Child">Child</option>
                   @elseif($doctor->speciality=="Eye")
                   <option value="Eye" selected="selected">Eye</option>
                   <option value="ENT">ENT</option>
                   <option value="Heart">Heart</option>
                   <option value="Skin">Skin</option>
                   <option value="Child">Child</option>
                   @elseif($doctor->speciality=="Heart")
                   <option value="Eye">Eye</option>
                   <option value="ENT">ENT</option>
                   <option value="Heart" selected="selected">Heart</option>
                   <option value="Skin">Skin</option>
                   <option value="Child">Child</option>
                   @elseif($doctor->speciality=="Skin")
                   <option value="Eye">Eye</option>
                   <option value="ENT">ENT</option>
                   <option value="Heart">Heart</option>
                   <option value="Skin" selected="selected">Skin</option>
                   <option value="Child">Child</option>
                   @else
                   <option value="Eye">Eye</option>
                   <option value="ENT">ENT</option>
                   <option value="Heart">Heart</option>
                   <option value="Skin">Skin</option>
                   <option value="Child" selected="selected">Child</option>
                   @endif
                </select>
            </div>
            <div class="col-sm-6 col-lg-6">
                <label for="room">Room No</label><br>
                <input type="text" name="room" style="color:black;width:300px;" placeholder="Enter Room No" value="{{$doctor->room}}">
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6 col-lg-6" style="margin-bottom:20px">
                <label for="image">Image</label>
                <input type="file" name="image">
                <img src="doctorImage/{{$doctor->image}}" style="width:100px;height:100px;padding-top:20px;">
            </div>
         </div>
         <button type="submit" class="btn btn-success">Submit</button>
        </form>


        
        

</div>
      
        <!-- main-panel ends -->
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>