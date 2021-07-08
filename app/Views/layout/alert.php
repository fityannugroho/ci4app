<?php if ($message = session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Close Alert"></button>
    </div>
<?php endif; ?>
