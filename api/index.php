<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
    <title>Cotizador de lanchas</title>
    <script>
        var price = new Array()
        for (var i = 0; i < 7; i++) {
            price.push(0);
        }

        function extractURL(str) {
            return str.split('.')[1];
        }

        function isValidURL(strURL) {
            const str = extractURL(strURL);
            const isvalid = str == 'boattrader' || str == 'popyachts' || str == 'yachtworld' || str == 'boats'
            return isvalid;
        }

        function validURL(str) {
            var pattern = new RegExp("((?:(http|https|Http|Https|rtsp|Rtsp):\\/\\/(?:(?:[a-zA-Z0-9\\$\\-\\_\\.\\+\\!\\*\\'\\(\\)" +
                "\\,\\;\\?\\&\\=]|(?:\\%[a-fA-F0-9]{2})){1,64}(?:\\:(?:[a-zA-Z0-9\\$\\-\\_" +
                "\\.\\+\\!\\*\\'\\(\\)\\,\\;\\?\\&\\=]|(?:\\%[a-fA-F0-9]{2})){1,25})?\\@)?)?" +
                "((?:(?:[a-zA-Z0-9][a-zA-Z0-9\\-]{0,64}\\.)+" // named host
                +
                "(?:" // plus top level domain
                +
                "(?:aero|arpa|asia|a[cdefgilmnoqrstuwxz])" +
                "|(?:biz|b[abdefghijmnorstvwyz])" +
                "|(?:cat|com|coop|c[acdfghiklmnoruvxyz])" +
                "|d[ejkmoz]" +
                "|(?:edu|e[cegrstu])" +
                "|f[ijkmor]" +
                "|(?:gov|g[abdefghilmnpqrstuwy])" +
                "|h[kmnrtu]" +
                "|(?:info|int|i[delmnoqrst])" +
                "|(?:jobs|j[emop])" +
                "|k[eghimnrwyz]" +
                "|l[abcikrstuvy]" +
                "|(?:mil|mobi|museum|m[acdghklmnopqrstuvwxyz])" +
                "|(?:name|net|n[acefgilopruz])" +
                "|(?:org|om)" +
                "|(?:pro|p[aefghklmnrstwy])" +
                "|qa" +
                "|r[eouw]" +
                "|s[abcdeghijklmnortuvyz]" +
                "|(?:tel|travel|t[cdfghjklmnoprtvwz])" +
                "|u[agkmsyz]" +
                "|v[aceginu]" +
                "|w[fs]" +
                "|y[etu]" +
                "|z[amw]))" +
                "|(?:(?:25[0-5]|2[0-4]" // or ip address
                +
                "[0-9]|[0-1][0-9]{2}|[1-9][0-9]|[1-9])\\.(?:25[0-5]|2[0-4][0-9]" +
                "|[0-1][0-9]{2}|[1-9][0-9]|[1-9]|0)\\.(?:25[0-5]|2[0-4][0-9]|[0-1]" +
                "[0-9]{2}|[1-9][0-9]|[1-9]|0)\\.(?:25[0-5]|2[0-4][0-9]|[0-1][0-9]{2}" +
                "|[1-9][0-9]|[0-9])))" +
                "(?:\\:\\d{1,5})?)" // plus option port number
                +
                "(\\/(?:(?:[a-zA-Z0-9\\;\\/\\?\\:\\@\\&\\=\\#\\~" // plus option query params
                +
                "\\-\\.\\+\\!\\*\\'\\(\\)\\,\\_])|(?:\\%[a-fA-F0-9]{2}))*)?" +
                "(?:\\b|$)");
            return !!pattern.test(str);
        }

        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            console.log(parts)
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            console.log(parts.join("."));
            return parts.join(".")
        }

        function addPrice(value) {
            console.log(isValidURL(value.value))
            if (validURL(value.value)) {
                //if (isValidURL(value.value))
                price[value.name[4]] = 9900
            } else {
                price[value.name[4]] = 0
            };
            var total = price.reduce(function(a, b) {
                return a + b;
            }, 0);

            const totalComas = numberWithCommas(total)
            console.log(totalComas)

            document.getElementById("price").innerHTML = '$' + totalComas;

        }
    </script>
</head>

<body>
    <div class="formulario">
        <div class="banner">


            <h2>¡Cotiza tu embarcación!</h2>
        </div>

        <form method="POST">


            <div class="item datos">
                <div class="lancha">
                    <p>¿Donde quieres la lancha?</p>
                    <select name="links" id="" required>
                    <option value="">Elija un país</option>
                    <option value="1">Chile</option>
                    <option value="2">Colombia</option>
                    <option value="3">México</option>
                    <option value="4">Peru</option>
                    <option value="5">Uruguay</option>
                </select>
                    <input type="text" name="lugar" placeholder="Lugar/Puerto" />
                </div>
                <div class="nombre">
                    <p>Datos</p>
                    <div class="texts">
                        <input type="text" name="nombre" placeholder="Nombre" />
                        <input type="text" name="apellido" placeholder="Apellido" />
                    </div>
                </div>
                <div class="email">

                    <input type="email" name="email" placeholder="E-mail" />
                </div>
                <div class="telefono">
                    <p>Teléfono</p>
                    <input type="text" name="telefono" placeholder="Ej: +56 9 9475 8427" />
                </div>
                <div class="btn ">
                    <button type="submit " href='/' name='enviar'>COTIZAR</button>
                </div>
            </div>
            <div class="item links">
                <p>Links <br>
                    <b>¡Ingresa el o los links de la embarcación y nosotros te la cotizaremos puesta donde quieras!</b>
                </p>
                <div class="link-list">

                    <input type="text" name="link1" id='link1' onblur="addPrice(link1)" placeholder=" Link de lancha (Requerido) " required/>
                    <input type="text " name="link2" id='link2' onblur="addPrice(link2)" " placeholder="Link de lancha " />
                    <input type="text " name="link3 " id='link3' onblur="addPrice(link3) " " placeholder="Link de lancha " />
                    <input type="text " name="link4" id='link4' onblur="addPrice(link4)" " placeholder="Link de lancha " />
                    <input type="text " name="link5 " id='link5' onblur="addPrice(link5) " " placeholder="Link de lancha " />
                    <input type="text " name="link6" id='link6' onblur="addPrice(link6)" " placeholder="Link de lancha " />
                    <input type="text " name="link7 " id='link7' onblur="addPrice(link7) " " placeholder="Link de lancha " />

                </div>
                <div class="total ">
                    <span>Total </span>
                    <span class="price " id='price'>$0</span>

                </div>

            </div>
        </form>

    </div>
    <?php
        include("correo.php")
    ?>
</body>

</html>