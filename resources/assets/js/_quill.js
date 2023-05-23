document.addEventListener('DOMContentLoaded', function() {
    // Define the IDs of your editors
    var editorIds = ['brief_description', 'full_description', 'book', 'bookauthor', 'additional1', 'additional2'];

    // Define a map to hold your Quill instances
    var quills = {};

    // Define toolbar options
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        [{ 'direction': 'rtl' }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': [] }],
        [{ 'align': [] }],
        ['clean']
    ];

    // Initialize Quill editors for each id
    editorIds.forEach(function(id) {
        var editor = new Quill('#' + id + '-editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
        });

        // Save the editor instance in the map
        quills[id] = editor;
    });

    // On form submit, set the value of each textarea from the corresponding Quill editor
    document.querySelector('form').addEventListener('submit', function() {
        editorIds.forEach(function(id) {
            var textarea = document.querySelector('textarea[name=' + id + ']');
            textarea.value = quills[id].root.innerHTML;
        });
    });
});
