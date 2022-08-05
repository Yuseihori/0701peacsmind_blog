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
    <h2 class="mb-3">News List</h2>

    <?php
    $sql = "select*from news";
    $stmt = connect() -> query($sql);
    $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    ?>

</section>





<?php
require_once "foot.php";
?>