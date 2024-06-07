<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/product.css">
    <title>PHP21-product-page</title>
</head>
<body>
    <main>
        <?php
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];

            $conn_string = "host=localhost port=5432 dbname=php21 user=postgres password=12345";

            $conn = pg_connect($conn_string);

            $query = "SELECT * FROM products WHERE id=$id";
            $result = pg_query($conn, $query);
            pg_close($conn);

            if (pg_num_rows($result) == 1) {
                $product = pg_fetch_assoc($result);

                $product_html = "<div class='product'>
                    <img src='images/" . $product['image'] . "' alt='Изображение не найдено'>
                    <h2>" . $product['name'] . "</h2>
                    <h2>" . $product['description'] . "</h2>
                    <h2>Price: $" . $product['price'] . "</h2>
                    </div>";

                echo $product_html;

                $conn = pg_connect($conn_string);
                $query_comments = "SELECT * FROM comments WHERE product_id=$id";
                $result_comments = pg_query($conn, $query_comments);
                pg_close($conn);

                $comments_container_html = '<div class="comments-container"><div class="comments">';
                if (pg_num_rows($result_comments) > 0)
                {

                    while ($row_comment = pg_fetch_assoc($result_comments)) {
                        $comment_html = "<div class='comment'>
                        <h2>" . $row_comment['username'] . "</h2>
                        <h3>Оценка: <span>" . $row_comment['rating'] . "</span></h3>
                        <h3>Комментарий<br><span>" . $row_comment['comment'] . "</span></h3>
                        </div>";
                        $comments_container_html .= $comment_html;
                    }
                }
                else
                {
                    $comments_container_html .= "<h2>Отзывов нет</h2>";
                }
                $comments_container_html .= '</div>';


                $form_comment_html = "<form action='comment.php' method='post' class='comment_form'>
                    <h2>Комментировать</h2>
                    <input type='hidden' name='product_id' value='" . $product['id'] . "'>
                    <input type='text' name='username' placeholder='Имя'>
                    <input type='text' name='rating' placeholder='Оценка'>
                    <textarea name='comment' placeholder='Комментарий'></textarea>
                    <input type='submit' value='Добавить'>
                    </form>";

                $comments_container_html .= $form_comment_html . '</div>';
                echo $comments_container_html;

            }
            else
            {
                echo "<h2>Продукт с таким id не существует!</h2>";
            }
        }
        ?>
    </main>

</body>
</html>