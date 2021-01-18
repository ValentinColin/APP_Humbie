$(document).ready(function () {
    $('#upload').click(
        function () {
            $('#table').tableExport({
                type: 'excel'
            })
        }
)
})