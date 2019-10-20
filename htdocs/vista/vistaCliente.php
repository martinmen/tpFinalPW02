
<html>

<body>
<?php
$longitud = 6;
function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}
//
////Ejemplo de uso
//
//echo generarCodigo(6); // genera un código de 6 caracteres de longitud.
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">VUELOS</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form class="form-inline" method="post" action="/clienteHome.php">
            <input class="form-control mr-sm-3" name="busca" type="search" placeholder="Cabina" aria-label="Search">
            <button class="btn btn-primary " type="submit" >Buscar</button>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nro Vuelo</th>
                    <th>Fecha</th>
                    <th>Duración</th>
                    <th>Cabina</th>
                    <th>Tipo Vuelo</th>
                    <th>Equipo</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $conn=mysqli_connect("localhost","root", "admin","tpfinal");
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
        </div>
    </div>
</div>

</body>
</html>