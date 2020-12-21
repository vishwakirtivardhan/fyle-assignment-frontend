
// ********* ********* This is Js code ********* ********* //

function addInput(valuebank,text){
//alert(valuebank);
document.getElementById('bank').value=valuebank;
document.getElementById('search').value=text;
document.getElementById('banklist').style.display="none";
branchcheck(valuebank);
}


 // ********* This is Ajax Code Js for Getting the Table after selecting the City Name ********* //
 function bankautocomplete(bankname) {
    //let bank_id = document.getElementById('bank').value;
    console.log(bankname);
    // bankname=bankname.
    var reqes = new XMLHttpRequest();
    reqes.open("POST", "https://test1-php.herokuapp.com/ajaxbank.php?bankname="+bankname.toUpperCase(), true);
    reqes.send();
    reqes.onreadystatechange = function() {
        if (reqes.readyState == 4 && reqes.status === 200) {
            document.getElementById('banklist').style.display="block";
            document.getElementById('banklist').innerHTML = reqes.responseText;
        }
    }
}
// ********* End ********* //





 // ********* This is Ajax Code Js for Getting the Table after selecting the City Name ********* //
 function getbranchdetails(city) {
    let bank_id = document.getElementById('bank').value;
    //console.log(bank_id);
    var reqes = new XMLHttpRequest();
    reqes.open("POST", "https://test1-php.herokuapp.com/detailsbranch.php?city=" + city + "&&bank_id=" + bank_id, true);
    reqes.send();
    reqes.onreadystatechange = function() {
        if (reqes.readyState == 4 && reqes.status === 200) {
            document.getElementById('tables').style.display="block";
            document.getElementById('banksdetails').innerHTML = reqes.responseText;
        }
    }
}
// ********* End ********* //

// ********* This is Ajax Js code for getting the City Name. *********//
function branchcheck(data) {
    console.log(data);
    var req = new XMLHttpRequest();
    req.open("POST", "https://test1-php.herokuapp.com/ajaxbranch.php?datavalue="+data, true);
    req.send();

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status === 200) {
    
            document.getElementById('branch').innerHTML = req.responseText;
    
        }
    }
}
// ********* End *********//


//  ********* This Js code for the search the table content ********* //
$(document).ready(function() {
    $(".search").keyup(function() {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {
            'containsi': function(elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                    (match[3] || "").toLowerCase()) >= 0;
            }
        });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
            $(this).attr('visible', 'false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
            $(this).attr('visible', 'true');
        });

        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if (jobCount == '0') {
            $('.no-result').show();
        } else {
            $('.no-result').hide();
        }
    });
});
// *********  End  *********//