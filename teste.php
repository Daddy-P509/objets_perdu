<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Teste PHP / JS</title>
</head>
<body>

    <style>
        .table{
            width: 30%;
        }

        .container{
            margin-top: 50px;
        }
    </style>

    <div class="container">
        Dé <select name="" id="de">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <span> - </span>
        à <select name="" id="a">
            <option value="3">3</option>
            <option value="6">6</option>
            <option value="9">9</option>
        </select>
    
        <br><br>
        <button>Testar</button>
    
        <br><br><br>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>


    <script src="./plateforme/js/jquery.js"></script>
    <script src="./plateforme/js/teste.js"></script>
</body>
</html>