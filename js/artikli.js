$(document).ready(function(){
    LoadArticles();
});
function LoadArticles(){
    $.ajax(
        {
            url:'action/action.php?action_id=get_artikli',
            type:'GET',
            success:function (oData)
            {
                for(var i=0; i<oData.length; i++)
                {
                    var sRow = '<tr>'+
                    '<td>'+oData[i].Artikl.sArtikl_Sifra+'</td>'+
                    '<td>'+oData[i].Artikl.sArtikl_Naziv+'</td>'+
                    '<td>'+oData[i].Artikl.sArtikl_JedMj+'</td>'+
                    '<td>'+oData[i].Artikl.dArtikl_Cijena+'</td>'+
                    '<td>'+oData[i].KolicinaUlaz+'</td>'+
                    '<td>'+oData[i].IznosUlaz+'</td>'+
                    '<td>'+oData[i].KolicinaIzlaz+'</td>'+
                    '<td>'+oData[i].IznosIzlaz+'</td>'+
                    '<td>'+oData[i].StanjeKolicina+'</td>'+
                    '<td>'+oData[i].StanjeIznos+' </td>'+
                    '</tr>';
                    $('#tablebodyarticles').append(sRow);
                }
                    $('#tablicaartikli').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }],order: [[ 0, 'desc' ]]});
            }
        });
}
