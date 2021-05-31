$(document).ready(function(){
    divArtikli();
});

// Ispuna tablica

function divArtikli(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaartikli'><thead><tr><th scope='col'>Šifra artikla</th><th scope='col'>Naziv artikla</th><th scope='col'>Opis Artikla</th><th scope='col'>JMJ</th><th scope='col'>Cijena</th><th scope='col'>URL Slike Artikla</th><th scope='col'>Naziv kategorije</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyarticles'></tbody></table>");
    LoadArticles();
}
function divKategorije(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicakategorije'><thead><tr><th scope='col'>ID Kategorije</th><th scope='col'>Naziv kategorije</th><th scope='col'></th><th scope='col'></th><tbody id='tablebodykategorije'></tbody></table>");
    LoadKategorije();
}
function divIzdatnice(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaizdatnice'><thead><tr><th scope='col'>Šifra dokumenta</th><th scope='col'>Tip dokumenta</th><th scope='col'>Datum izdavanja dokumenta</th><th scope='col'>Količina izdavanja</th><th scope='col'>Šifre artikala</th><th scope='col'>Iznos ulaz</th><th scope='col'>Iznos izlaz</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyizdatnice'></tbody></table>");
    LoadIzdatnice();
}
function divPrimke(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaprimke'><thead><tr><th scope='col'>Šifra dokumenta</th><th scope='col'>Tip dokumenta</th><th scope='col'>Datum izdavanja dokumenta</th><th scope='col'>Količina primanja</th><th scope='col'>Šifre artikala</th><th scope='col'>Iznos ulaz</th><th scope='col'>Iznos izlaz</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyprimke'></tbody></table>");
    LoadPrimke();
}

//Učitavanje podataka

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
                    '<td id='+oData[i].sArtikl_Sifra+'><svg onclick="urediArtikl(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                    '<td id='+oData[i].sArtikl_Sifra+'><svg onclick="obrisiArtikl(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                    '</tr>';
                    $('#tablebodyarticles').append(sRow);
                }
                    $('#tablicaartikli').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [7,8 ]}],order: [[ 0, 'desc' ]]});
            }
        });
}
function LoadIzdatnice(){
    $.ajax(
        {
            url:'../action/action.php?action_id=get_izdatnice_crud',
            type:'GET',
            success:function (oData)
            {
                for(var i=0; i<oData.length; i++)
                {
                    var sRow = '<tr id="'+oData[i].sSifraDokumenta+'">'+
                    '<td>'+oData[i].sSifraDokumenta+'</td>'+
                    '<td>'+oData[i].sTipDokumenta+'</td>'+
                    '<td>'+oData[i].dDatumDokumenta+'</td>'+
                    '<td>'+oData[i].nKolicina+'</td>'+
                    '<td>'+oData[i]._Artikli+'</td>'+
                    '<td>'+oData[i].dIznosUlaz+'</td>'+
                    '<td>'+oData[i].dIznosIzlaz+'</td>'+
                    '<td id='+oData[i].sSifraDokumenta+'><svg onclick="urediIzdatnicu(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                    '<td id='+oData[i].sSifraDokumenta+'><svg onclick="obrisiIzdatnicu(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                    '</tr>';
                    $('#tablebodyizdatnice').append(sRow);
                }
                    $('#tablicaizdatnice').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [1,4,7,8 ]}],order: [[ 0, 'desc' ]]});
            }
        });
}
function LoadPrimke(){
    $.ajax(
        {
            url:'../action/action.php?action_id=get_primke_crud',
            type:'GET',
            success:function (oData)
            {
                for(var i=0; i<oData.length; i++)
                {
                    var sRow = '<tr>'+
                    '<td>'+oData[i].sSifraDokumenta+'</td>'+
                    '<td>'+oData[i].sTipDokumenta+'</td>'+
                    '<td>'+oData[i].dDatumDokumenta+'</td>'+
                    '<td>'+oData[i].nKolicina+'</td>'+
                    '<td>'+oData[i]._Artikli+'</td>'+
                    '<td>'+oData[i].dIznosUlaz+'</td>'+
                    '<td>'+oData[i].dIznosIzlaz+'</td>'+
                    '<td id='+oData[i].sSifraDokumenta+'><svg onclick="urediPrimku(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                    '<td id='+oData[i].sSifraDokumenta+'><svg onclick="obrisiPrimku(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                    '</tr>';
                    $('#tablebodyprimke').append(sRow);
                }
                    $('#tablicaprimke').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [1,4,7,8 ]}],order: [[ 0, 'desc' ]]});
            }
        });
}
function LoadKategorije(){
    $.ajax(
        {
        url:'../action/action.php?action_id=get_kategorije_crud',
        type: 'GET',
        success:function (oData){
            for(var i=0;i<oData.length;i++){
                var sRow= '<tr>'+
                '<td>'+oData[i].nIdKategorije+'</td>'+
                '<td>'+oData[i].sNazivKategorije+'</td>'+
                '<td id='+oData[i].nIdKategorije+'><svg onclick="urediKategoriju(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                '<td id='+oData[i].nIdKategorije+'><svg onclick="obrisiKategoriju(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                '</tr>';
                $('#tablebodykategorije').append(sRow);
            }
            $('#tablicakategorije').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [2,3 ]}],order: [[ 0, 'desc' ]]});
        }
    });
}

//uređivanje

function urediArtikl(elem){
}
function urediIzdatnicu(elem){
}
function urediKategoriju(elem){
}
function urediPrimku(elem){
}

//Brisanje

function obrisiArtikl(elem){
    var proceed = confirm("Jeste li sigurni da želite obrisati artikl? Ako postoje povezani dokumenti sa ovim artiklom on će biti trajno obrisan sa njih. Ukoliko je to jedini artikl na dokumentu cijeli dokument biti će obrisan.");
    if (proceed) {
        $.ajax({
            data: 'idartikla=' +elem.parentNode.id,
            url: '../action/action.php?action_id=delete_artikl',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Artikl je uspješno obrisan!");
                } if (msg.success == 0){
                    alert("Artikl nije obrisan iz nepoznatih razloga!");
                }
                divArtikli();
            }
        });
    } else {
        alert("Uspješno ste otkazali brisanje artikla!");
    }
}
function obrisiIzdatnicu(elem){
    var proceed = confirm("Jeste li sigurni da želite obrisati izdatnicu?");
    if (proceed){
        $.ajax({
            data: 'sifradok=' + elem.parentNode.id,
            url: '../action/action.php?action_id=delete_izdatnica',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Izdatnica je uspješno obrisana!");
                } if (msg.success == 0){
                    alert("Izdatnicu nije moguće obrisati zbog nepoznatih razloga.");
                }
                divIzdatnice();
            }
        });
    }
}
function obrisiKategoriju(elem){

}
function obrisiPrimku(elem){
    var proceed = confirm("Jeste li sigurni da želite obrisati primku? Brisanje će biti moguće samo ako artikli sa ove primke imaju dovoljnu količinu za sve izdatnice!");
    if (proceed) {
        $.ajax({
            data: 'sifradok=' +elem.parentNode.id,
            url: '../action/action.php?action_id=delete_primka',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Primka je uspješno obrisana!");
                } if (msg.success == 0){
                    alert("Primku nije moguće obrisati jer količina artikala je manja od potrebne za izdatnice.")
                }
                divPrimke();
            }
        });
    } else {
        alert("Uspješno ste otkazali brisanje primke!");
    }
}