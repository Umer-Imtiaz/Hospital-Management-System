
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
            <th style="padding:15px;">Customer Name</th>
            <th style="padding:15px;">Email</th>
            <th style="padding:15px;">Phone Number</th>
            <th style="padding:15px;">Doctor Name</th>
            <th style="padding:15px;">Date</th>
            <th style="padding:15px;">Message</th>
            <th style="padding:15px;">Status</th>
            <th style="padding:15px;">Approved</th>
            <th style="padding:15px;">Cancel</th>
            <th style="padding:15px;">Send Email</th>
        </tr>
        @foreach($appoint as $appoints)
        <tr style="background-color:skyblue">
            <td style="padding:15px;">{{$appoints->name}}</td>
            <td style="padding:15px;">{{$appoints->email}}</td>
            <td style="padding:15px;">{{$appoints->phone}}</td>
            <td style="padding:15px;">{{$appoints->doctor}}</td>
            <td style="padding:15px;">{{$appoints->date}}</td>
            <td style="padding:15px;">{{$appoints->message}}</td>
            <td style="padding:15px;">{{$appoints->status}}</td>
            <td style="padding:15px;"><a href="{{url('approve')}}/{{$appoints->id}}" class="btn btn-success">Approve</a></td>
            <td style="padding:15px;"><a href="{{url('cancel')}}/{{$appoints->id}}" class="btn btn-danger">Cancel</a></td>
            <td style="padding:15px;"><a href="{{url('emailview')}}/{{$appoints->id}}" class="btn btn-primary">Send Mail</a></td>
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