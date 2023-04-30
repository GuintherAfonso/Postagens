<?php
  include 'classes/post.class.php';
  include 'classes/categoria.class.php';
  include 'menu.php';
  include 'botton.php';

  $post = new Posts();
  
?>

<table>
        <tr>
                <th>TITULO</th>
                <th>CATEGORIA</th>
                <th>DESCRIÇÃO</th>
        </tr>
        <?php
        $lista = $post->listar();
        foreach ($lista as $item){
                

        ?>
        <tr> 
                <td>
                        <?php echo $item['titulo']; ?>
                </td>
                <td>
                        
                        <?php $categoria = $post->traznome($item['idcategoria']);
                         echo $categoria['nome'] ?>
                                
                </td>
               
                <td>
                        <?php echo $item['descricao'];?> 
                </td>
        </tr>
        <?php } ?>
        
</table>                    
  

  








