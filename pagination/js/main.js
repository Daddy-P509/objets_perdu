$(document).ready(function(){

    function AllPost(){
        var retorno = false;

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'https://jsonplaceholder.typicode.com/comments',
            async: false,
            data: null,
            success: function (data) {
                retorno = data
            },
        });
        return retorno;

    }

    const api = AllPost()

    var jsonArrObj = [ 
        { id: 1, first_name: 'Arjun', last_name: 'A' },
        { id: 2, first_name: 'Kalyan', last_name: 'J' },
        { id: 3, first_name: 'Raj', last_name: 'Kiran' },
        { id: 4, first_name: 'Naveen', last_name: 'A' },
        { id: 5, first_name: 'Pravinh', last_name: 'A' },
        { id: 6, first_name: 'Srinivas', last_name: 'S' },
        { id: 7, first_name: 'Mahipal', last_name: 'K' },
        { id: 8, first_name: 'Sathish', last_name: 'Y' },
        { id: 9, first_name: 'Aravind', last_name: 'A' },
        { id: 10, first_name: 'Phani', last_name: 'C' }, 
        { id: 11, first_name: 'Wilson', last_name: 'R' }, 
        { id: 12, first_name: 'Paule', last_name: 'Q' },
        { id: 13, first_name: 'Raj', last_name: 'Kiran' },
        { id: 14, first_name: 'Naveen', last_name: 'A' },
        { id: 15, first_name: 'Pravinh', last_name: 'A' },
        { id: 16, first_name: 'Srinivas', last_name: 'S' },
        { id: 17, first_name: 'Mahipal', last_name: 'K' },
        { id: 18, first_name: 'Sathish', last_name: 'Y' },
        { id: 19, first_name: 'Aravind', last_name: 'A' },
        { id: 20, first_name: 'Phani', last_name: 'C' }, 
        { id: 21, first_name: 'Wilson', last_name: 'R' }, 
        { id: 22, first_name: 'Paule', last_name: 'Q' } 
    ]

    var page_number = 1;
    var records_per_pag = 10;
    var total_pag = Math.ceil(jsonArrObj.length / records_per_pag);

    $.fn.displayPaginationButtons = function(){
        var button_text = `<li class="page-item"><a class="page-link" href="#" aria-label="Previous">&laquo;</a></li> `;

        var active = '';
        for(var i=1; i<=total_pag; i++){

            if(i==1){
                active = 'active';
            }else{
                active = '';
            }

            button_text = button_text + `<li class="page-item"><a id="page_index${i}" class="page-link page_index${active}" href="#">${i}</a></li>`;

        }

        button_text = button_text + `<li class="page-item"><a class="page-link" href="#" onClick="javascript:$.fn.nextPage();" aria-label="Next">&raquo;</a></li>`;



        $('.pagination').text(); 
        $('.pagination').append(button_text); 
    }

    $.fn.displayPaginationButtons();

    $.fn.displayTableData = function(){
        var start_index = (page_number - 1) * records_per_pag;
        var end_index = start_index + (records_per_pag - 1);
        end_index = (end_index >= jsonArrObj.length) ? jsonArrObj.length - 1 : end_index;
        var inner_html = '';

        for (var i = start_index; i <= end_index; i++) {
            inner_html = inner_html+'<tr>'+
                                        '<td>'+(i+1)+'</td>'+
                                        '<td>'+jsonArrObj[i].first_name+'</td>'+
                                        '<td>'+jsonArrObj[i].last_name+'</td>'+
                                    '</tr>';
        }

        $("table tbody tr").remove();
        $("table tbody").append(inner_html);

        $(".page_index").removeClass('active');
        $("#page_index"+page_number).addClass('active');
    }

    $.fn.nextPage = function(){
        page_number++;
        $.fn.displayTableData();
    }
    $.fn.displayTableData();



});