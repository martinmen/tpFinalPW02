<html>
<body>
    <h1>Bienvenido Administrador</h1>

    <li class="nav-item">
        <a class="nav-link" href="../CerrarSession.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión </a>
    </li>


    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>


    <table class="table">
        <thead>
        <tr>
            <th>Nro Vuelo</th>
            <th>Fecha</th>
            <th>Duración</th>
            <th>Tipo Vuelo</th>
            <th>Equipo</th>
            <th>Origen</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn=mysqli_connect("localhost","root", "","tpfinal");
        $sql="SELECT * FROM vuelos";
        $result=mysqli_query($conn,$sql);

        while ($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['fecha']."</td>";
            echo "<td>".$row['duracion']."</td>";
            echo "<td>".$row['tipo_vuelo']."</td>";
            echo "<td>".$row['equipo']."</td>";
            echo "<td>".$row['origen']."</td>";
            echo "<td><a href=\"delete&&id= a><td>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>


</body>
 </html>