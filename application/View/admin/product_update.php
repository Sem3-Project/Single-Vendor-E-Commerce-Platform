
<!DOCTYPE html>
<head>
<html lang="en">
<meta charset="utf-8">
<title>Update the Product</title>
<link rel ="stylesheet" type="text/css" href="../../../public/CSS/product_update.css">
</head>

<body>
<div class= contain>
    <h1>Update the product</h1>

    <label for="image">Product Image:</label><br><br>

    <div class="container">
      <div class="wrapper">
        <div class="image">
          <img src="" alt="">
        </div>
<div class="content">
          <div class="icon">
<i class="fas fa-cloud-upload-alt"></i></div>
<div class="text">
No file chosen, yet!</div>
</div>
<div id="cancel-btn">
<i class="fas fa-times"></i></div>
<div class="file-name">
File name here</div>
</div>
<button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
      <input id="default-btn" type="file" hidden>
    </div><br><br>

    <script src="../../../public/js/product_update.js"></script>

  
    <table>
    <tr>
    <td>
        <label for="pname">Product name:</label><br><br>
        <input type="text" id="pname" name="pname"><br><br>
        <input type="submit" class="link" name="search" style="margin-bottom: 50px;" id="search" value="search">

    </td>
    </tr>

    <tr>
    <td>
        <label for="price">Price:</label><br><br>
        <input type="number" step="0.01" id="price" name="price"><br><br>
    </td>

    <td>
        <label for="color">Color:</label><br><br>
        <input type="text" id="color" name="color"><br><br>
    </td>
    </tr>

    <tr>
    <td>
        <label for="brand">Brand:</label><br><br>
        <input type="text" id="brand" name="brand"><br><br>
    </td>

    <td>
        <label for="P_dimension">Product Dimensions:</label><br><br>
        <input type="text" id="P_dimension" name="P_dimension"><br><br>
    </td>
    </tr>

    <tr>
    <td>
        <label for="p_weight">Product Weight(grams):</label><br><br>
        <input type="number" step="any" id="p_weight" name="p_weight"><br><br>
    </td>

    <td>
        <label for="sku">SKU:</label><br><br>
        <input type="text" id="sku" name="sku"><br><br>
    </td>
    </tr>

    <tr>
    <td>
        <label for="category">Category:</label><br><br>
        <input type="text" id="category" name="category"><br><br>
    </td>

    <td>
        <label for="sub_category">Sub Category:</label><br><br>
        <input type="text" id="sub_category" name="sub_category"><br><br>
    </td>
    </tr>
    <tr>
    <td>
        <label for="about">About this product:</label><br><br>
        <input type="text" style="width:250px;height:90px;" id="about" name="about"><br><br>
    </td>
    <tr>
</table>

<input type="submit" class="link" name="update" style="margin-bottom: 50px;" id="update" value="Update">
<input type="submit" class="link" name="Remove" style="margin-bottom: 50px;" id="Remove" value="Remove">


</div>
</body>
</html>
