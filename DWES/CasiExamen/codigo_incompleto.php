<!DOCTYPE html>
<html>

<head>
    <title>Parque Natural Miguel Herrero - Reservas</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="red_arriba">
        <div></div>
    </div>

    <h1>Parque Natural Miguel Herrero</h1>

    <div class="contenido">
        <div class="contenido_abajo">
            <h2>Reservas</h2>
            <p>El acceso al parque es libre y gratuito, siempre que se respeten las normas de conducta y preservación del entorno. </p>
            <p>No obstante, también disponemos de servicios adicionales, como visita guiada o aula educativa para niños.</p>
            <h3>Horarios y reservas</h3>
            <table class="reservas">
                <tr>
                    <th colspan="5">Visitas con guía:</th>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" class="titulo">Temporada de Verano <br>(01/07 a 30/09)</td>
                    <td colspan="2" class="titulo">Temporada de Invierno <br>(resto del año)</td>
                </tr>
                <tr>
                    <td class="titulo">Horarios:</td>
                    <td colspan="2">10:00 - 13:00<br />
                        16:00 - 19:00</td>
                    <td colspan="2">11:00 -14:00</td>
                </tr>
                <tr>
                    <td rowspan="2" class="titulo">Tarifas:</td>
                    <td>Individual:</td>
                    <td>Grupos:</td>
                    <td>Individual:</td>
                    <td>Grupos:</td>
                </tr>
                <tr>
                    <td>5 &euro; persona</td>
                    <td>3 &euro; persona</td>
                    <td>4 &euro; persona</td>
                    <td>2 &euro; persona</td>
                </tr>
            </table>
            <table border="0" cellspacing="3" cellpadding="3" class="reservas">
                <tr>
                    <th colspan="3">Aula educativa (s&oacute;lo grupos):</th>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class="titulo">Temporada de Verano</td>
                    <td class="titulo">Temporada de Invierno</td>
                </tr>
                <tr>
                    <td class="titulo">Horarios:</td>
                    <td>9:00 - 10:00<br />
                        15:00 - 16:00</td>
                    <td>10:00 - 11:00</td>
                </tr>
                <tr>
                    <td class="titulo">Tarifas:</td>
                    <td>25 &euro;</td>
                    <td>25 &euro;</td>
                </tr>
            </table>
            <h3>Contacto</h3>
            <p>Si est&aacute;s pensando visitar el parque, por favor, rellena este formulario:</p>

            <form action="enviar_reservar.php" method="POST">
                <table border="0" cellspacing="3" cellpadding="3" class="reservas">
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" name="nombre"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" name="email"></td>
                    </tr>

                    <tr>
                        <td><label for="fecha">Fecha de visita:</label></td>
                        <td><input type="date" name="fecha"></td>
                    </tr>
                    <tr>
                        <td><label for="personas">Numero de personas:</label></td>
                        <td><input type="number" name="personas" min="1" required></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="edad">Edad del grupo</label>
                        </td>
                        <td>
                            <input type="radio" name="edad" value="5_8">De 5 a 8 <br>
                            <input type="radio" name="edad" value="9_14">De 9 a 14<br>
                            <input type="radio" name="edad" value="15_18">De 15 a 18<br>
                            <input type="radio" name="edad" value="adulto">Adulto
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="visitaGuiada">
                                <input type="checkbox" name="visitaGuiada" value="guia">
                                Deseamos visita guiada
                            </label><br>
                            <label for="aulaEducativa">
                                <input type="checkbox" name="aulaEducativa" value="aula">
                                Deseamos asistir al aula educativa (solo niños)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Observaciones</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea name="observaciones" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="enviar" value="Enviar">
                        </td>
                    </tr>






                </table>
            </form>




        </div>
    </div>

    <div class="red_abajo">
        <div></div>
    </div>
</body>

</html>