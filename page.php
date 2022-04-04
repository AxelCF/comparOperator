<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltOperator = $manager->getOperatorsByLocation($_GET['location']);
var_dump($rltOperator);
// die;*

?>

<?php
    foreach($rltOperator as $rlt){ 
?>
                <div class="p-10 ">
                    <h3 class="mb-4 font-bold text-orange-400"> </h3>
                    <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                        <img src="<?= $rlt->getName() ?>" alt="Boat" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none">
                        <div class="p-6">
                            <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"></h2>
                            <p class="text-orange-700"><?= $rlt->getLink() ?></p>
                        </div>
                    </div>
                </div>

                <?php
}
?>