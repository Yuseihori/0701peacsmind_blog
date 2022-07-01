<?php
require_once "head.php";
?>
    <title>管理画面</title>
</head>
<body>
<?php
require_once "nav.php";
?>

<section class="container">
    <h2 class="mb-3">News Register Form</h2>

    <form action="news_regi.php" method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="title" id="title" placeholder="#" value="">
            <label for="title">タイトル</label>
        </div>
        
        <div class="form-floating mb-3">
            <textarea class="form-control" name="details" id="details" value="" cols="30" style="height:300px;"></textarea>
            <label for="details">投稿内容</label>
        </div>
        
        <div class="form-floating mb-3">
            <input class="form-control" type="date" name="date" id="date" placeholder="#" value="<?= get_today() ?>">
            <label for="date">日付</label>
        </div>

        <input type="submit" value="登録する" class="btn btn-dark">
    </form>

</section>





<?php
require_once "foot.php";
?>