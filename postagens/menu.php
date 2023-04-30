<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Posts</title>
        <link rel="stylesheet" href="style.css"/>
  </head> 
    
  <body>
        <header>
            <div class="menu">
                      
                     <a href="index.php" class="active">HOME</a>
                     <a href="categoria.php">CATEGORIAS</a>
                     <a href="post.php">POSTAR</a>
                     <a href="login.php">LOGIN</a>
                     <?php if(isset($_SESSION['logado'])): ?>
                        <a href="sair.php">DESLOGAR</a>
                     <?php endif; ?>   
            
            </div>
                        
         </header>
            
            
       