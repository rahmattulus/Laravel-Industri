<form 
    action="{{ url('post-file-upload') }}" 
    method="post" 
    enctype="multipart/form-data">
    
    @csrf
    <input type="file" name="profile" id="profile">
    <button type="submit">kirim</button>
</form>