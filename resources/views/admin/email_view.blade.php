
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      label {
        display: inline-block;
        width:200px;
      }
    </style>
  </head>
  <body>

      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <div align="center">
        
         <form style="padding-top:100px;" action="{{url('send_notification')}}/{{$data->id}}" method="POST" enctype="multipart/form-data">
         @csrf
         @if(session()->has('message'))
         <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
             {{session()->get('message')}}

         
         </div>
         @endif
                <div class="p-3">
                <label for="name">Greeting</label>
                <input type="text" name="greeting" style="color:black;" required><br>
                </div>
                <div class="p-3">
                <label for="phone">Body</label>
                <input type="text" name="body" style="color:black;"  required><br>
                </div>
                <div class="p-3">
                <label for="phone">Action Text</label>
                <input type="text" name="actiontext" style="color:black;" required><br>
                </div>
                <div class="p-3">
                <label for="phone">Action url</label>
                <input type="text" name="actionurl" style="color:black;" required><br>
                </div>
      
        
                <div class="p-3">

                <label for="room">End Part</label>
                <input type="text" name="endpart" style="color:black;" required><br>
     
       
                </div>
          
         <button type="submit" class="btn btn-success" value="submit">Submit</button>
         </form>
</div>

</div>
      
        <!-- main-panel ends -->
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>