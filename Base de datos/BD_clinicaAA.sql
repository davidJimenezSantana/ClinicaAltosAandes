-- -----------------------------------------------------
-- Schema ClinicaAA
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ClinicaAA` DEFAULT CHARACTER SET utf8 ;
USE `ClinicaAA` ;

-- -----------------------------------------------------
-- Table `ClinicaAA`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`rol` (
  `idrol` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`especialidad` (
  `idespecialidad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idespecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(30) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `rol_idrol` INT NOT NULL,
  `especialidad_idespecialidad` INT NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_rol_idx` (`rol_idrol` ASC),
  INDEX `fk_usuario_especialidad1_idx` (`especialidad_idespecialidad` ASC),
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`rol_idrol`)
    REFERENCES `ClinicaAA`.`rol` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_especialidad1`
    FOREIGN KEY (`especialidad_idespecialidad`)
    REFERENCES `ClinicaAA`.`especialidad` (`idespecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`agenda` (
  `idagenda` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idagenda`),
  INDEX `fk_agenda_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_agenda_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `ClinicaAA`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`estado_visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`estado_visita` (
  `idestado_visita` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestado_visita`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`paciente` (
  `idpaciente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `documento_identidad` INT NOT NULL,
  `seguro` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `genero` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idpaciente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`historia_clinica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`historia_clinica` (
  `idhistoria_clinica` INT NOT NULL,
  `paciente_idpaciente` INT NOT NULL,
  PRIMARY KEY (`idhistoria_clinica`),
  INDEX `fk_historia_clinica_paciente1_idx` (`paciente_idpaciente` ASC),
  CONSTRAINT `fk_historia_clinica_paciente1`
    FOREIGN KEY (`paciente_idpaciente`)
    REFERENCES `ClinicaAA`.`paciente` (`idpaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`visita` (
  `idvisita` INT NOT NULL AUTO_INCREMENT,
  `estado_visita_idestado_visita` INT NOT NULL,
  `agenda_idagenda` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `hota` TIME NOT NULL,
  `observaciones` VARCHAR(300) NULL,
  `motivo` VARCHAR(300) NOT NULL,
  `historia_clinica_idhistoria_clinica` INT NOT NULL,
  PRIMARY KEY (`idvisita`),
  INDEX `fk_visita_estado_visita1_idx` (`estado_visita_idestado_visita` ASC),
  INDEX `fk_visita_agenda1_idx` (`agenda_idagenda` ASC),
  INDEX `fk_visita_historia_clinica1_idx` (`historia_clinica_idhistoria_clinica` ASC),
  CONSTRAINT `fk_visita_estado_visita1`
    FOREIGN KEY (`estado_visita_idestado_visita`)
    REFERENCES `ClinicaAA`.`estado_visita` (`idestado_visita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_agenda1`
    FOREIGN KEY (`agenda_idagenda`)
    REFERENCES `ClinicaAA`.`agenda` (`idagenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_historia_clinica1`
    FOREIGN KEY (`historia_clinica_idhistoria_clinica`)
    REFERENCES `ClinicaAA`.`historia_clinica` (`idhistoria_clinica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAA`.`historia_clinica_has_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAA`.`historia_clinica_has_usuario` (
  `historia_clinica_idhistoria_clinica` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`historia_clinica_idhistoria_clinica`, `usuario_idusuario`),
  INDEX `fk_historia_clinica_has_usuario_usuario1_idx` (`usuario_idusuario` ASC) ,
  INDEX `fk_historia_clinica_has_usuario_historia_clinica1_idx` (`historia_clinica_idhistoria_clinica` ASC),
  CONSTRAINT `fk_historia_clinica_has_usuario_historia_clinica1`
    FOREIGN KEY (`historia_clinica_idhistoria_clinica`)
    REFERENCES `ClinicaAA`.`historia_clinica` (`idhistoria_clinica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historia_clinica_has_usuario_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `ClinicaAA`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

