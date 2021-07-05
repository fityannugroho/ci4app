<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="mb-4">
                <h1 class="">Add Book</h1>
                <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="material-icons">arrow_back</i>
                    <span>Back to List</span>
                </a>
            </div>
            <form action="<?= base_url('/books/insert'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="bookTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="bookTitle" name="title" autofocus value="<?= old('title'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookWriter" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('writer')) ? 'is-invalid' : ''; ?>" id="bookWriter" name="writer" value="<?= old('writer'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('writer'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookPublisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''; ?>" id="bookPublisher" name="publisher" value="<?= old('publisher'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('publisher'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookCover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-8">
                        <input type="file" id="bookCover" name="cover" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" value="<?= old('cover'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('cover'); ?></div>
                    </div>
                    <div class="col-sm-2">
                        <img src="/db/default-cover.jpg" id="bookCoverPreview" class="img-thumbnail">
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
