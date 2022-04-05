<?php
var_dump('');

include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltdestination = $manager->getAllDestination();
?>
ciucou
<?php
foreach ($rltdestination as $result) {
?>
    <!-- carte horizontal-->
    <!--responsive de w-1/3 -- laius 1/3 -->
    <form method="get" action="./page.php">
        <input type="hidden" name="id" value="<?= $result->getId() ?>">
        <input type="hidden" name="location" value="<?= $result->getLocation() ?>">
        <div class="p-10 ">
            <h3 class="mb-4 font-bold text-orange-400"> </h3>
            <div class="bg-white rounded-lg hover:shadow-2xl ease-in duration-150 md:flex">
                <img src="<?= $result->getImage() ?>" alt="Boat" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none">
                    <div class="p-6">
                        <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"><?= $result->getLocation() ?></h2>
                        <p class="text-orange-700">A partir de <?= $result->getPrice() ?> € TTC </p>
                        <button type="submit"     class="border-2 hover:bg-orange-700 hover:text-white border-orange-700 px-4 py-2 mt-2 rounded-tl-lg rounded-tr-lg rounded-br-lg rounded-bl-lg">UPDATE</button>
                    </div>
            </div>
        </div>
    </form>
<?php
}
?>







<?php
include './partials/footer.php';
?>