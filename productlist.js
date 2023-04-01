<script>
    $(document).ready(function() {
        $('form').submit(function (event) {
            event.preventDefault();
            var form = $(this);
            var formData = form.serialize();
            var button = form.find('button[type="submit"]');
            button.prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: 'addtocart.php',
                data: formData,
                success: function (response) {
                    console.log(response);
                    button.prop('disabled', false);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                    button.prop('disabled', false);
                }
            });
        })
});
</script>
