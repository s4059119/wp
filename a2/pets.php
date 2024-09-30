<?php

include_once('includes/db_connect.inc');


$title = "Pets Page";


include_once('includes/header.inc');
?>

<header>
    <?php

    include_once('includes/nav.inc');
    ?>

    <h3 class="h3">Discover Pets Victoria</h3>
                    <p class="p1">Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe
                        loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate,
                        and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families,
                        creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community
                        support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.</p>
    
        </header>

        <main class="default-main">
    <aside>
        <img src="images/pets.jpeg" alt="Pets" class="pets">
        <table>
            <thead>
                <tr>
                    <th>Pet</th>
                    <th>Type</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
            </thead>