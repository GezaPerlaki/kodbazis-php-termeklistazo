<div class="card container p-3 m-3">
    <?php foreach ($params['customers'] as $customer) : ?>
        <h3>Név: <?php echo $customer["name"] ?></h3>
        <hr>
    <?php endforeach; ?>
</div>