--creación tablas
CREATE TABLE horario (
  id_horario INT PRIMARY KEY AUTO_INCREMENT,
  dia VARCHAR(50),
  h_inicio TIME,
  h_fin TIME
);

CREATE TABLE programas (
  id_programa INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100),
  descripcion VARCHAR(300),
  links VARCHAR(150),
  imagen VARCHAR(100),
  horario INT,
  FOREIGN KEY (horario) REFERENCES horario(id_horario)
);

CREATE TABLE locutores (
  id_locutor INT PRIMARY KEY AUTO_INCREMENT,
  nombre_locutor VARCHAR(200),
  nombre_programa VARCHAR(100),
  id_programa INT,
  FOREIGN KEY (id_programa) REFERENCES programas(id_programa)
);

CREATE TABLE parrilla (
  id_parrilla INT PRIMARY KEY AUTO_INCREMENT,
  id_programa INT,
  id_hora INT,
  FOREIGN KEY (id_programa) REFERENCES programas(id_programa),
  FOREIGN KEY (id_hora) REFERENCES horario(id_horario)
);


--Inserts tabla horario
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '6:50', '7:00'), (NULL, 'Lunes', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '8:00', '9:00'), (NULL, 'Lunes', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '10:00', '11:00'), (NULL, 'Lunes', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '12:00', '13:00'), (NULL, 'Lunes', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '14:00', '15:00'), (NULL, 'Lunes', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '16:00', '17:00'), (NULL, 'Lunes', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '18:00', '19:00'), (NULL, 'Lunes', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '20:00', '21:00'), (NULL, 'Lunes', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Lunes', '22:00', '23:00'), (NULL, 'Lunes', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '6:50', '7:00'), (NULL, 'Martes', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '8:00', '9:00'), (NULL, 'Martes', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '10:00', '11:00'), (NULL, 'Martes', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '12:00', '13:00'), (NULL, 'Martes', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '14:00', '15:00'), (NULL, 'Martes', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '16:00', '17:00'), (NULL, 'Martes', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '18:00', '19:00'), (NULL, 'Martes', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '20:00', '21:00'), (NULL, 'Martes', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Martes', '22:00', '23:00'), (NULL, 'Martes', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '6:50', '7:00'), (NULL, 'Miércoles', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '8:00', '9:00'), (NULL, 'Miércoles', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '10:00', '11:00'), (NULL, 'Miércoles', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '12:00', '13:00'), (NULL, 'Miércoles', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '14:00', '15:00'), (NULL, 'Miércoles', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '16:00', '17:00'), (NULL, 'Miércoles', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '18:00', '19:00'), (NULL, 'Miércoles', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '20:00', '21:00'), (NULL, 'Miércoles', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Miércoles', '22:00', '23:00'), (NULL, 'Miércoles', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '6:50', '7:00'), (NULL, 'Jueves', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '8:00', '9:00'), (NULL, 'Jueves', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '10:00', '11:00'), (NULL, 'Jueves', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '12:00', '13:00'), (NULL, 'Jueves', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '14:00', '15:00'), (NULL, 'Jueves', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '16:00', '17:00'), (NULL, 'Jueves', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '18:00', '19:00'), (NULL, 'Jueves', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '20:00', '21:00'), (NULL, 'Jueves', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Jueves', '22:00', '23:00'), (NULL, 'Jueves', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '6:50', '7:00'), (NULL, 'Viernes', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '8:00', '9:00'), (NULL, 'Viernes', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '10:00', '11:00'), (NULL, 'Viernes', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '12:00', '13:00'), (NULL, 'Viernes', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '14:00', '15:00'), (NULL, 'Viernes', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '16:00', '17:00'), (NULL, 'Viernes', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '18:00', '19:00'), (NULL, 'Viernes', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '20:00', '21:00'), (NULL, 'Viernes', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Viernes', '22:00', '23:00'), (NULL, 'Viernes', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '6:50', '7:00'), (NULL, 'Sábado', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '8:00', '9:00'), (NULL, 'Sábado', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '10:00', '11:00'), (NULL, 'Sábado', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '12:00', '13:00'), (NULL, 'Sábado', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '14:00', '15:00'), (NULL, 'Sábado', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '16:00', '17:00'), (NULL, 'Sábado', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '18:00', '19:00'), (NULL, 'Sábado', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '20:00', '21:00'), (NULL, 'Sábado', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Sábado', '22:00', '23:00'), (NULL, 'Sábado', '23:00', '0:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '6:50', '7:00'), (NULL, 'Domingo', '7:00', '8:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '8:00', '9:00'), (NULL, 'Domingo', '9:00', '10:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '10:00', '11:00'), (NULL, 'Domingo', '11:00', '12:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '12:00', '13:00'), (NULL, 'Domingo', '13:00', '14:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '14:00', '15:00'), (NULL, 'Domingo', '15:00', '16:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '16:00', '17:00'), (NULL, 'Domingo', '17:00', '18:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '18:00', '19:00'), (NULL, 'Domingo', '19:00', '20:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '20:00', '21:00'), (NULL, 'Domingo', '21:00', '22:00');
INSERT INTO `horario` (`id_horario`, `dia`, `h_inicio`, `h_fin`) VALUES (NULL, 'Domingo', '22:00', '23:00'), (NULL, 'Domingo', '23:00', '0:00');

