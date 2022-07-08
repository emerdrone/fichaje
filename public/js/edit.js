$(function () {
    $('#select-provincia').on('change', OnSelectProvinciaChange);
});


function OnSelectProvinciaChange()
{
    var provincia_id = $(this).val();
    var html_select = '<option value=">Seleccione Localidad</option>'
    $.get('/api/empresa/' + provincia_id +'/localidad', function (data) {
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>'

        $('#select-localidad').html(html_select)
    });
}
