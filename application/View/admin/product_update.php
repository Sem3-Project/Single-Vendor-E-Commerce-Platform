
<!DOCTYPE html>
<head>
<html lang="en">
<meta charset="utf-8">
<title>Update the Product</title>
<link rel ="stylesheet" type="text/css" href="../../public/CSS/Product_update.css">
</head>

<body>
<div class= container>
    <h1>Update the product</h1>

    <label for="image">Product Image:</label><br><br>
    <div class="drop-zone drop-zone--over">
    
    <span class="drop-zone__prompt">Drop file here or click to upload</span>
    <!-- <div class="drop-zone__thumb" data-label="myfile.txt"></div> -->
    <input type='file' name="myfile" class="drop-zone__input">

    </div>
    <script src="../../public/js/Product_update.js"></script>

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
