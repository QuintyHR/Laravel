$(function() {
    $('.toggle-button').change(function() {
        let active = $(this).prop('checked') === true ? 1 : 0;
        let character_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeActive',
            data: {'active': active, 'character_id': character_id},
            success: function(data){
                console.log(data.success)
            }
        });
    })
})
