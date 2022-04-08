<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltReview = $manager->getReviewByOperatorId($_GET['idOperator']);
?>
<section class="m-5">

    <?php
    // var_dump($_POST['idOperator']);
    ?>
    <pre>
    <?php
    // var_dump($rltReview);
    ?>
    </pre>

    <H1 class="p-10">commentaire : </H1>
    <div class="m-10 border-4  border-gray-400 rounded-lg bg-slate-100">

        <?php
        foreach ($rltReview as $rlt) {
        ?>
            <div class="border-b-2 border-gray-200">
                <div class="m-5">
                    <h2 class="text-blue-400"><?= $rlt->getAuthor() ?></h2>
                    <p class="ml-2"><?= $rlt->getMessage() ?></p>
                </div>
            </div>
        <?php
        }
        ?>
        <form action="./process/sendReview.php" method="post">
            <div class="m-5">
                <label for="Nickname">Nom</label>
                <input name="Nickname" type="text" placeholder="votre Nom" class="">
                <label for="Comment">Review</label>
                <input name="Comment" type="text" placeholder="commenter" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded  py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                <select name="Grades">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="hidden" name="idOperator" value="<?= $_GET['idOperator'] ?>">
                <button> send</button>
            </div>
        </form>
    </div>

</section>