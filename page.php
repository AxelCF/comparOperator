<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltOperator = $manager->getOperatorsByLocation($_GET['location']);
// var_dump($rltOperator);
// die;*

?>
<div class="bg-orange-200">
    <h1 class="md:text-2xl text-orange-700">Pour <?= $_GET['location'] ?></h1>

    <img src="" alt="imageLocation" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none">


    <h1 class="text-orange-700">liste bdes opperateur pour cette destination</h1>
    <?php
    foreach ($rltOperator as $rlt) {
    ?>
        <div class="p-10 ">
            <h3 class="mb-4 font-bold text-orange-400"> </h3>
            <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                        <img 
class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none" src="<?= $rlt->imageTour() ?>" alt="">                
              <div class="p-6">
                    <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"></h2>
                    <?php if ($rlt->getIsPremium() == 1) {
                    ?>
                        <p class="text-orange-700"><?= $rlt->getLink() ?></p>
                    <?php }  ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include './partials/footer.php';
?>