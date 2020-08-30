Ahora en contact.php podemos recopilar los datos ingresados ​​por el usuario en diferentes campos usando $ _RQUEST. Supongamos que queremos ver qué datos ha ingresado el usuario en el campo de nombre, luego el código para hacerlo será:

<? php
$ nombre = $ _ SOLICITUD ['nombre'];
echo $ nombre;
?>

Aquí está la salida del formulario de contacto:
En el archivo contact.html anterior, hemos utilizado POST como método para enviar datos desde el formulario. Pero php nos permite usar $ _GET y $ _COOKIE también
