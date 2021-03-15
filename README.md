docker-compose up -d

docker ps

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan config:cache

docker-compose exec app php artisan migrate:fresh --seed

### Backend Test: Desafío Envíame

El siguiente desafío, busca conocer más respecto a tus habilidades técnicas para abordar y solucionar diferentes problemas. El desafío consta de 7 etapas, las cuales, evaluaremos de manera independiente.

**Asegurate de dejar tu trabajo en un repositorio de github y al finalizar tu tarea nos compartes el repositorio donde deben incluirse todas las instrucciones para que podamos ejecutar tu trabajo de manera local.**

#### Importante: ####
**Los lenguajes a utilizar pueden ser: php, python, node.js**

En caso de preguntas dirigete a: *tech-test@enviame.io*, usando el asunto [Backend-Test]

### Ejercicio 1: Docker

Configura un ambiente en docker que permita ejecutar un entorno web con el stack a tu elección.
El contenedor de la base de datos debe ser diferente al que contenga tu aplicación, ej: Contenedor 1: Nginx, Contenedor 2: Mysql (composición de servicios docker)

### Ejercicio 2: API REST + CRUD

Dentro del ambiente dockerizado desarrolla una API Rest, con el stack de tu preferencia, que implemente un CRUD de una entidad tipo 'empresa'. Preocupate de incluir un script que genere N registros con datos "fake" (utilizando una librería faker).

### Ejercicio 3: Análisis + Desarrollo

Crea un script en el lenguaje de tu elección y encuentre la(s) cadena de texto que es(son) igual al revés en el siguiente texto:

`afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood`

### Ejercicio 4: Consumo API Envíame para la creación de un envío
Desarrolla una función o script que consuma la API Envíame para la creación de un Envío y almacene la respuesta en algún medio de almacenamiento permanente.
Documentación (Postman) del endpoint a usar: [Colección Postman](https://github.com/enviame/backend-test/blob/main/Backend-test.postman_collection.json)

### Ejercicio 5: Análisis + Desarrollo
La serie de Fibonacci se construye utilizando la siguiente relación de recurrencia: `Fn = Fn1 + Fn2, donde F1 = 1 y F2 = 1`. Por ende, los primeros doce términos de esta serie son: `1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144`

Ahora, consideremos los divisores de estos términos:

```text
1 = 1
1 = 1
2 = 1, 2
3 = 1, 3
5  = 1, 5
8 = 1, 2, 4, 8
13 = 1, 13
21 = 1, 3, 7, 21
34 = 1, 2, 17, 34
55 = 1, 5, 11, 55
89 = 1, 89
144 = 1, 2, 3, 4, 6, 8, 9, 12, 16, 18, 24, 36, 48, 72, 144
```

Como se puede ver, 144 es el primer número de la serie de Fibonacci que tiene más de 10 divisores (de hecho tiene 15).
Crea un script en tu lenguaje favorito que obtenga el primer número de Fibonacci que tiene más de 1000 divisores.


### Ejercicio 6: Análisis + Desarrollo Aplicado a Negocio
Desarrolla una función o procedimiento que estime el tiempo de entrega de la entrega de una compra online (en días), en función de la distancia que existe entre una dirección de origen y destino.

Suponga que los envíos siempre se despachan desde el mismo origen.

Para la determinación de la distancia entre el origen y destino genere números aleatorios entre 0 km y 2.000 km
Asuma que el tiempo de despacho está determinado por una sucesión numérica, donde cada N término se relaciona con un incremento en un rango de distancia entre la dirección de origen y de destino como se muesta a continuación.

* Rango 1. Menos de 100 km, se entregan el mismo día (Día cero)
* Rango 2. Menos de 200 km, se entregan al día siguiente (Día uno)
* Rango 3. Menos de 300 km, se entregan al día siguiente (Día uno)
* Rango 4. Menos de 400 km, se entregan al día subsiguiente (Día dos)
* Rango 5. Menos de 500 km, se entregan al tercer día (Día tres)
  ...
* Rango n. Menos de n km, Los días de entrega se calculan como la suma de los días de entrega de los rangos n–1 y n-2

### Ejercicio 7: SQL
-- Actualizar los sueldos de los empleados que ganen $5000 o menos, de acuerdo al reajuste anual del continente al que pertenecen.

CREATE TABLE `countries` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`continent_id` int(11) NOT NULL,
`name` varchar(25) NOT NULL,
PRIMARY KEY (`id`)
);

CREATE TABLE `continents` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(25) NOT NULL,
`anual_adjustment` int(11) NOT NULL,
PRIMARY KEY (`id`)
);

CREATE TABLE `employees` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`country_id` int(11) NOT NULL,
`first_name` varchar(25) NOT NULL,
`last_name` varchar(25) NOT NULL,
`salary` int(11) NOT NULL,
PRIMARY KEY (`id`)
);

insert into continents values (null, 'América', 4);
insert into continents values (null, 'Europa', 5);
insert into continents values (null, 'Asia', 6);
insert into continents values (null, 'Oceanía', 6);
insert into continents values (null, 'Africa', 5);

insert into countries values (null, 1, 'Chile');
insert into countries values (null, 1, 'Argentina');
insert into countries values (null, 1, 'Canadá');
insert into countries values (null, 1, 'Colombia');
insert into countries values (null, 2, 'Alemania');
insert into countries values (null, 2, 'Francia');
insert into countries values (null, 2, 'España');
insert into countries values (null, 2, 'Grecia');
insert into countries values (null, 3, 'India');
insert into countries values (null, 3, 'Japón');
insert into countries values (null, 3, 'Corea del Sur');
insert into countries values (null, 4, 'Australia');

insert into employees values (null, 1, 'Pedro', 'Rojas', 2000);
insert into employees values (null, 2, 'Luciano', 'Alessandri', 2100);
insert into employees values (null, 3, 'John', 'Carter', 3050);
insert into employees values (null, 4, 'Alejandra', 'Benavides', 2150);
insert into employees values (null, 5, 'Moritz', 'Baring', 6000);
insert into employees values (null, 6, 'Thierry', 'Henry', 5900);
insert into employees values (null, 7, 'Sergio', 'Ramos', 6200);
insert into employees values (null, 8, 'Nikoleta', 'Kyriakopulu', 7000);
insert into employees values (null, 9, 'Aamir', 'Khan', 2000);
insert into employees values (null, 10, 'Takumi', 'Fujiwara', 5000);
insert into employees values (null, 11, 'Heung-min', 'Son', 5100);
insert into employees values (null, 12, 'Peter', 'Johnson', 6100);
