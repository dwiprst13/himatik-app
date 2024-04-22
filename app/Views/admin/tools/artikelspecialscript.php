<script>
    tinymce.init({
        selector: 'textarea#isi',
        height: 500,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-size:13px }'
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('img').src = e.target.result;
                document.getElementById('gambarText').style.display = 'none';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById('foto').addEventListener('change', function() {
        readURL(this);
    });

    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    var day = ('0' + currentDate.getDate()).slice(-2);
    var hours = ('0' + currentDate.getHours()).slice(-2);
    var minutes = ('0' + currentDate.getMinutes()).slice(-2);

    document.getElementById('date').value = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
</script>