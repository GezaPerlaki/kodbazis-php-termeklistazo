<div class="card container p-3 m-3">
    <form action="/customers" method="POST">
        <input type="text" name="name" placeholder="Név" />
        <button type="submit" class="btn btn-success">Küldés</button>

    </form>
    <?php foreach ($params['customers'] as $customer) : ?>
        <h3>Név: <?php echo $customer["name"] ?></h3>
        <?php if ($params["editedCustomerId"] === $customer["id"]) : ?>

            <form class="form-inline form-group" action="/update-customer?id=<?php echo $customer["id"] ?>" method="post">
                <input class="form-control mr-2" type="text" name="name" placeholder="Név" value="<?php echo $customer["name"] ?>" />

                <a href="/customers">
                    <button type="button" class="btn btn-outline-primary mr-2">Vissza</button>
                </a>

                <button type="submit" class="btn btn-success">Küldés</button>
            </form>

        <?php else : ?>
            <div class="btn-group">
                <a href="/customers?szerkesztes=<?php echo $customer["id"] ?>">
                    <button class="btn btn-warning mr-2">Szerkesztés</button>
                </a>

                <form action="/delete-customer?id=<?php echo $customer["id"] ?>" method="post">
                    <button type="submit" class="btn btn-danger">Törlés</button>
                </form>
            </div>
        <?php endif; ?>

        <hr>
    <?php endforeach; ?>
</div>