<h2>Nueva nota</h2>
    <form action='includes/procesarnuevanota.php' method='post'>
        <div class='form-group'>
            <input type='text' class='form-control' name='titulonota' placeholder='Título de la nueva nota'>
            <input type='text' name='subtitulonota' class='form-control' placeholder='Subtitulo de la nueva nota'>
            <label for="colornota">Elige el coror de tu nota</label>
            <select name='colornota'>
                <option value='blanco' class='text-center blanco'>Blanco</option>
                <option value='gris' class='text-center gris'>Gris</option>
                <option value='verde' class='text-center verde'>Verde</option>
                <option value='azul' class='text-center azul'>Azul</option>
                <option value='amarillo' class='text-center amarillo'>Amarillo</option>
                <option value='naranja' class='text-center naranja'>Naranja</option>
            </select>

        </div>
        <div class='form-group'>
            <label class='control-label'>Texto de la nota</label>
            <textarea name='textonota' class='form-control' rows='7'></textarea>
        </div>
        <input type='submit' value='Enviar'>
    </form>
