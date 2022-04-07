<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltReview = $manager->getReviewByOperatorId($_POST['idOperator']);
?>
<section class="m-5">

    <?php var_dump($_POST['idOperator']);

    foreach ($rltReview as $rlt) {
    ?>


        <?php
    }
        ?>

        <input type="text" placeholder="commenter" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded  py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500">
        <select name="" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

</section>