--Insert tabla programas
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Halcones Financieros', 'Espacio abierto para que, quienes dan forma a la Banca y los Mercados Financieros en nuestro país, compartan su visión y conocimientos con los radioescuchas', 'https://www.ivoox.com/player_es_podcast_554603_zp_1.html', 'halcones_financieros.png', '20'), (NULL, 'Memoria Informativa', 'Opinión, análisis, entrevistas y todo lo que debes saber de la actualidad nacional e internacional de la mano de uno de los periodistas más controversiales de México.', '', 'memoria_informativa.png', '38');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Mesa redonda', 'Polémica, entrevistas y opinión con los líderes del acontecer diario de México.', 'https://www.ivoox.com/player_es_podcast_448402_zp_1.html', 'mesa_redonda.png', '56');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Reporte Anáhuac', 'Espacio dedicado a difundir e informar. Cada día con las noticias más relevantes del país, el mundo, cultura, deportes y más, contado por Líderes Anáhuac.', NULL, 'reporte_anahuac.png', '3'), (NULL, 'Reporte Anáhuac', 'Espacio dedicado a difundir e informar. Cada día con las noticias más relevantes del país, el mundo, cultura, deportes y más, contado por Líderes Anáhuac.', NULL, 'reporte_anahuac.png', '21'), (NULL, 'Reporte Anáhuac', 'Espacio dedicado a difundir e informar. Cada día con las noticias más relevantes del país, el mundo, cultura, deportes y más, contado por Líderes Anáhuac.', NULL, 'reporte_anahuac.png', '39'), (NULL, 'Reporte Anáhuac', 'Espacio dedicado a difundir e informar. Cada día con las noticias más relevantes del país, el mundo, cultura, deportes y más, contado por Líderes Anáhuac.', NULL, 'reporte_anahuac.png', '57'), (NULL, 'Reporte Anáhuac', 'Espacio dedicado a difundir e informar. Cada día con las noticias más relevantes del país, el mundo, cultura, deportes y más, contado por Líderes Anáhuac.', NULL, 'reporte_anahuac.png', '75');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Un bocado para el alma', 'Programa que combina la psico-educación con buen humor, abordando temas relacionados con la dignidad humana, matrimonio y la familia, para generar conciencia y reflexión.', 'https://www.ivoox.com/player_es_podcast_554606_zp_1.html', 'unbocado_paraelalma.png', '22'), (NULL, 'Bioéticamente', 'Generamos una cultura de análisis y difusión en temas de Bioética desde distintas posturas que favorezcan el diálogo y el debate.', 'https://www.ivoox.com/player_es_podcast_2139022_zp_1.html', 'bioeticamente.png', '4');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'La Jugada Financiera', 'Programa que toca temas de finanzas personales, con la idea de hacer más fácil el manejo del dinero. Aquí encontrarás tips y recomendaciones para ayudar a tu economía.', 'https://www.ivoox.com/player_es_podcast_448370_zp_1.html', 'la_jugada_financiera.png', '23'), (NULL, 'Odisea con Sandra', 'Entrevistas a artistas marciales y a personas con discapacidad que nos cuentan la odisea de su historia de vida.', NULL, 'odisea_con_sandra.png', '41'), (NULL, 'Odisea con Sandra', 'Entrevistas a artistas marciales y a personas con discapacidad que nos cuentan la odisea de su historia de vida.', NULL, 'odisea_con_sandra.png', '59');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'SaluDando', 'La información más relevante de los temas de salud del momento, mitos y verdades, tips, tratamientos y mucho más, en la voz de los expertos.', 'https://www.ivoox.com/player_es_podcast_1171575_zp_1.html', 'saludando.png', '77'), (NULL, 'Delicias al aire', 'Es un programa que te llevará a un apasionante viaje culinario por todo el mundo. Cada episodio explorará una región geográfica o cultura culinaria diferente, sumergiéndote en la riqueza de sus ingredientes, técnicas de cocina y tradiciones gastronómicas.', 'https://www.ivoox.com/player_es_podcast_2390082_zp_1.html', 'delicias_al_aire.png', '24');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Ivan y vienen', 'Iván y vienen es la receta perfecta entre entrevistas con invitados de lujo, reseñas de lugares, estilo de vida, gastronomía, negocios y más.', NULL, 'ivan_y_vienen.png', '6'), (NULL, 'Comunicación 5.0', 'Entrevistas con líderes de opinión sobre las nuevas tecnologías en Comunicación, tendencias e inteligencia artificial.', NULL, 'comunicacion50.png', '42');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Estamos en Comunicación', 'Conoce historias inspiradoras y exitosas de reconocidos líderes de todos los ámbitos de la Comunicación y el mundo empresarial en México, en una charla entre amigos', 'https://www.ivoox.com/player_es_podcast_448360_zp_1.html', 'estamos_en_comunicacion.png', '78'), (NULL, 'SintonizanDOTe', 'Es una emisión que trata de aspectos generales de las tecnologías de la información basado en novedades, comentarios y experiencias. Realizado por la Dirección de Operación Tecnológica de la Universidad Anáhuac México.', 'https://www.ivoox.com/player_es_podcast_2317702_zp_1.html', 'sintonizandote.png', '7');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Bibliohertz', 'Programa de la Biblioteca de la Universidad Anáhuac México donde encontrarás todo lo relacionado sobre el Mundo de las Bibliotecas, libros, literatura, poesía, películas, investigación y mucho más.', 'https://www.ivoox.com/player_es_podcast_448386_zp_1.html', 'bibliohertz.png', '25'), (NULL, 'Generacion de valor', 'Programa de Revista, Responsabilidad Social y Desarrollo Sustentable para generar conciencia de participación en acción, así como vincular a los sectores Empresarial, Gobierno y Sociedad Civil.', 'https://www.ivoox.com/player_es_podcast_738814_zp_1.html', 'generacion_de_valor.png', '61');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Amplitud Universitaria', 'Programa de la Dirección de Comunicación Institucional donde se platicará de los sucesos más importantes que ocurren dentro y fuera de la Universidad Anáhuac.', 'https://www.ivoox.com/player_es_podcast_658434_zp_1.html', 'amplitud_universitaria.png', '43'), (NULL, 'Cultura espontanea', 'Revista cultural que aborda temas relacionados con la problemática humana desde el contexto histórico, filosófico, artístico y psicológico.', NULL, 'cultura_espontanea.png', '8');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Maridaje Musical', 'En este programa la Sommelier Mirell Riviello te guiará por el mundo del vino, té, destilados, fermentados y la gastronomía que lo acompaña. Descubramos el maravilloso mundo gourmet con grandes entrevistas y por supuesto catas.', 'https://www.ivoox.com/player_es_podcast_1365956_zp_1.html', 'maridaje_musical.png', '26'), (NULL, 'Saboreando la Vida', 'Programa donde conocerás los lugares más importantes de la Ciudad de México, abordando temas de gastronomía, costumbres, festejos e historias, sacándole jugo a la vida.', NULL, 'saboreando_la_vida.png', '44');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Charlas con café', 'Arte, cultura y entretenimiento para acercar a la comunidad universitaria y público en general, a través de entrevistas a los principales líderes de las industrias creativas a nivel nacional e internacional.', 'https://www.ivoox.com/player_es_podcast_737600_zp_1.html', 'charlas_con_cafe.png', '62'), (NULL, 'Desconfigurando la matrix', 'Espacio en el que se analizará la política, la ciencia, las humanidades y la cultura Pop a través de los ojos y la mirada de alumnos, profesores y expertos en la materia.', 'https://www.ivoox.com/player_es_podcast_1603039_zp_1.html', 'descofigurando_la_matrix.png', '80');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Por escrito', 'Programa que busca difundir el amor por la lectura, dándoles a los radioescuchas pretextos para empezar a leer.', 'https://www.ivoox.com/player_es_podcast_717973_zp_1.html', 'por_escrito.png', '47'), (NULL, 'De empresario a empresario', 'Información y herramientas para identificar fortalezas, debilidades, oportunidades y así poder aplicar acciones concretas y lograr objetivos trazados.', 'https://www.ivoox.com/player_es_podcast_794989_zp_1.html', 'deempresario_aempresario.png', '60');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Tras bambalinas', 'Programa especializado en cultura teatral. Entrevistas y recomendaciones de cartelera nacional e internacional.', NULL, 'tras_bambalinas.png', '11'), (NULL, 'Cultura y punto', 'Es un programa práctico de la asignatura Practicum 1 dentro de la Licenciatura en Comunicación de la Universidad Anáhuac México. El contenido es de información general, cultural y deportes.', 'https://www.ivoox.com/player_es_podcast_1181826_zp_1.html', 'cultura_y_punto.png', '29');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Escaparte', 'Recorrido por las diferentes disciplinas artísticas, entrevistas a profesionales del medio y cobertura de los mejores eventos artísticos dentro y fuera de la Universidad Anáhuac México.', NULL, 'escaparte.png', '66'), (NULL, 'Serie en serio', '¿Alguna vez te has preguntado cómo realizaron tu serie favorita? En cada emisión de Serie en Serio te daremos todas las respuestas, cómo se produjo, quién la realizó, datos curiosos y mucho más.', NULL, 'serie_en_serio.png', '12');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'La Brujula  de  Cronos', 'Te explicamos la evolución de las cosas a través del tiempo. Aquí podrán conocer lo que sucedía en los diferentes años, desde la década de los años 70 hasta nuestros días.', NULL, 'la_brujula_de_cronos.png', '66'), (NULL, 'Teolt Media', 'Teolt Media es un programa conformado por la comunidad universitaria Anáhuac México en el que abordamos los temas de coyuntura y mucho más.', NULL, 'teolt_media.png', '84');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Reporte Genera', 'Programa que tiene como propósito fomentar la cultura del emprendimiento y liderazgo empresarial a través de temas relevantes de esta materia.', NULL, 'reporte_genera.png', '13'), (NULL, 'El mundo en 60 minutos', 'Programa informativo realizado por alumnos de la Facultad de Comunicación de la Universidad Anáhuac cursando la especialidad en periodismo.', NULL, 'elmundo_en60min.png', '31');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Ponte politico', 'Programa donde se analizan las noticias más importantes de la agenda nacional e internacional.', 'https://www.ivoox.com/player_es_podcast_2116464_zp_1.html', 'ponte_politico.png', '49'), (NULL, 'Dialogo con el mundo', 'Programa de la facultad de Estudios Globales que aborda temas de interés político, cultural, social y económico a nivel internacional.', 'https://www.ivoox.com/player_es_podcast_794987_zp_1.html', 'dialogo_con_elmundo.png', '67');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Desde la butaca', 'Programa deportivo donde damos a conocer las principales novedades del fútbol mexicano e internacional, Fórmula 1, NFL y los equipos representativos de la Universidad Anáhuac México.', NULL, 'desde_la_butaca.png', '14'), (NULL, 'La Gambetta', 'La Gambetta, programa deportivo con el mejor análisis, entrevistas con atletas y discusiones sobre la importancia del deporte en el contexto académico y fuera de él.', NULL, 'la_gambetta.png', '32'), (NULL, 'Sing Control', 'Espacio donde destacan temas relevantes sobre la industria musical, así como las historias de éxito de artistas y personas importantes de la industria.', NULL, 'sing_control.png', '69');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Jazz Arquitectónico', 'Único en su tipo que fusiona la Arquitectura y Jazz, mismos que son tratados de una manera dinámica, sencilla y amable, teniendo como invitados a personalidades y especialistas de la materia.', 'https://mx.ivoox.com/es/player_es_podcast_448403_1.html', 'jazz_arquitectonico.png', '33'), (NULL, 'Jazz Arquitectónico', 'Único en su tipo que fusiona la Arquitectura y Jazz, mismos que son tratados de una manera dinámica, sencilla y amable, teniendo como invitados a personalidades y especialistas de la materia.', 'https://mx.ivoox.com/es/player_es_podcast_448403_1.html', 'jazz_arquitectonico.png', '34'), (NULL, 'Jazz Arquitectónico', 'Único en su tipo que fusiona la Arquitectura y Jazz, mismos que son tratados de una manera dinámica, sencilla y amable, teniendo como invitados a personalidades y especialistas de la materia.', 'https://mx.ivoox.com/es/player_es_podcast_448403_1.html', 'jazz_arquitectonico.png', '35');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Musica y Electropop', 'Tocamos música de todos los tiempos basándonos en las que están hechas con instrumentos llamados sintetizadores', NULL, 'musica_y_electropop.png', '52'), (NULL, 'Retro. Lyrics of your life', 'Programa musical que te llevará a viajar musicalmente desde los años 80 y hasta el 2010, con las mejores canciones con el único propósito de recordar momentos inolvidables de nuestra vida.', NULL, 'retro.png', '70');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Buenos dias Anáhuac', 'Espacio dedicado a difundir e informar lo más relevantes del país, el mundo, cultura, deportes y más', '', 'radio_anahuac.png', '2'), (NULL, '17 min 60 seg una ventana a la Beatlemania', 'Segmento sobre todo lo que hay alrededor de la música de The Beatles. Anécdotas sobre el grupo, entrevistas y datos que curiosos de esta banda inglesa.', '', 'radio_anahuac.png', '53'), (NULL, 'En directo', 'Espacio musical donde podrás escuchar lo mejor de la música pop, con entrevistas y nuevos lanzamientos.', NULL, 'radio_anahuac.png', '87');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Noticias ONU', 'Noticiero producido por Nacione Unidas dode encontrarás una perspectiva global de lo que sucede en el mundo, así como historias humanas.', NULL, 'radio_anahuac.png', '1'), (NULL, 'Noticias ONU', 'Noticiero producido por Nacione Unidas dode encontrarás una perspectiva global de lo que sucede en el mundo, así como historias humanas.', NULL, 'radio_anahuac.png', '19'), (NULL, 'Noticias ONU', 'Noticiero producido por Nacione Unidas dode encontrarás una perspectiva global de lo que sucede en el mundo, así como historias humanas.', NULL, 'radio_anahuac.png', '37'), (NULL, 'Noticias ONU', 'Noticiero producido por Nacione Unidas dode encontrarás una perspectiva global de lo que sucede en el mundo, así como historias humanas.', NULL, 'radio_anahuac.png', '55'), (NULL, 'Noticias ONU', 'Noticiero producido por Nacione Unidas dode encontrarás una perspectiva global de lo que sucede en el mundo, así como historias humanas.', NULL, 'radio_anahuac.png', '73');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '5'), (NULL, 'Música', NULL, NULL, NULL, '9');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '10'), (NULL, 'Música', NULL, NULL, NULL, '15');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '16'), (NULL, 'Música', NULL, NULL, NULL, '17');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '18'), (NULL, 'Música', NULL, NULL, NULL, '27');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '28'), (NULL, 'Música', NULL, NULL, NULL, '30');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '36'), (NULL, 'Música', NULL, NULL, NULL, '40');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '45'), (NULL, 'Música', NULL, NULL, NULL, '46');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '48'), (NULL, 'Música', NULL, NULL, NULL, '50');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '51'), (NULL, 'Música', NULL, NULL, NULL, '54');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '58'), (NULL, 'Música', NULL, NULL, NULL, '63');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '64'), (NULL, 'Música', NULL, NULL, NULL, '68');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '71'), (NULL, 'Música', NULL, NULL, NULL, '72');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '74'), (NULL, 'Música', NULL, NULL, NULL, '76');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '79'), (NULL, 'Música', NULL, NULL, NULL, '81');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '82'), (NULL, 'Música', NULL, NULL, NULL, '83');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '85'), (NULL, 'Música', NULL, NULL, NULL, '86');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '88'), (NULL, 'Música', NULL, NULL, NULL, '89');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '90'), (NULL, 'Música', NULL, NULL, NULL, '91');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '92'), (NULL, 'Música', NULL, NULL, NULL, '93');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '94'), (NULL, 'Música', NULL, NULL, NULL, '95');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '96'), (NULL, 'Música', NULL, NULL, NULL, '97');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '98'), (NULL, 'Música', NULL, NULL, NULL, '99');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '100'), (NULL, 'Música', NULL, NULL, NULL, '101');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '102'), (NULL, 'Música', NULL, NULL, NULL, '103');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '104'), (NULL, 'Música', NULL, NULL, NULL, '105');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '106'), (NULL, 'Música', NULL, NULL, NULL, '107');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '108'), (NULL, 'Música', NULL, NULL, NULL, '109');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '110'), (NULL, 'Música', NULL, NULL, NULL, '111');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '112'), (NULL, 'Música', NULL, NULL, NULL, '113');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '114'), (NULL, 'Música', NULL, NULL, NULL, '115');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '116'), (NULL, 'Música', NULL, NULL, NULL, '117');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '118'), (NULL, 'Música', NULL, NULL, NULL, '119');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '120'), (NULL, 'Música', NULL, NULL, NULL, '121');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '122'), (NULL, 'Música', NULL, NULL, NULL, '123');
INSERT INTO `programas` (`id_programa`, `nombre`, `descripcion`, `links`, `imagen`, `horario`) VALUES (NULL, 'Música', NULL, NULL, NULL, '124'), (NULL, 'Música', NULL, NULL, NULL, '125'), (NULL, 'Música', NULL, NULL, NULL, '126');

