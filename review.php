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

    <H1 class="pl-20 m-5 text-green-500 text-2xl ">Donnez-nous votre avis ☺ </H1>
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
                <label for="Nickname">Nom :</label>
                <br>
                <input name="Nickname" type="text" placeholder="votre Nom" class="lg:w-1/4 sm:w-2/4 w-full bg-gray-200 focus:bg-white appearance-none border-2 border-gray-200 rounded focus:outline-none py-1  px-2 ">
                <br>
                <label for="Comment">Review :</label>
                <input name="Comment" type="text" placeholder="commenter" class="w-full my-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded  py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                <!-- PARTIE BONUS -->
                <!-- <select name="Grades">
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
                </select> -->
                <input type="hidden" name="idOperator" value="<?= $_GET['idOperator'] ?>">
                <button class="text-green-600 mt-1 border-2 border-green-600 px-2 rounded-lg focus:bg-green-600 focus:text-white">envoyer</button>
            </div>
        </form>
    </div>

</section>

<?php
include './partials/footer.php';
?>