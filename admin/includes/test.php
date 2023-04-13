<?php
include '../includes/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Write something about the department</h1>

    <div class="container">

        <form action="aboutIns.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea class="form-control" id="about" name="about" cols="30" rows="10">
            </textarea>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Other relevent detail</label>
                <textarea class="form-control" id="detail" name="detail" cols="30" rows="10"> </textarea>
            </div>
            <!-- <div class="mb-3"> -->
            <label for="img" class="form-label">Image</label>
            <input type="file" name="upload" id="img" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</div>
<?php
include '../includes/footer.php';
?>

