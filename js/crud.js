$(document).ready(function(){
    divArtikli();
});

// Ispuna tablica

function divArtikli(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaartikli'><thead><tr><th scope='col'>Šifra artikla</th><th scope='col'>Naziv artikla</th><th scope='col'>Opis Artikla</th><th scope='col'>JMJ</th><th scope='col'>Cijena</th><th scope='col'>URL Slike Artikla</th><th scope='col'>Naziv kategorije</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyarticles'></tbody></table><button type='button' data-bs-toggle='modal' data-bs-target='#modalAddArtikl' class='btn btn-primary' onclick='dodajArtikl()'>Dodaj Artikl</button>");
    LoadArticles();
}
function divKategorije(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicakategorije'><thead><tr><th scope='col'>ID Kategorije</th><th scope='col'>Naziv kategorije</th><th scope='col'></th><th scope='col'></th><tbody id='tablebodykategorije'></tbody></table><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalAddKategorija'>Dodaj Kategoriju</button>");
    LoadKategorije();
}
function divIzdatnice(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaizdatnice'><thead><tr><th scope='col'>Šifra dokumenta</th><th scope='col'>Tip dokumenta</th><th scope='col'>Datum izdavanja dokumenta</th><th scope='col'>Količina izdavanja</th><th scope='col'>Šifre artikala</th><th scope='col'>Iznos ulaz</th><th scope='col'>Iznos izlaz</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyizdatnice'></tbody></table><button type='button' class='btn btn-primary'>Dodaj Izdatnicu</button>");
    LoadIzdatnice();
}
function divPrimke(){
    $('#divtablica').html("<table class='table table-dark table-striped' id='tablicaprimke'><thead><tr><th scope='col'>Šifra dokumenta</th><th scope='col'>Tip dokumenta</th><th scope='col'>Datum izdavanja dokumenta</th><th scope='col'>Količina primanja</th><th scope='col'>Šifre artikala</th><th scope='col'>Iznos ulaz</th><th scope='col'>Iznos izlaz</th><th scope='col'></th><th scope='col'></th></tr></thead><tbody id='tablebodyprimke'></tbody></table><button type='button' class='btn btn-primary'>Dodaj Primku</button>");
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
                    $('#tablicaartikli').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [7,8 ]}],order: [[ 0, 'asc' ]]});
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
                    $('#tablicaizdatnice').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [1,4,7,8 ]}],order: [[ 0, 'asc' ]]});
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
                    $('#tablicaprimke').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [1,4,7,8 ]}],order: [[ 0, 'asc' ]]});
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
                '<td id='+oData[i].nIdKategorije+'><svg onclick="urediKategoriju(this);" data-bs-toggle="modal" data-bs-target="#modalEditKategorija" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></td>'+
                '<td id='+oData[i].nIdKategorije+'><svg onclick="obrisiKategoriju(this);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></td>'+
                '</tr>';
                $('#tablebodykategorije').append(sRow);
            }
            $('#tablicakategorije').DataTable({language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Croatian.json'},columnDefs: [{ type: 'natural', targets: 0 }, { orderable: false, targets: [2,3 ]}],order: [[ 0, 'asc' ]]});
        }
    });
}

//uređivanje
var idkategorije;
function urediArtikl(elem){
}
function urediIzdatnicu(elem){
}
function urediKategoriju(elem){
    $("#editkategorijaid").html(elem.parentNode.id);
    idkategorije=elem.parentNode.id;
    $("#editkategorijanaziv").val(elem.parentNode.parentNode.firstChild.nextSibling.innerHTML);
}
function urediSpremiKategoriju(){
    if ($("#editkategorijanaziv").val() && $("#editkategorijanaziv").val().trim()){
        $.ajax({
            data: {sifrakat: idkategorije, nazivkat: $("#editkategorijanaziv").val()},
            url: '../action/action.php?action_id=update_kategorija',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Kategorija je uspješno izmjenjena!");
                } else {
                    alert("Kategorija nije izmjenjena, pogreška se dogodila kod baze podataka!");
                }
                divKategorije();
            }
        });
        $('#modalEditKategorija').modal('toggle');
    } else {
        alert("Obavezan je unos naziva kategorije! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)")
    }
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
    var proceed = confirm("Jeste li sigurni da želite obrisati kategoriju?");
    if (proceed) {
        $.ajax({
            data: 'sifrakat=' + elem.parentNode.id,
            url: '../action/action.php?action_id=delete_kategorija',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Kategorija je uspješno obrisana!");
                } if (msg.success == 0){
                    alert("Kategoriju nije moguće obrisati jer postoji artikl sa ovom kategorijom!");
                }
                divKategorije();
            }
        });
    } else{
        alert("Uspješno ste otkazali brisanje kategorije!");
    }
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

