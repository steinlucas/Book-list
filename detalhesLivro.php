<html>
    <head>
    </head>
    <body>
        <h1>Detalhes do livros</h1>
        
        <table>
        <tr>
            <th>Nome livro</th>
            <th>Nome autor</th>
            <th>Nome editora</th>
            <th>Detalhes</th>
        </tr>

        <?php
        foreach($livros as $umLivro){ ?>
        <tr>
            <td>
                <?php echo $umLivro->getTitulo();?>
            </td>

            <td>
                <?php echo $umLivro->getAutor()->getNome();?>
            </td>

            <td>
                <?php echo $umLivro->getEditora()->getNome();?>
            </td>
        </tr>
        <?php } ?>

        </table>
    
    </body>
</html>