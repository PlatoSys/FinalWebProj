<title>Profile</title>
<div class="dashboard">
    <div class="dashboard-bar">
        <h>Profile</h>
        <form method="post" action="/picture" enctype="multipart/form-data" novalidate>
            <h1>Upload New profile picture</h1>
            <div class="form-group col-sm-12 oldpass">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="post_image"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>