$(document).ready(function(){

    $('button').click(function(){

        var de = $('#de').val();
        var a = $('#a').val();
        const paginate = function (array, index, size) {
            // transform values
            index = Math.abs(parseInt(index));
            index = index > 0 ? index - 1 : index;
            size = parseInt(size);
            size = size < 1 ? 1 : size;
    
            // filter
            return [...(array.filter((value, n) => {
                return (n >= (index * size)) && (n < ((index+1) * size))
            }))]
        }
        
        // var array = [
        //     {id: "1"}, {id: "2"}, {id: "3"}, {id: "4"}, {id: "5"}, {id: "6"}, {id: "7"}, {id: "8"}, {id: "9"}, {id: "10"}
        // ];

        var items = [ 
            { id: 1, first_name: 'Arjun', last_name: 'A' },
            { id: 2, first_name: 'Kalyan', last_name: 'J' },
            { id: 3, first_name: 'Raj', last_name: 'Kiran' },
            { id: 4, first_name: 'Naveen', last_name: 'A' },
            { id: 5, first_name: 'Pravinh', last_name: 'A' },
            { id: 6, first_name: 'Srinivas', last_name: 'S' },
            { id: 7, first_name: 'Mahipal', last_name: 'K' },
            { id: 8, first_name: 'Sathish', last_name: 'Y' },
            { id: 9, first_name: 'Aravind', last_name: 'A' },
            { id: 10, first_name: 'Phani', last_name: 'C' } 
        ]

        var transform = paginate(items, de, a);
        var linhas = [];

        if (transform && transform.length) {
            var linhas = [];
            transform.forEach(el => {
                var linha = "<tr>";
                linha += "<td>" + el.id + "</td>";
                linha += "<td>" + el.first_name + "</td>";
                linha += "<td>" + el.last_name + "</td>";
                linha += "</tr>";
                linhas.push(linha);
            });
            $('.table tbody').empty();
            $('.table tbody').append(linhas);
        }

    });


});