<?php include_once "../php/config/base.php" ?>

<?php  

if (isset($_POST["btnAddCategory"])) {
  $categoryName=$db->secure( $_POST["categoryName"]);

  if ($_FILES["categoryImg"]["type"]==="image/png" || $_FILES["categoryImg"]["type"]==="image/jpg" || $_FILES["categoryImg"]["type"]==="image/jpeg") {

    $categoryImage=$db->secure($_FILES["categoryImg"]["name"]);
    $tempImg=$_FILES["categoryImg"]["tmp_name"];

    $categoryImage=explode(".",$categoryImage);
    $categoryImage=$categoryImage[1];

    $maxId=$db->customQuery("SELECT max(category_id) FROM categories");
    $maxId=$maxId[0]["max(category_id)"];
    if($maxId===NULL){
      $maxId=1;
    }else{
      $maxId++;
    }
    $newImg=$maxId.".".$categoryImage;
    $result=$db->insertData("categories",[$categoryName,$newImg],["category_name",'category_img']);
    if ($result) {
      move_uploaded_file($tempImg,"../img/".$newImg);
    }else{
      echo "field";
    }
  }
  
}

?>



<?php include_once "includes/adminNav.php" ?>

<div class="content">
  <div class="row">
    <div class="col-12">
      <button class="btn btn-fill btn-primary mb-3" type="button" data-toggle="collapse" data-target="#addCategory"
        aria-expanded="false" aria-controls="addCategory">Add category</button>
      <div class="collapse" id="addCategory">
        <div class="card card-body">
          <form action="category.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="categoryName" name="categoryName"
                    placeholder="category name" requried>
                </div>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="categoryImg" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <div class="clearfix">
              <button type="submit" name="btnAddCategory" class="btn btn-primary float-right">save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="collapse" id="updateCategory">
        <div class="card card-body">
          <form action="category.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="updateCategoryName" name="updateCategoryName"
                    placeholder="category name" requried>
                </div>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile1">
                  <input type="hidden" class="hidden" name="imgChanged">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <div class="clearfix">
              <button type="submit" name="btnUpdateCategory" class="btn btn-primary float-right">save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title"> Simple Table</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    image
                  </th>
                  <th>

                  </th>
                  <th class="text-center">

                  </th>
                </tr>
              </thead>
              <tbody>
                <tr id="12">
                  <td>
                    Dakota Rice
                  </td>
                  <td>
                    <img src="images/s.jpg" alt="" srcset="">
                  </td>
                  <td class="text-center">
                    <button class="btn btn-info btnUpdate" type="button" data-toggle="collapse"
                      data-target="#updateCategory" aria-expanded="false" aria-controls="updateCategory">update</button>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-danger">delete</button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "includes/adminFooter.php" ?>