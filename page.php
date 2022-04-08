<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltDestinations = $manager->getDestinationByLocation($_GET['location']);

// $byLocation = new Manager;
// $imgLocation = $byLocation->getImageByLocation();

// var_dump($rltDestinations);
// die;*

?>
<div class="bg-orange-200">
    <h1 class="md:text-2xl text-orange-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Pour <?= $_GET['location'] ?></h1>

    <!-- <img src="" alt="imageLocation" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none md:ml-24 ml-0 mb-6"> -->

    <img src="<?= $rltDestinations[0]->getImage() ?>" alt="">

    <h1 class="text-orange-700 md:ml-24 ml-0">liste bdes opperateur pour cette destination</h1>
    <?php
    foreach ($rltDestinations as $rlt) {
    ?>
        <div class="p-10 ">
            <h3 class="mb-4 font-bold text-orange-400"> </h3>
            <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                <img class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none" src="<?= $rlt->getTourOperator()->imageTour() ?>" alt="">
                <!-- deuxieme partie  -->
                <div class="p-6 md:w-1/3">
                    <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"></h2>
                    <?php if ($rlt->getTourOperator()->getIsPremium() == 1) {
                    ?>
                        <p class="text-orange-700 font-bold">consulter le site de notre partenaire :</p>
                        <p class="text-orange-700"><a href="<?= $rlt->getTourOperator()->getLink() ?>"><?= $rlt->getTourOperator()->getLink() ?></a></p>
                    <?php  } ?>
                    <?php
                    $a = $rlt->getTourOperator()->getTotal();
                    $b = $rlt->getTourOperator()->getGradecount();

                    if ($a == 0 || $b == 0) {
                        $moyenne = 'pas de notation';
                    ?>
                        <p class="text-orange-700"><?= $moyenne ?></p>
                    <?php
                    } else {
                        $moyenne = ($a / $b);
                    ?>
                        <p class="text-orange-700">note du tour operateur <?= $moyenne ?> / 10</p>
                    <?php
                    }
                    ?>
                    <h1>prix <?= $rlt->getPrice()?> btc</h1>
                </div>
                    <!-- troisieme partie -->
                    <!-- partie Review -->
                    <div class="align-center">
                        <form action="./review.php" method="post">
                            <input type="hidden" name="idOperator" value="<?= $rlt->getTourOperator()->getId() ?>">
                            <?php var_dump($rlt->getTourOperator()->getId()); ?>
                            <button type="submit" class=""> commenter</button>
                        </form>
                    </div>
            </div>
        </div>
        </h1>
    <?php
    }
    ?>


</div>
<?php
include './partials/footer.php';
?>