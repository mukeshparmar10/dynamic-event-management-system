@includeIf('header')
<h2 align="center">List of Events</h2>
<table id="data" border="1px" cellspacing="0px" width="100%" bgcolor="#f1f1f1">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>View/Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
function loadData() {
    $.ajax({
        type: 'GET',
        url: '{{ route('event') }}',
        data: {},
        success: function(response) {
            if (response.status == 200 && response.event != '') {
                global_response = response;
                var no = 0;
                $.each(response.event, function(key, value) {
                	no++;
                    $('#data').append(`<tr align="center">
                                    <td>${no}</td>
                                    <td>${value.title}</td>
                                    <td>${value.date}</td>
                                    <td>${value.time}</td>
                                    <td>${value.location}</td>
                                    <td><a style="color:#00f;text-decoration:none" href="/event-view-edit/${value.id}">View/Edit</a></td>
                                    <td><a style="color:#00f;text-decoration:none" href="#" onclick="deleteEvent(${value.id})">Delete</a></td>
                                    </tr>`);

                });
            } else {
                $('#data').append(`<tr><td colspan='7' >No Data Found</td></tr>`)
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}
loadData();

function deleteEvent(id) {
	if(confirm("Are you sure to delete?"))
	{
	    $.ajax({
	        type: 'DELETE',
	        url: '/api/event/delete/' + id,
	        data: {},
	        success: function(response) {
	            if (response.status == 200 && response.message != '') {
	                location.href = "/";
	            } else {
	                alert("Event does not delete");
	            }
	        },
	        error: function(error) {
	            console.error('Error:', error);
	        }
	    });
	}
}
</script>
@includeIf('footer')