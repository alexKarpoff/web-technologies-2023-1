<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>PHP21</title>
</head>
<body>
    <div class="products">
        <?php

        $conn_string = "host=localhost port=5432 dbname=php21 user=postgres password=12345";
        $conn = pg_connect($conn_string);

        $query = "SELECT * FROM products";
        $result = pg_query($conn, $query);
        pg_close($conn);
        if (pg_num_rows($result) > 0) {
            while($row = pg_fetch_assoc($result)) {
                $product_html = " <a href='product.php?id=".$row['id']."'><div class='product'> 
                    <img src='images/".$row['image']."' alt='Изображение не найдено'>
                    <h2>".$row['name']."</h2>
                    <h2>".$row['description']."</h2>
                    <h2>Price: $".$row['price']."</h2>
                    </div></a>";
                echo $product_html;
            }
        }
        ?>
    </div>
</body>
</html>