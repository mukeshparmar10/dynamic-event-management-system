@includeIf('header')
<h2 align="center">Add Event</h2>
<form id="form" method="post">
    @csrf
<table align="center" cellpadding="3px">
    <tr>
        <td>Title:</td>
        <td><input type="text" name="title" id="title" maxlength="200" required /></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td><input type="text" name="description" id="description" maxlength="500" required /></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td><input type="date" name="date" id="date" maxlength="12" required /></td>
    </tr>
    <tr>
        <td>Time:</td>
        <td><input type="time" name="time" id="time" maxlength="12" required /></td>
    </tr>
    <tr>
        <td>Location:</td>
        <td><input type="text" name="location" id="location" maxlength="50" required /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" value="Save" onclick="saveEvent()" /></td>
    </tr>
</table>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
function saveEvent() {
    var valid = true;

    if($("#title").val()=="")
    {
        alert("Please enter event title");
        $("#title").focus();
        valid = false;
        return false;
    }

    if($("#description").val()=="")
    {
        alert("Please enter event description");
        $("#description").focus();
        valid = false;
        return false;
    }

    if($("#date").val()=="")
    {
        alert("Please select event date");
        $("#date").focus();
        valid = false;
        return false;
    }

    if($("#time").val()=="")
    {
        alert("Please enter event time");
        $("#time").focus();
        valid = false;
        return false;
    }

    if($("#location").val()=="")
    {
        alert("Please enter event location");
        $("#location").focus();
        valid = false;
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '{{ route('event-save') }}',
        data: $("#form").serialize(),
        success: function(response) {
            if (response.status == 200 && response.message != '') {
                alert(response.message);
                location.href = "{{ route('root') }}";
            } else {
                alert("Event does not save, please try again later!")
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}
</script>
@includeIf('footer')