    <input type="button" class="btn btn-primary" style="float:right" id="addCard" value="Imprimir Reporte"/>
    
    
    
    
    
    <table class="table">
        <thead>
        <tr>
            <th>Nro Vuelo</th>
            <th>Fecha</th>
            <th>Duración</th>
            <th>Tipo Vuelo</th>
            <th>Equipo</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($vuelos as $vuelo){
                echo "<tr>
                        <td>". $vuelo['id'] . "</td>
                        <td>". $vuelo['fecha'] . "</td>   
                        <td>". $vuelo['duracion'] . "</td>  
                        <td>". $vuelo['tipo_vuelo'] . "</td>  
                        <td>". $vuelo['equipo'] . "</td>
                      </tr>";
            }
        ?>

        </tbody>
    </table>
