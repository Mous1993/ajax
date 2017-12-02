<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<title>Ajax Todo List Project</title>
	<!-- cdn for awesome fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- css for bootstrap @ bootstrapcdn -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- jquery ui for search  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
</head>
<body>
	<br>
	<!-- Search Box -->
	<div class="col-lg-2">
	    <input type="text" class="form-control" id="searchItems" placeholder="Search">
	    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">

			<!-- Panel bootstrap @ bootstrap components -->
				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-modx" aria-hidden="true"></i>
					 Todo List <a href="#" id="addNew" class="pull-right" data-toggle="modal" data-target="#myModal">
					 <i class="fa fa-plus-square" aria-hidden="true"></i></a></h3>
				  </div>
				  <!-- list bootstrap @ bootstrap Components -->
				  <div class="panel-body" >
				    <ul class="list-group" id="items">
				    @foreach($items as $item)
				      	<li class="list-group-item list-group-item-warning ourItem" data-toggle="modal" data-target="#myModal">{{ $item->item }} <input type="hidden" id="itemId" value="{{ $item->id }}"></li>
				    @endforeach
				    </ul>
				  </div>
				  <!-- modal bootstrap @ bootstrap components javascript -->
				  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
				    <div class="modal-dialog" role="document">
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
				          <h4 class="modal-title" id="title"></h4>
				        </div>
				        <div class="modal-body">
				        <input type="hidden" id="id">
				          <p><input type="text" id="addItem" placeholder="Enter Your Item" class="form-control"></p>
				        </div>
				        <div class="modal-footer">
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none;">Close</button> -->
				          <button type="button" class="btn btn-danger" data-dismiss="modal" id= "delete" style="display: none;">Delete</button>
				          <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges" style="display: none;">Save Changes</button>
				          <button type="button" class="btn btn-primary" data-dismiss="modal" id="addButton">Add Item</button>
				        </div>
				      </div><!-- /.modal-content -->
				    </div><!-- /.modal-dialog -->
				  </div><!-- /.modal -->
				</div> <!-- /.panel -->
				
			</div>
		</div>
	</div>
	<!-- token -->
	{{ csrf_field() }}
	<!-- jquerycdn -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- bootstrap javascript cdn -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- jqueryui javascript  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!-- script -->
	<script >
		$(document).ready(function()
		{
			$(document).on('click', '.ourItem', function()
			{
			/*$('.ourItem').click(function(event)
			{*/
				var text = $(this).text();
				var text = $.trim(text);
				var id = $(this).find('#itemId').val();
				$("#addItem").val(text); 
				$('#title').text("Edit Item");
				$('#delete').show();
				$('#saveChanges').show();
				$('#addButton').hide();
				$('#id').val(id);
				console.log(text);
			});

			$(document).on('click' , '#addNew', function(event)
			{
			/*$('#addNew').click(function(event)
			{*/
				$('#title').text("Add New Item");
				$('#delete').hide();
				$('#saveChanges').hide();
				$('#addButton').show();
				$('#addItem').val("");

			});

			$('#addButton').click(function(event)
			{
				var text = $('#addItem').val();
				if(text == "")
				{
					alert("please enter the item name . ")
				}
				else
				{
					/* route , value to be sent , eventhanlde and returned data from controller */
					$.post('list', {'field' : text, '_token' : $('input[name=_token]').val() }, function(data)
					{
						console.log(data);
						$('#items').load(location.href + ' #items');
					});

				}
			});

			$('#delete').click(function(event)
			{
				var id = $('#id').val();
				$.post('delete', {'field' : id, '_token' : $('input[name=_token]').val() }, function(data)
				{
					$('#items').load(location.href + ' #items');
					/*console.log(data);*/
				});

			});

			$('#saveChanges').click(function(event)
			{
				var id = $('#id').val();
				var value = $('#addItem').val();
				if (value == "")
				{
					alert("please enter the item name . ")
				}
				else
				{
					$.post('update', {'id' : id,'value' : value, '_token' : $('input[name=_token]').val() }, function(data)
					{
						$('#items').load(location.href + ' #items');
						/*console.log(data);*/
					});
					
				}	

			});

			/*jquery ui autocomplete*/
			$( function() 
			{
				  $( "#searchItems" ).autocomplete({
				    source: 'http://localhost:8000/search'
				  });
			});
		});
	</script>
</body>
</html>