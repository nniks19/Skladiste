$(document).ready(function(){
    divArtikli();
});
function divArtikli(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaartikli'><thead><tr><th scope='col'>Šifra artikla</th><th scope='col'>Naziv artikla</th><th scope='col'>Opis Artikla</th><th scope='col'>JMJ</th><th scope='col'>Cijena</th><th scope='col'>URL Slike Artikla</th><th scope='col'>Naziv kategorije</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyarticles'></tbody></table>");
    LoadArticles();
}
function divIzdatnice(){
    document.getElementById("divtablica").innerHTML = "Izdatnice";
}
function divPrimke(){
    document.getElementById("divtablica").innerHTML = "Primke";
}
function LoadArticles(){
    $.ajax(
        {
            url:'../action/action.php?action_id=get_artikli_crud',
            type:'GET',
            success:function (oData)
            {
                for(var i=0; i<oData.length; i++)
                {
                    var sRow = '<tr>'+
                    '<td>'+oData[i].sArtikl_Sifra+'</td>'+
                    '<td>'+oData[i].sArtikl_Naziv+'</td>'+
                    '<td>'+oData[i].sArtikl_Opis+'</td>'+
                    '<td>'+oData[i].sArtikl_JedMj+'</td>'+
                    '<td>'+oData[i].dArtikl_Cijena+'</td>'+
                    '<td class="cell">'+oData[i].sArtikl_URL+'</td>' +
                    '<td>'+oData[i].sArtikl_Kategorija+'</td>'+
                    '<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                    '<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                    '</tr>';
                    $('#tablebodyarticles').append(sRow);
                }
                    $('#tablicaartikli').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [7,8 ]}],order: [[ 0, 'desc' ]]});
            }
        });
}
function LoadDokumenti(){

}