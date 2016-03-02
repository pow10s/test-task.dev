<form method="post" name="search_form">
<div class="container">
    <input id="search_id" name="search_name" class="typeahead" type="text" data-provide="typeahead" autocomplete="off">
    <input type="submit" name="submit_btn"value="send">
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('input.typeahead').typeahead({
            source: function (query, process) {
                $.ajax({
                    url: '/Page/SearchInDb',
                    type: 'POST',
                    dataType: 'JSON',
                    data: 'query=' + query,
                    success: function(data) {
                        console.log(data);
                        process(data);
                    }
                });
            }
        });
    });
</script>

