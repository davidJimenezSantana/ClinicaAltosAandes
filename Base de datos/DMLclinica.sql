
-- -----------------------------------------------------
-- Poblar tabla especialidad
-- -----------------------------------------------------

INSERT INTO `especialidad` (`idespecialidad`, `nombre`) VALUES (NULL, 'No Aplica'), (NULL, 'Alergología'), (NULL, 'Anestesiología'), (NULL, 'Angiología'), (NULL, 'Cardiología'), (NULL, 'Endocrinología'), (NULL, 'Estomatología'), (NULL, 'Farmacología Clínica'), (NULL, 'Gastroenterología'), (NULL, 'Genética'), (NULL, 'Geriatría'), (NULL, 'Hematología'), (NULL, 'Hepatología'), (NULL, 'Infectología'), (NULL, 'Medicina aeroespacial'), (NULL, 'Medicina del deporte'), (NULL, 'Medicina familiar y comunitaria'), (NULL, 'Medicina física y rehabilitación'), (NULL, 'Medicina forense'), (NULL, 'Medicina intensiva'), (NULL, 'Medicina interna'), (NULL, 'Medicina preventiva y salud pública'), (NULL, 'Medicina del trabajo'), (NULL, 'Nefrología'), (NULL, 'Neumología'), (NULL, 'Neurología'), (NULL, 'Nutriología'), (NULL, 'Oncología médica'), (NULL, 'Oncología radioterápica'), (NULL, 'Pediatría'), (NULL, 'Psiquiatría'), (NULL, 'Reumatología'), (NULL, 'Toxicología');


-- -----------------------------------------------------
-- Poblar tabla rol
-- -----------------------------------------------------

INSERT INTO `rol` (`idrol`, `nombre`) VALUES (NULL, 'Administador'), (NULL, 'Medico');

-- -----------------------------------------------------
-- Poblar tabla rol
-- -----------------------------------------------------


INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `clave`, `rol_idrol`, `especialidad_idespecialidad`, `telefono`) VALUES (NULL, 'David Alejandro', 'Jimenez Santana', 'davidjimenez199701@gmail.com', MD5('daj'), '1', '1', '30213031080');