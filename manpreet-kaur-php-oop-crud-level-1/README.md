# php_Examen_1er_aval

## 4.
   Con la concatenación podemos agregar el signo de dólar antes del precio del producto.Le indicare en      la siguiente linea como puedo hacer
   ## echo '$'."<td>{$product->price}</td>";

## 5.
  # Tipo de formato del campo : file(archivo)
  # Comprobaciones realizadas antes de aceptar una imagen : de cuanto tamaño el imagen tiene,que         extensión tiene una imagen
  # Que se guarda en la B.D. : una imagen
  # Donde esta la imagen : en servidor pero nosotros vemos el nombre de archivo de imagen en los datos de la taula en phpmyadmin
  # Como recuperarla :

## 6.
Para hacer un cambio de imagen de actualización, necesito modificar la función update() del archivo product.php.
# Primero, cambié la consulta(query) en la que inserto una columna de imagen para actualizar.
# "UPDATE " . $this->table_name . "
 #           SET
  #              name = :name,
   #             price = :price,
   #            description = :description,
   #            category_id  = :category_id,
   #            image =:image
   #        WHERE
   #            id = :id";
Luego agregue algunas líneas después de la siguiente línea para convertir htmlspecialchars :
# $ this-> id = htmlspecialchars (strip_tags ($ this-> id)) ;.
y luego agrego una línea para el parámetro de enlace de la imagen después de la línea que se indica a continuación:
# $ stmt-> bindParam (': id', $ this-> id);