--Insert Locutores
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Alberto Ratia', 'Halcones Financieros', '1');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Rafael Molina', 'Halcones Financieros', '1'), (NULL, 'Ricardo Rangel', 'Halcones Financieros', '1'), (NULL, 'Marisol Huerta', 'Halcones Financieros', '1'), (NULL, 'Oscar Gómez', 'Halcones Financieros', '1');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Guillermo Torres Quiróz', 'Memoria Informativa', '2'), (NULL, 'Jorge Arias Ochoa', 'Mesa Redonda','3');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Paco Trejo', 'Reporte Anahuac', '4'), (NULL, 'Miguel Ángel Corona ', 'Reporte Anahuac', '5'), (NULL, 'Paco Trejo', 'Reporte Anahuac', '6'), (NULL, 'Miguel Ángel Corona ', 'Reporte Anahuac', '7'), (NULL, 'Paco Trejo', 'Reporte Anahuac', '8');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Luz Marie Orci', 'Un bocado para el alma', '9'), (NULL, 'Claudia Hermosillo', 'Un bocado para el alma', '9');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Marieli de los Ríos', 'Bioéticamente', '10'), (NULL, 'Pepe Castilla', 'Bioéticamente', '10'), (NULL, 'José Antonio Bonilla', 'Bioéticamente', '10');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Nedi Rueda', 'La Jugada Financiera', '11'), (NULL, 'Gaby González', 'La Jugada Financiera', '11');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Sandra Espinoza', 'Odisea con Sandra', '12'), (NULL, 'Sandra Espinoza', 'Odisea con Sandra', '13');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Gigí Nieto.', 'SaluDando', '14'), (NULL, 'Chef Ileana Gómez', 'Delicias a aire', '15');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Chef Iván Millán', 'Ivan y vienen', '16'), (NULL, 'Josu Garritz', 'Comunicación 5.0', '17');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Carlos Muñoz García.', 'Estamos en Comunicación', '18');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Claudia Vega', 'SintonizanDOTe', '19'), (NULL, 'Wendy García', 'SintonizanDOTe', '19'), (NULL, 'David Granados', 'SintonizanDOTe', '19');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Samantha Garduño López ', 'Bibiohertz', '20'), (NULL, 'Tanya Yekaterina Alva Ramírez', 'Bibiohertz', '20');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Dra. Lorena Miranda Navarro', 'Generación de valor', '21'), (NULL, 'Uriel Arteaga', 'Amplitud Universitaria', '22');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Herzel García', 'Cultura espontanea', '23'), (NULL, 'Sommelier Mirell Riviello', 'Maridaje Musical', '24');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Liliana Garduño', 'Saboreando la Vida', '25'), (NULL, 'Giselle Escalante', 'Charlas con café', '26');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Thelma Peón Hernández', 'Desconfigurando la mátrix', '27'), (NULL, 'Alfonso Cervantes', 'Desconfigurando la mátrix', '27');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Cecilia Durán Mena', 'Por escrito', '28'), (NULL, 'Juan Carlos Padilla Monroy', 'Por escrito', '28'), (NULL, 'Raúl Sanz', 'Por escrito', '28');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'José Luis Sánchez', 'De empresario a empresario', '29'), (NULL, 'Clemente Sánchez', 'Tras bambalinas', '30');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Arturo Corona', 'Cultura y punto', '31'), (NULL, 'Alumnos de la Escuela de Artes', 'EscapArte', '32');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Alicia Hernández', 'Serie en serio', '33'), (NULL, 'Christopher Moreno', 'La Brújula  de  Cronos', '34');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Alumnos de la carrera de Comunicación y Empresas de Entretenimiento', 'Teolt Media', '35');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Rolando Molina', 'Reporte Genera', '36'), (NULL, 'Isabela Escobar', 'Reporte Genera', '36'), (NULL, 'Alejandro Retes', 'Reporte Genera', '36'), (NULL, 'Diego Aguerrebere ', 'Reporte Genera', '36'), (NULL, 'Sergio Figuerola', 'Reporte Genera', '36');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Eduardo Terrazas Juan', 'El mundo en 60 minutos', '37'), (NULL, 'Emiliano Galicia Rocha', 'El mundo en 60 minutos', '37'), (NULL, 'Francisco Berdiales Corallo', 'El mundo en 60 minutos', '37'), (NULL, 'Samuel Sirotsky Maya', 'El mundo en 60 minutos', '37');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Alumnos del programa de liderazgo Sinergia.', 'Ponte político', '38');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Pilar Ruíz', 'Diálogo con el mundo', '39'), (NULL, 'Ana Paula Galindo', 'Diálogo con el mundo', '39');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Valeria Quijano', 'Diálogo con el mundo', '39'), (NULL, 'Miriam Cornejo', 'Diálogo con el mundo', '39');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Jamile Esquivel', 'Diálogo con el mundo', '39'), (NULL, 'Diana Beltrán', 'Diálogo con el mundo', '39');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Patricia González', 'Diálogo con el mundo', '39'), (NULL, 'Rebeca Nieto', 'Diálogo con el mundo', '39');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Emilio Vega', 'Desde la butaca', '40'), (NULL, 'Fernanda Terrés', 'Desde la butaca', '40');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Iker Gamba Porter', 'La Gambetta', '41'), (NULL, 'David Baum Tawil', 'La Gambetta', '41');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Fer Castello', 'Sing Control', '42'), (NULL, 'Rebeca Maldonado', 'Sing Control', '42'), (NULL, 'Estefanía Rosales', 'Sing Control', '42'), (NULL, 'Alejandra Herrera.', 'Sing Control', '42');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Javier Carreón Montoya', 'Jazz Arquitectónico', '43'), (NULL, 'Javier Carreón Montoya', 'Jazz Arquitectónico', '44'), (NULL, 'Javier Carreón Montoya', 'Jazz Arquitectónico', '45');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Alfredo Alan', 'Música y Electropop', '46'), (NULL, 'Erandi García', 'Retro. Lyrics of your life', '47');
INSERT INTO `locutores` (`id_locutor`, `nombre_locutor`, `nombre_programa`, `id_programa`) VALUES (NULL, 'Marco Macías', 'Buenos Días Anáhuac', '48'), (NULL, 'Juan Diego Pardo', 'Buenos Días Anáhuac', '48');

