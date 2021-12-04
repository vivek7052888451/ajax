<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	
	<!---datatable css-->
	<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css')}}">
    <!---datatable css-->


    <title>Ajax Curd</title>
  </head>
  <body>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add Student
</button>

<!---show student data--->

 <div class="table-responsive">
				<table class="table table-bordered"id="example">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Password</th>
					  <th>Mobile</th>
					  <th>Address</th>
					  <th>Edit</th>
					 
					</tr>
				  </thead>
				  <tbody>
					  @foreach($studetdatas as $u_info)
					  <tr>
						 <td>{{ $u_info->id  }}</td>
						 <td>{{ $u_info->name }}</td>
						 <td>{{ $u_info->email }}</td>
						 <td>{{ $u_info->password }}</td>
						 <td>{{ $u_info->mobile }}</td>
						 <td>{{ $u_info->address }}</td>
						 <td><a href="javascript:void(0)" id="show-user" editdata="" class="btn btn-info">Edit</a></td>
					  </tr>
					  @endforeach
				  </tbody>
				</table>
			  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formId">
	   @csrf
		  <div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder=" Emter Name">
		  </div>
		  <div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control"name="email" id="email" placeholder="Enter email">
		  </div>
		   <div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control"name="password" id="password" placeholder="Enter password">
		  </div>
		   <div class="form-group">
			<label>Mobile</label>
			<input type="text" class="form-control" name="mobile"id="mobile" placeholder="Enter mobile">
		  </div>
		   <div class="form-group">
			<label>Address</label>
			<textarea class="form-control"name="address" id="address" placeholder="Enter address"></textarea>
		  </div>
	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<!---data table script--->
<script src="{{ asset('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js')}}"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
	
	//store student data
	$('#formId').on('submit',function(){
		// var data=$('#formId').serialize();
		 $.ajax({
			type : 'POST',
			url : '/store',
			data : $('#formId').serialize(),
			success:function(ress){
				//alert('data store');
			},
			error:function(ress){
				alert('failed');
			}
			
		});
		 
	})
} );



</script>
  </body>
</html>
</html>