<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltOperator = $manager->getOperatorsByLocation($_GET['location']);
$rltlocation = $manager->getImageDestiantion($_GET['location']);

?>
<pre> <?php
// var_dump($rltlocation);
// die;
?>
</pre> <?php


?>
<div class="bg-orange-200">
    <h1 class="md:text-2xl text-orange-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Pour <?= $_GET['location'] ?></h1>

    <!-- <img src="" alt="imageLocation" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none md:ml-24 ml-0 mb-6"> -->
    
    
    <img src="<?=$rltlocation->getImage()?>">

    <h1 class="text-orange-700 md:ml-24 ml-0">liste bdes opperateur pour cette destination</h1>
    <?php
    foreach ($rltOperator as $rlt) {
    ?>
        <div class="p-10 ">
            <h3 class="mb-4 font-bold text-orange-400"> </h3>
            <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                <img class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none" src="<?= $rlt->imageTour() ?>" alt="">
                <!-- deuxieme partie  -->
                <div class="p-6 md:w-1/3">
                    <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"></h2>
                    <?php if ($rlt->getIsPremium() == 1) {
                    ?>
                        <p class="text-orange-700 font-bold">consulter le site de notre partenaire :</p>
                        <p class="text-orange-700"><a href="<?= $rlt->getLink() ?>"><?= $rlt->getLink() ?></a></p>
                    <?php  } ?>
                        <h2 class=" font-bold text:xl md:text-xl text-orange-700">offre de <?= $rlt->getName()?></h2>
                    <?php
                    $a = $rlt->getTotal();
                    $b = $rlt->getGradecount();

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
                    <h1>prix <?= 'pas de prix' ?></h1>
                </div>
                    <!-- troisieme partie -->
                    <!-- partie Review -->
                    <div class="w-1/3">
                        <form action="./review.php?idOperator=<?= $rlt->getId()?>" method="post">
                            <input type="hidden" name="idOperator" value="<?= $rlt->getId() ?>">
                            <div class="flex top-50 m-16">
                                <button type="submit" class="text-2xl text-orange-700 mt-1 border-2 border-orange-700 px-2 rounded-lg focus:bg-orange-700 focus:text-white">commenter</button>
                            </div>
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