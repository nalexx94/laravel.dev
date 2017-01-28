<form action="{{ route('add-image') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="image" >
    <input type="submit" name="send">
</form>
