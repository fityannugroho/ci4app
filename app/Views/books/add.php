<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="mb-4">
                <h1 class="">Add Book</h1>
                <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="material-icons">arrow_back</i>
                    <span>Back to list</span>
                </a>
            </div>
            <form action="<?= base_url('/books/insert'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="bookTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bookTitle" name="title" required autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookWriter" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bookWriter" name="writer" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookPublisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bookPublisher" name="publisher" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookCover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bookCover" name="cover" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">add</i>
                        <span>Add Book</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
