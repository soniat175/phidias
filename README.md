# phidias
Se realiza el desarrollo con un diseño MVC, separando responsabilidades usando programación orientada a objetos aplicando
herencia con clases y uso de interfaces.
Se realizan 2 endpoint rest GET:
1. Consulta listado completo de empleados extraido desde archivo txt
2. consulta de empleado por identifiación extraido desde archvio txt

El diseño esta pensado para que esté lo suficientemente desacoplado como para poder cambiar de manera sencilla la capa de 
repositorio de extracción de data (en este caso un File), por una fuente distinta por ejemplo de base de datos, 
el contrato expuesto por el repositorio contiene 2 metodos obligatorios findAll y findById, todos los nuevos repositorios 
deben implementar la interfaz IRepository.

Se creo adicionalmente las clases para el consumo del servicio tanto por curl (clase CurlHttpRequestService) como por 
file_get_content (FGCHttpRequestService), ambas clase pueden realizar consumos de servicios Rest GET o POST.
El programa consumeService.php tiene el ejemplo del consumo de los servicios mediante los 2 metodos (curl y file_get_content) 

Se deja la colección de Postman (PHIDIAS.postman_collection.json) para poder probar los servicios.