
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            img{
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            body{
                background-color: MidnightBlue;
            }
        </style>
        <link rel="stylesheet" type="text/css"> 
    </head>
    <body>
        <script>
            document.body.addEventListener("keydown", function (event) {
                if (event.keyCode == 32) {
                window.location.replace("pacman.php");
                }
            });
        </script>
        <table>
            <tr>
                <img src="pacmanlogo.png" alt="pacman" style="width:50%;"></img>    
            </tr>
        </table>
        <tr>
            <a href="pacman.php">
                <img src="start.png" alt="start" style="width:50%;"></img>
            </a>
        </tr>
    </body>
</html>
