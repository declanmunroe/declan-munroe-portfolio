<form action="/s3/uploadimg" method="post" enctype="multipart/form-data">
    @csrf <!-- needed for laravel built in form validation -->
    <label for="picture">Image Upload</label><br><br>
    <input type="file" name="picture" id="picture"><br><br>
    <input type="submit" value="Submit">
</form>

