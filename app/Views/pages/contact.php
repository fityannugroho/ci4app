<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php foreach ($addresses as $address) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $address['type']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $address['city']; ?></h6>
                        <p class="card-text"><?= $address['street']; ?></p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
