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
        
        var array = [
            {id: "1"}, {id: "2"}, {id: "3"}, {id: "4"}, {id: "5"}, {id: "6"}, {id: "7"}, {id: "8"}, {id: "9"}, {id: "10"}
        ];

        var transform = paginate(array, de, a);
       
        console.log(transform);

    });


});