--Insert Parilla
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '51', '1'), (NULL, '48', '2');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '4', '3'), (NULL, '10', '4');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '56', '5'), (NULL, '16', '6');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '19', '7'), (NULL, '23', '8');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '57', '9'), (NULL, '58', '10');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '30', '11'), (NULL, '33', '12');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '36', '13'), (NULL, '40', '14');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '59', '15'), (NULL, '60', '16');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '61', '17'), (NULL, '62', '18');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '52', '19'), (NULL, '1', '20');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '5', '21'), (NULL, '9', '22');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '11', '23'), (NULL, '15', '24');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '20', '25'), (NULL, '24', '26');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '63', '27'), (NULL, '64', '28');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '31', '29'), (NULL, '65', '30');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '37', '31'), (NULL, '41', '32');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '43', '33'), (NULL, '44', '34');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '45', '35'), (NULL, '66', '36');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '53', '37'), (NULL, '2', '38');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '6', '39'), (NULL, '67', '40');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '12', '41'), (NULL, '17', '42');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '22', '43'), (NULL, '25', '44');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '68', '45'), (NULL, '69', '46');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '28', '47'), (NULL, '70', '48');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '38', '49'), (NULL, '71', '50');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '72', '51'), (NULL, '46', '52');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '49', '53'), (NULL, '73', '54');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '54', '55'), (NULL, '3', '56');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '7', '57'), (NULL, '74', '58');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '13', '59'), (NULL, '29', '60');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '21', '61'), (NULL, '26', '62');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '75', '63'), (NULL, '76', '64');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '32', '65'), (NULL, '34', '66');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '39', '67'), (NULL, '77', '68');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '42', '69'), (NULL, '47', '70');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '78', '71'), (NULL, '79', '72');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '55', '73'), (NULL, '80', '74');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '8', '75'), (NULL, '81', '76');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '14', '77'), (NULL, '18', '78');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '82', '79'), (NULL, '27', '80');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '83', '81'), (NULL, '84', '82');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '85', '83'), (NULL, '35', '84');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '86', '85'), (NULL, '87', '86');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '50', '87'), (NULL, '88', '88');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '89', '89'), (NULL, '90', '90');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '91', '91'), (NULL, '92', '92');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '93', '93'), (NULL, '94', '94');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '95', '95'), (NULL, '96', '96');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '97', '97'), (NULL, '98', '98');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '99', '99'), (NULL, '100', '100');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '101', '101'), (NULL, '102', '102');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '103', '103'), (NULL, '104', '104');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '105', '105'), (NULL, '106', '106');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '107', '107'), (NULL, '108', '108');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '109', '109'), (NULL, '110', '110');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '111', '111'), (NULL, '112', '112');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '113', '113'), (NULL, '114', '114');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '115', '115'), (NULL, '116', '116');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '117', '117'), (NULL, '118', '118');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '119', '119'), (NULL, '120', '120');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '121', '121'), (NULL, '122', '122');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '123', '123'), (NULL, '124', '124');
INSERT INTO `parrilla` (`id_parrilla`, `id_programa`, `id_hora`) VALUES (NULL, '125', '125'), (NULL, '126', '126');
