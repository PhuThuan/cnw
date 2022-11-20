<?php include 'connect.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASY</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/shopall.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>




</head>

<body>

    <?php include_once 'header.php'; ?>
    <div style="height: 100px; width: 100px;">






    </div>

    <div class="container">
        <div class="row ">
            <div class="col col-lg-2 locsp text-center ">

                <div style="float:left; position:relative;">

                    <div style=" position:fixed;">
                        <p class="margin_bottom_5"><b>Giá tiền:</b>

                        </p>
                        <input type="checkbox" name="screen_group[]" value="100-200" id="100-200" class="cb" />&nbsp;<span class="filter_paragraphs">100-200</span>

                        <br />
                        <input type="checkbox" name="screen_group[]" value="200-300" id="200-300" class="cb" />&nbsp;<span class="filter_paragraphs">200-300</span>

                        <br />
                        <input type="checkbox" name="screen_group[]" value="300-400" id="300-400" class="cb" />&nbsp;<span class="filter_paragraphs">300-400</span>

                        <br />
                        <input type="checkbox" name="screen_group[]" value="400-500" id="400-500" class="cb" />&nbsp;<span class="filter_paragraphs">400-500</span>
                        <br />
                        <input type="checkbox" name="screen_group[]" value="500-600" id="500-600" class="cb" />&nbsp;<span class="filter_paragraphs">500-600</span> <br />

                        <input type="checkbox" name="screen_group[]" value="600-700" id="600-700" class="cb" />&nbsp;<span class="filter_paragraphs">600-700</span> <br />

                        <input type="checkbox" name="screen_group[]" value="700-800" id="700-800" class="cb" />&nbsp;<span class="filter_paragraphs">700-800</span> <br />

                        <input type="checkbox" name="screen_group[]" value="800-900" id="800-900" class="cb" />&nbsp;<span class="filter_paragraphs">800-900</span>
                        <br />
                        <br />
                        <br />
                        <p class="margin_bottom_5"><b>Brands:</b>

                        </p>


                        <br />
                        <input type="checkbox" name="brand_group[]" value="aokhoac" id="z00196" class="cb" />&nbsp;<span class="filter_paragraphs">ÁO KHOÁC</span>

                        <br />
                        <input type="checkbox" name="brand_group[]" value="aongan" id="z05448" class="cb" />&nbsp;<span class="filter_paragraphs">ÁO NGẮN</span>

                        <br />
                        <input type="checkbox" name="brand_group2[]" value="discount" id="z00201" class="cb" />&nbsp;<span class="filter_paragraphs">Giảm Giá</span>
                        <br />
                        <input type="checkbox" name="brand_group1[]" value="noibat" id="z00202" class="cb" />&nbsp;<span class="filter_paragraphs">nổi bật</span>
                        <br />
                        </p>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <br />
                <hr />
                <br />
            </div>
            <div class="col-lg-10">
                <div class="container text-center">
                    <div class="row">

                        <!-- sản phẩm 1 -->
                        <!-- <div class="produkt_gruppe_div" data-money="100-200" data-brand_name="aokhoac">
          <div class="kategori_product_heading_div">
            <img src='../img/block_home_category1_new.webp' class="d-block w-100 mx-auto " id="a"
              onmouseover="this.src='../img/block_home_category2_new.webp';"
              onmouseout="this.src='../img/block_home_category1_new.webp';" />
            <div class="sanpham-muahang" id="sp">
              <div class="a">mua hàng</div>
              <div class="a text-center">thêm vào giỏ</div>
            </div>
            <div class="tensp text-center">GLORY ROAD BROWN VARSITY JACKET</div>
            <div class="giasp text-center">100.000&#8363</div>
          </div>
        </div> -->
                        <!-- <div class="products">

      <h1 class="heading">latest products</h1>

      <div class="box-container"> -->
                        <?php include_once 'product4.php' ?>


                    </div>

                </div>
            </div>
        </div>










        <?php include_once 'footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="js/index.js">
        </script>
        <script src="js/bottoms.js"></script>

</body>

</html>