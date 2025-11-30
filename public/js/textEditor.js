tinymce.init({
    selector: 'textarea',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor paste",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
        "autoresize"
    ],
    toolbar: "insertfile undo redo paste | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    entities: "160,nbsp",
    entity_encoding: "named",
    entity_encoding: "raw"
});