<div class="card container p-3 m-3">
    <form action="/customers" method="POST">
        <input type="text" name="name" placeholder="Név" />
        <button type="submit" class="btn btn-success">Küldés</button>

    </form>
    <?php foreach ($params['customers'] as $customer) : ?>
        <h3>Név: <?php echo $customer["name"] ?></h3>
        <hr>
    <?php endforeach; ?>
</div>