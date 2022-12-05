-- -----------------------------------------------------
-- Poblar tabla especialidad
-- -----------------------------------------------------
INSERT INTO
    `especialidad` (`idespecialidad`, `nombre`)
VALUES
    (NULL, 'No Aplica'),
    (NULL, 'Alergología'),
    (NULL, 'Anestesiología'),
    (NULL, 'Angiología'),
    (NULL, 'Cardiología'),
    (NULL, 'Endocrinología'),
    (NULL, 'Estomatología'),
    (NULL, 'Farmacología Clínica'),
    (NULL, 'Gastroenterología'),
    (NULL, 'Genética'),
    (NULL, 'Geriatría'),
    (NULL, 'Hematología'),
    (NULL, 'Hepatología'),
    (NULL, 'Infectología'),
    (NULL, 'Medicina aeroespacial'),
    (NULL, 'Medicina del deporte'),
    (NULL, 'Medicina familiar y comunitaria'),
    (NULL, 'Medicina física y rehabilitación'),
    (NULL, 'Medicina forense'),
    (NULL, 'Medicina intensiva'),
    (NULL, 'Medicina interna'),
    (NULL, 'Medicina preventiva y salud pública'),
    (NULL, 'Medicina del trabajo'),
    (NULL, 'Nefrología'),
    (NULL, 'Neumología'),
    (NULL, 'Neurología'),
    (NULL, 'Nutriología'),
    (NULL, 'Oncología médica'),
    (NULL, 'Oncología radioterápica'),
    (NULL, 'Pediatría'),
    (NULL, 'Psiquiatría'),
    (NULL, 'Reumatología'),
    (NULL, 'Toxicología');

-- -----------------------------------------------------
-- Poblar tabla rol
-- -----------------------------------------------------
INSERT INTO
    `rol` (`idrol`, `nombre`)
VALUES
    (NULL, 'Administador'),
    (NULL, 'Medico');

-- -----------------------------------------------------
-- Poblar tabla genero
-- -----------------------------------------------------
INSERT INTO
    `genero` (`idgenero`, `nombre`)
VALUES
    (NULL, 'Masculino'),
    (NULL, 'Femenino');

-- -----------------------------------------------------
-- Poblar tabla usuario
-- -----------------------------------------------------
INSERT INTO
    `usuario` (
        `idusuario`,
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        NULL,
        'David Alejandro',
        'Jimenez Santana',
        'davidjimenez199701@gmail.com',
        MD5('daj'),
        '1',
        '1',
        '30213031080'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        'Laura Johanna',
        'Henández Cáceres',
        'LauJoa@correo.com',
        MD5('prueba'),
        '2',
        '7',
        '320120120'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        'Gabriel',
        'Garcia Marquez',
        'gabo@correo.com',
        MD5('prueba'),
        '2',
        '10',
        '365421879'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        'Pedro Juan',
        'Paramo Rulfo',
        'pedroparamo@correo.com',
        MD5('prueba'),
        '2',
        '5',
        '3258741169'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        'Miguel Angel',
        'Asturias',
        'miguelangel@correo.com',
        MD5('prueba'),
        '2',
        '8',
        '365214789'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`
    )
VALUES
    (
        'Guillermo ',
        'Cabrera Infante',
        'guillecabrera@correo.com',
        MD5('prueba'),
        '2',
        '9',
        '398745621'
    );

-- -----------------------------------------------------
-- Poblar tabla paciente
-- -----------------------------------------------------
INSERT INTO
    `paciente` (
        `idpaciente`,
        `nombre`,
        `apellido`,
        `documento_identidad`,
        `seguro`,
        `telefono`,
        `correo`,
        `direccion`,
        `genero_idgenero`,
        `fecha_nacimiento`
    )
VALUES
    (
        NULL,
        'Emilia Isobel',
        'Euphemia Rose Clarke',
        '6325417',
        'ALLIANZ SEGUROS S.A',
        '302145785',
        'EmiliaEuphemia@correo.com',
        'cale123 #123',
        '2',
        ''
    );

INSERT INTO
    `paciente` (
        `idpaciente`,
        `nombre`,
        `apellido`,
        `documento_identidad`,
        `seguro`,
        `telefono`,
        `correo`,
        `direccion`,
        `genero_idgenero`,
        `fecha_nacimiento`
    )
VALUES
    (
        NULL,
        'Gwendoline Tracey',
        'Philippa Christie',
        '97452',
        'ASEGURADORA SOLIDARIA DE COLOMBIA',
        '8978949',
        'GwendolineTracey@correo.com',
        'calle657 # 98 12',
        '2',
        ''
    ),
    (
        NULL,
        'Christopher',
        'Catesby Harington',
        '874864',
        'AXA COLPATRIA SEGUROS S.A',
        '658468541',
        'ChristopherCatesby@correo.com',
        'carrera 56 # 56 43',
        '1',
        ''
    ),
    (
        NULL,
        'Joseph Jason',
        'Namakaeha Momoa',
        '897941641',
        'BBVA SEGUROS COLOMBIA S.A',
        '6545163',
        'JosephNamakaeha@correo.com',
        'diag 53 @ 54 56',
        '1',
        ''
    ),
    (
        NULL,
        'Peter ',
        'Hayden Dinklage',
        '684136541',
        'BERKLEY INTERNATIONAL SEGUROS COLOMBIA S.A.',
        '5464841',
        'PeterHayden@correo.com',
        'calle54 # 56 09',
        '1',
        ''
    ),
    (
        NULL,
        'William Isaac',
        'Hempstead Wright',
        '5645465',
        'BMI COMPAÑIA DE SEGUROS',
        '654646',
        'WilliamIsaac@correo.com',
        'cra 54 # 98 14',
        '1',
        ''
    );