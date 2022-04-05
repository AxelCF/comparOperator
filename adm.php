<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltdestination = $manager->getAllDestination();

$rltoperator = $manager->getAllOperator();
?>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Vous êtes connecté en qualité d'administrateur.</h1>

<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Ajouter un tour-opérateur.</h1>
<div class="md:ml-24 ml-3 mb-6 pl-5 pt-0">
    <p>Veuillez entrer les information suivante:</p>
    <form action="./process/envoi_msg.php" method="POST">
            <div class="info">
                <div class="p-1">
                    <label  for="nameTo">Nom TO</label>
                    <input type="text" name="nameTo" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded  py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="inline-full-name"><br />
                </div>
                <div class="p-1">
                    <label for="urlTo">Url TO</label>
                    <input type="text" name="urlTo" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded  py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="inline-full-name"><br />
                </div>
                <div class="p-1">
                    <label for="premium">Premium</label>
                    <input type="checkbox" name="premium" required class="focus:border-purple-500"><br/>
                </div>
                <button class="rounded-lg  border-2 hover:bg-green-700 hover:text-white border-green-700 px-4 py-1" type="submit" value="1">Ajouter</button>
            </div>
</div>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Ajouter des destinations aux TO parmi une liste fixe.</h1>
<?php
    foreach ($rltdestination as $destination){
        ?>
        <p><?=$destination->getLocation()?></p>
        <?php
    }
    ?>

    <?php
    foreach ($rltoperator as $operator){
        ?>
        <p><?=$operator->getName()?></p>
        <?php
    }
    ?>
<h1 class="md:text-2xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Passé en premium un TO.</h1>


<h1 class="md:text-3xl text-green-700 block font-bold md:ml-24 ml-0 mb-6 pt-6">Vue de l’utilisateur :</h1>
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