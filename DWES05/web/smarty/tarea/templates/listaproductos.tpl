    {foreach from=$productos item=producto}
        <p>
        <form id='{$producto->getcodigo()}' action='productos.php' method='post'>

            <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>

            <input type='submit' name='enviar' value='Añadir'/>
{*--Modificación frente al orginal--*}
           {*Le damos valor a la variable código que luego pasaremos por url a modeloOrdenador.php*}
            {$codigo=$producto->getcodigo()}
            
            {*Si la familia del producto es ORDENA entonces se mostrará como enlace*}
            {if $producto->getfamilia() == "ORDENA"}

              {*Pasamos el valor del código por la url*}
              <a href="../tarea/modeloOrdenador.php?codigo={$codigo}">

                {$producto->getnombrecorto()}: {$producto->getPVP()} euros. 

              </a> 

            {*sino se mostrará de manera normal*}
            {else}      

              {$producto->getnombrecorto()}: {$producto->getPVP()} euros. 

            {/if}
{*-- FIN Modificación frente al orginal--*}
       </form>
       
       </p>
    {/foreach}