// Dodavanje

function dodajNovuKategoriju(){
    if ($("#addkategorijanaziv").val() && $("#addkategorijanaziv").val().trim()){
        $.ajax({
            data: {nazivkat: $("#addkategorijanaziv").val()},
            url: '../action/action.php?action_id=add_kategorija',
            method: 'POST',
            success: function(msg){
                if (msg.success == 1){
                    alert("Kategorija je uspješno dodana!");
                } else {
                    alert("Kategorija nije dodana, pogreška se dogodila kod baze podataka!");
                }
                divKategorije();
            }
        });
        $('#modalAddKategorija').modal('toggle');
    } else {
        alert("Obavezan je unos naziva kategorije! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)")
    }
}
function dodajArtikl(){
    $("#addartiklkategorija").html("");
    $.ajax(
        {
        url:'../action/action.php?action_id=get_kategorije_crud',
        type: 'GET',
        success:function (oData){
            for(var i=0;i<oData.length;i++){
                var sRow= '<option id='+ oData[i].nIdKategorije+'>'+oData[i].sNazivKategorije+'</option>';
                $('#addartiklkategorija').append(sRow);
            }
        }
    });
}
function dodajNoviArtikl(){
    if ($("#addartiklnaziv").val() && $("#addartiklnaziv").val().trim()){
        if ($("#addartiklopis").val() && $("#addartiklopis").val().trim()){
            if ($("#addartikljmj").val() && $("#addartikljmj").val().trim()){
                if ($("#addartiklcijena").val().endsWith('.') == false){
                    if ($("#addartiklcijena").val() && $("#addartiklcijena").val().trim()){
                        if ($("#addartiklurl").val() && $("#addartiklurl").val().trim()){
                            if (isImgLink($("#addartiklurl").val())){
                                $('#modalAddArtikl').modal('toggle');
                                $.ajax({
                                    data: {nazivar: $("#addartiklnaziv").val(), opisar: $("#addartiklopis").val(), jmjar: $("#addartikljmj").val(), cijenaar: $("#addartiklcijena").val(), katar: $('#addartiklkategorija option:selected').attr('id'), urlar:$("#addartiklurl").val()},
                                    url:'../action/action.php?action_id=add_artikl',
                                    type: 'POST',
                                    success: function(msg){
                                        if (msg.success ==1){
                                            alert("Artikl je uspješno dodan");
                                        } else {
                                            alert("Artikl nije dodan, pogreška se dogodila kod baze podataka!");
                                        }
                                        divArtikli();
                                    }
                                })
                            } else {
                                alert("URL koji ste unijeli ne sadržava putanju do slike jednog od formata: jpg|jpeg|gif|png|tiff|bmp!");
                            }
                        } else {
                            alert("Obavezan je unos URL-a slike artikla! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)")
                        }
                    } else{
                        alert("Obavezan je unos cijene artikla! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)");
                    }
                } else {
                    alert("Kod cijene na zadnjem mjestu ne smije biti točka!");
                }
            } else {
                alert("Obavezan je unos jedinične mjere artikla! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)")
            }
        } else {
            alert("Obavezan je unos opisa artikla! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)")
        }
    } else {
        alert("Obavezan je unos naziva artikla! (Nije dovoljno samo napisati razmak ili ostaviti prazno polje)");
    }
    // dohvacanje ida kategorije $('#addartiklkategorija option:selected').attr('id')
    // u slucaju da su svi dobri dodaj ovo $('#modalAddArtikl').modal('toggle');
}

// Dodatne provjere

function isNumberKey(evt)
   {
     var charCode = (evt.which) ? evt.which : evt.keyCode;
     if ($("#addartiklcijena:text").val() == "-" && charCode == 46)
     {
       alert("Nije moguće postaviti - pa .");
       return false;
     }
     if (charCode == 46)
     {
       if ($("#addartiklcijena").val().includes("."))
       {
         alert("Cijena već sadrži decimalnu točku");
        return false;
       }
       if ($("#addartiklcijena:text").val() == "")
       {
        alert("Na prvo mjesto ne može ići točka!");
        return false;
       }
     }
     if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
     {
       alert("Pokušali ste unesti u polje cijene nešto što nije broj/decimalna točka");
        return false;
      }
    else
     {
     return true;
     }
}
function isImgLink(url) {
    if(typeof url !== 'string') return false;
    return(url.match(/^http[^\?]*.(jpg|jpeg|gif|png|tiff|bmp)(\?(.*))?$/gmi) != null);
}