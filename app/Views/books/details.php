<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="mb-4">
                <h1>Book Details</h1>
                <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="material-icons">arrow_back</i>
                    <span>Back to list</span>
                </a>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/images/<?= $book['cover']; ?>" class="img-fluid rounded-start" alt="book_cover_<?= $book['slug']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['title']; ?></h5>
                            <table class="table">
                                <tr>
                                    <th>Writer</th>
                                    <td><?= $book['writer']; ?></td>
                                </tr>
                                <tr>
                                    <th>Publisher</th>
                                    <td><?= $book['publisher']; ?></td>
                                </tr>
                            </table>
                            <!-- <p class="card-text"></p> -->
                            <p class="card-text"><small class="text-muted">Last updated on <?= $book['updated_at']; ?></small></p>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="" class="btn btn-secondary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
