<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employee Crud Operations</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" id="employee_table">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text"></div>
				<ul class="pagination">
					
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addEmployeeForm">
				<div class="modal-header">						
					<h4 class="modal-title"  id="textSpan">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<input type="hidden" id="emp_id" >
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" id="name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" id="email" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" id="phone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success details_save" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info"  value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
				<input type="hidden" id="single_deleted_id" value="" >
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" id="single_delete" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
	 $('#addEmployeeForm').submit(function(e){
        e.preventDefault();
		var name = $("#name").val();
		var email = $("#email").val();
		var address = $("#address").val();
		var phone = $("#phone").val();
		var emp_id = $("#emp_id").val();
		var mode = "";
		if(emp_id != ""){
			mode="update";
		}else{
			mode="insert";
		}
		$.ajax({
			type:'POST',
			url : 'api.php',
			contentType: "application/json",
			dataType: 'json',
			data: JSON.stringify({name : name,email:email,address:address,phone: phone,mode:mode,id:emp_id}),
			success: function(response){
				alert(response.message);
				loademployees();
				$('#addEmployeeModal').modal('hide');
			},
			error: function(xhr, status, error){
				console.error(xhr.responseText);
			}
		});		
	});
	function loademployees(page = 1	){
		 $.ajax({
			type: 'GET',
            url: 'api.php',
			contentType: "application/json",
			dataType: 'json',
            data: {  page: page, records_per_page: 10 },
            success: function(response) {
				 var data = response.data;
                 var total_pages = response.total_pages;
                 var current_page = response.current_page;
                 var userTable = $('#employee_table tbody');
                 userTable.empty();
				    $.each(data, function(index, user) {
                    var userRow = '<tr  data-id="'+user.id +'"">';
					userRow += '<td><span class="custom-checkbox"><input type="checkbox" class="itemCheckbox" id="checkbox_"'+user.id +'"" name="options[]" value="1"><label for="checkbox1"></label></span></td>';
                    userRow += '<td>' + user.name + '</td>';
                    userRow += '<td>' + user.email + '</td>';
					userRow += '<td>' + user.phone + '</td>';
					userRow += '<td>' + user.address + '</td>';
                    userRow += '<td><a href="#addEmployeeModal" class="edit" data-toggle="modal" data-id="' + user.id + '"><i class="material-icons" data-toggle="tooltip"  title="Edit">&#xE254;</i></a>';
                    userRow += '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="' + user.id + '"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
                    userRow += '</tr>';
                    userTable.append(userRow);
					});
				
                var pagination = $('.pagination');
                pagination.empty();
                for (var i = 1; i <= total_pages; i++) {
                    var pageItem = '<li class="page-item' + (i === current_page ? ' active' : '') + '">';
                    pageItem += '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
					console.log(pageItem);
                    pagination.append(pageItem);
                }
			}
		 });
	}
	loademployees();
	$(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).data('page');
        loademployees(page);
    });
	 $(document).on('click', '.edit', function(event) {
		 var employeeId =$(this).attr("data-id") ;
		  $.ajax({
			type: 'GET',
            url: 'api.php',
			contentType: "application/json",
			dataType: 'json',
            data: { id: employeeId },
            success: function(response) {
				 var data = response.data;
				  $("#name").val(data[0].name);
				  $("#email").val(data[0].email);
				  $("#address").val(data[0].address);
				  $("#phone").val(data[0].phone);
				  $("#emp_id").val(data[0].id);
				  $(".details_save").val("Save");
				 $('#textSpan').text("Edit Employee");
				  
			}
		  });
	 });
	 $(document).on('click', '.close', function(event) {
		   $("#name").val("");
		   $("#email").val("");
		   $("#address").val("");
	   	   $("#phone").val("");
		   $("#emp_id").val("");
		   $(".details_save").val("Add");
		   $('#textSpan').text("Add Employee");
	 });
	 $(document).on('click', '.delete', function(event) {
		 var delete_id = $(this).attr("data-id") ;
		 $("#single_deleted_id").val(delete_id);
	 });
	 $(document).on('click', '#single_delete', function(event) {
		 var delete_id = $("#single_deleted_id").val();
		 var selectedIds = [];
		 if(delete_id == ""){
			  $('.itemCheckbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var id = row.data('id');
                    selectedIds.push(id);
                });
		 }else{
			 selectedIds.push(delete_id);
		 }
		 $.ajax({
			type: 'DELETE',
            url: 'api.php',
			contentType: "application/json",
			dataType: 'json',
            data: JSON.stringify({ id: selectedIds }),
            success: function(response) {
				alert(response.message);
				 $('#deleteEmployeeModal').modal('hide');
				 loademployees();
				$('.itemCheckbox:checked').each(function() {
                    $(this).closest('tr').remove();
                });
			}
			});
	  });

});
</script>
</html>