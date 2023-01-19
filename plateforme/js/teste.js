$(document).ready(function () {

    // var de = 0;
    // var a = 5;

    // function pagination(de, a){

    //     const paginate = function (array, index, size) {
    //         // transform values
    //         index = Math.abs(parseInt(index));
    //         index = index > 0 ? index - 1 : index;
    //         size = parseInt(size);
    //         size = size < 1 ? 1 : size;

    //         // filter
    //         return [...(array.filter((value, n) => {
    //             return (n >= (index * size)) && (n < ((index+1) * size))
    //         }))]
    //     }

    //     var items = [ 
    //         { id: 1, first_name: 'Arjun', last_name: 'A' },
    //         { id: 2, first_name: 'Kalyan', last_name: 'J' },
    //         { id: 3, first_name: 'Raj', last_name: 'Kiran' },
    //         { id: 4, first_name: 'Naveen', last_name: 'A' },
    //         { id: 5, first_name: 'Pravinh', last_name: 'A' },
    //         { id: 6, first_name: 'Srinivas', last_name: 'S' },
    //         { id: 7, first_name: 'Mahipal', last_name: 'K' },
    //         { id: 8, first_name: 'Sathish', last_name: 'Y' },
    //         { id: 9, first_name: 'Aravind', last_name: 'A' },
    //         { id: 10, first_name: 'Phani', last_name: 'C' }, 
    //         { id: 11, first_name: 'Wilson', last_name: 'R' }, 
    //         { id: 12, first_name: 'Paule', last_name: 'Q' } 
    //     ]

    //     var transform = paginate(items, de, a);
    //     var linhas = [];

    //     if (transform && transform.length) {
    //         var linhas = [];
    //         transform.forEach(el => {
    //             var linha = "<tr>";
    //             linha += "<td>" + el.id + "</td>";
    //             linha += "<td>" + el.first_name + "</td>";
    //             linha += "<td>" + el.last_name + "</td>";
    //             linha += "</tr>";
    //             linhas.push(linha);
    //         });

    //         $('.table tbody').empty();
    //         $('.table tbody').append(linhas);
    //     }
    // }

    // pagination(de, a)

    // $(document).on('click', '.pagination li', function(){
    //     var pag = $(this).val();

    //     // if(pag == 20){
    //     //     de = 1;
    //     //     pagination(de, pag)
    //     // }

    // });

    function buscarAllPais() {
        var retorno = false;

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'https://jsonplaceholder.typicode.com/comments',
            async: false,
            data: null,
            success: function (data) {
                retorno = data
                pais(data)
            },
        });
        return retorno;
    }

    buscarAllPais();

    function pais(data){
        var linhas = [];
        data.forEach( el => {
            var linha = `<tr>`;
                linha +=`<td>${el.name}</td>`;
                linha +=`<td>${el.email}</td>`;
                linha +=`<td>${el.body}</td>`;
            linha +=`</tr>`;
            linhas.push(linha);
        })
        $('#table-id').append(linhas);
        $('.qtd').append(data.length);
    }


    
    //getPagination('.table-class');
    //getPagination('table');
    
    /*					PAGINATION 
    - on change max rows select options fade out all rows gt option value mx = 5
    - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
    - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
    - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
    - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
    */
   
   
   getPagination('#table-id');
    function getPagination(table) {
        var lastPage = 1;

        $('#maxRows')
            .on('change', function (evt) {
                //$('.paginationprev').html('');						// reset pagination

                lastPage = 1;
                $('.pagination')
                    .find('li')
                    .slice(1, -1)
                    .remove();
                var trnum = 0; // reset tr counter
                var maxRows = parseInt($(this).val()); // get Max Rows from select option

                if (maxRows == 5000) {
                    $('.pagination').hide();
                } else {
                    $('.pagination').show();
                }

                var totalRows = $(table + ' tbody tr').length; // numbers of rows
                $(table + ' tr:gt(0)').each(function () {
                    // each TR in  table and not the header
                    trnum++; // Start Counter
                    if (trnum > maxRows) {
                        // if tr number gt maxRows

                        $(this).hide(); // fade it out
                    }
                    if (trnum <= maxRows) {
                        $(this).show();
                    } // else fade in Important in case if it ..
                }); //  was fade out to fade it in
                if (totalRows > maxRows) {
                    // if tr total rows gt max rows option
                    var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                    //	numbers of pages
                    for (var i = 1; i <= pagenum;) {
                        // for each page append pagination li
                        $('.pagination #prev')
                            .before(
                                '<li data-page="' +
                                i +
                                '">\
                  <span>' +
                                i++ +
                                '<span class="sr-only">(current)</span></span>\
                </li>'
                            )
                            .show();
                    } // end for i
                } // end if row count > max rows
                $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
                $('.pagination li').on('click', function (evt) {
                    // on click each page
                    evt.stopImmediatePropagation();
                    evt.preventDefault();
                    var pageNum = $(this).attr('data-page'); // get it's number

                    var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                    if (pageNum == 'prev') {
                        if (lastPage == 1) {
                            return;
                        }
                        pageNum = --lastPage;
                    }
                    if (pageNum == 'next') {
                        if (lastPage == $('.pagination li').length - 2) {
                            return;
                        }
                        pageNum = ++lastPage;
                    }

                    lastPage = pageNum;
                    var trIndex = 0; // reset tr counter
                    $('.pagination li').removeClass('active'); // remove active class from all li
                    $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                    // $(this).addClass('active');					// add active class to the clicked
                    limitPagging();
                    $(table + ' tr:gt(0)').each(function () {
                        // each tr in table not the header
                        trIndex++; // tr index counter
                        // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                        if (
                            trIndex > maxRows * pageNum ||
                            trIndex <= maxRows * pageNum - maxRows
                        ) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        } //else fade in
                    }); // end of for each tr in table
                }); // end of on click pagination list
                limitPagging();
            })
            .val(5)
            .change();

        // end of on select change

        // END OF PAGINATION
    }

    function limitPagging() {
        // alert($('.pagination li').length)

        if ($('.pagination li').length > 7) {
            if ($('.pagination li.active').attr('data-page') <= 3) {
                $('.pagination li:gt(5)').hide();
                $('.pagination li:lt(5)').show();
                $('.pagination [data-page="next"]').show();
            } if ($('.pagination li.active').attr('data-page') > 3) {
                $('.pagination li:gt(0)').hide();
                $('.pagination [data-page="next"]').show();
                for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                    $('.pagination [data-page="' + i + '"]').show();

                }

            }
        }
    }

    $(function () {
        // Just to append id number for each row
        $('table tr:eq(0)').prepend('<th> ID </th>');

        var id = 0;

        $('table tr:gt(0)').each(function () {
            id++;
            $(this).prepend('<td>' + id + '</td>');
        });
    });

    //  Developed By Yasser Mas
    // yasser.mas2@gmail.com


});