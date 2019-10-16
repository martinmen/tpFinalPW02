<?php

//var_dump($_SESSION);
$usuario = $_SESSION['cliente'] ;

?>

<html>

<body>
<h1>Bienvenido <?php echo $usuario ?> </h1>
<?php
$longitud = 6;
function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}

//Ejemplo de uso

echo generarCodigo(6); // genera un código de 6 caracteres de longitud.
?>

<li class="nav-item">
    <a class="nav-link" href="CerrarSession.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
    <a class="nav-link" href="crearReserva.php"><i class="fas fa-sign-out-alt"></i> crear reserva</a>
    <form class="form-inline" method="post" action="/clienteHome.php">
        <input class="form-control mr-sm-3" name="busca" type="search" placeholder="Cabina" aria-label="Search">
        <button class="btn submit buscar" type="submit" >Buscar</button>
    </form>
</li>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nro Vuelo</th>
        <th scope="col">fecha</th>
        <th scope="col">duracion</th>
        <th scope="col">cabina</th>
        <th scope="col">Tipo vuelo</th>
        <th scope="col">Equipo</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $conn=mysqli_connect("localhost","root", "1234","tpfinal");
    $sql="SELECT * FROM vuelo";
    $result=mysqli_query($conn,$sql);

    $busca= "";
    $busca=$_POST['busca'];

    if($busca== ""){
        $sql="SELECT * FROM vuelo";
        $result=mysqli_query($conn,$sql);

    }else{$sql = "SELECT * FROM vuelo WHERE cabina LIKE '%".$busca."%'";
        $result=mysqli_query($conn,$sql );
        if(mysqli_query($conn,$sql )) {echo "Resultado busqueda";}else{echo "No se encontro coincidencias";}
    }
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fecha']."</td>";
        echo "<td>".$row['duracion']."</td>";
        echo "<td>".$row['cabina']."</td>";
        echo "<td>".$row['tipo_vuelo']."</td>";
        echo "<td>".$row['equipo']."</td>";
      //  echo "<td><a href=\"delete&&id= a><td>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>
</body>
</html>