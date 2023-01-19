<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <title>Teste PHP / JS</title>

</head>
<body>

    <style>
        .table{
            width: 100%;
        }

        .container{
            margin-top: 50px;
        }

        .wrapper{
            margin: 60px auto;
            text-align: center;
        }

        body{
            background-color: #eee; 
        }

        table th , table td{
            text-align: center;
        }

        table tr:nth-child(even){
            background-color: #BEF2F5
        }

        .pagination li:hover{
            cursor: pointer;
        }

        table tbody tr {
            display: none;
        }

        #table-id{
            height: 100px;
            overflow: scroll;
        }

        #maxRows{
            width: 100px;
        }

        .corpo{
            height: 600px;
            overflow: auto;
        }

    </style>

    <div class="wrapper">   
    
        <div class="container">
            

            <span>Dé 5 - á <span class="qtd"></span></span>
		    <h5>Toutes</h5>
            <div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
                <select class  ="form-control" name="state" id="maxRows">
                    <option value="5000">Toutes</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="corpo">
                <table class="table table-striped table-class" id= "table-id">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Descrition</th>
                        </tr>
                    </thead>
                    <tbody class=""></tbody>
                </table>
            </div>
            <table class="table table-striped table-class">
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Descrition</th>
                    </tr>
                </tfoot>
            </table>

            <!--Start Pagination -->
            <div class='pagination-container' >
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li data-page="prev" >
                                <span> &laquo; <span class="sr-only">(current)</span></span>
                            </li>
                            <li data-page="next" id="prev">
                                <span> &raquo; <span class="sr-only">(current)</span></span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    
    <script src="./plateforme/js/jquery.js"></script>
    <script src="./plateforme/js/teste.js"></script>
</body>
</html>