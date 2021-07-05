
const bookCover = document.querySelector('#bookCover');
const bookCoverPreview = document.querySelector('#bookCoverPreview');

if (bookCover && bookCoverPreview) {
    bookCover.addEventListener('change', () => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(bookCover.files[0])
        fileReader.onload = (e) => {
            bookCoverPreview.src = e.target.result;
        }
    })
}
