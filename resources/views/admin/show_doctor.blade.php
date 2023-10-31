
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

  </head>
  <body>
  
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
 
     @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">
            <div style="padding-top:100px;">

            <table style="padding:20px">
        <tr style="background-color:black;color:white">
            <th style="padding:20px;">Doctor Name</th>
            <th style="padding:20px;">Phone Number</th>
            <th style="padding:20px;">Speciality</th>
            <th style="padding:20px;">Room Number</th>
            <th style="padding:20px;">Image</th>

            <th style="padding:20px;">Delete</th>
            <th style="padding:20px;">Update</th>
        </tr>
        @foreach($doctors as $doctor)
        <tr style="background-color:skyblue">
            <td style="padding:20px;">{{$doctor->name}}</td>
            <td style="padding:20px;">{{$doctor->phone_no}}</td>
            <td style="padding:20px;">{{$doctor->speciality}}</td>
            <td style="padding:20px;">{{$doctor->room}}</td>
            <td style="padding:20px;"><img height="100" width="100" src="doctorImage/{{$doctor->image}}" alt="image"></td>

            <td style="padding:20px;"><a onclick="return confirm('Are you sure you want to delete this doctor record')" href="{{url('delete')}}/{{$doctor->id}}" class="btn btn-success">Delete</a></td>
            <td style="padding:20px;"><a href="{{url('/updateDoctor')}}/{{$doctor->id}}" class="btn btn-danger">Update</a></td>
        </tr>
        @endforeach
      </table> 
            </div>
      
</div>
           

        <!-- main-panel ends -->
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>