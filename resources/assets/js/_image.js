window.addEventListener('DOMContentLoaded', (event) => {
    // Get the image input element
    const imageInput = document.getElementById('image');

    // Check if the image input element exists (it might not be on every page)
    if (imageInput) {
        // Attach the change event listener
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    const imagePreview = document.getElementById('image-preview');
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    }
});
