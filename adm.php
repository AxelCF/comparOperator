<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltdestination = $manager->getAllDestination();
?>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Vous êtes connecté en qualité d'administrateur.</h1>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Ajouter un tour-opérateur.</h1>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Ajouter des destinations aux TO parmi une liste fixe.</h1>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Passé en premium un TO.</h1>


<h1 class="md:text-3xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">rien :</h1>
<div class=" bg-orange-200 border-4 m-6 border-green-700 px-4 py-2 mt-2 rounded-tl-lg rounded-tr-lg rounded-br-lg rounded-bl-lg">
    <?php
    foreach ($rltdestination as $result) {
    ?>
        <form method="get" action="./page.php">
            <input type="hidden" name="id" value="<?= $result->getId() ?>">
            <input type="hidden" name="location" value="<?= $result->getLocation() ?>">
            <div class="p-10 ">
                <h3 class="mb-4 font-bold text-orange-400"> </h3>
                <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                    <button type="submit"><img src="<?= $result->getImage() ?>" alt="Boat" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none">
                        <div class="p-6">
                            <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"><?= $result->getLocation() ?></h2>
                            <p class="text-orange-700">A partir de <?= $result->getPrice() ?> € TTC </p>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</div>







<?php
include './partials/footer.php';
?>