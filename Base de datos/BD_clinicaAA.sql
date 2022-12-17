
CREATE SCHEMA IF NOT EXISTS `ClinicaAltoDeLosAlpes` DEFAULT CHARACTER SET utf8 ;
USE `ClinicaAltoDeLosAlpes` ;

-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`rol` (
  `idrol` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`especialidad` (
  `idespecialidad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idespecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`estado_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`estado_usuario` (
  `idestado_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestado_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(30) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `rol_idrol` INT NOT NULL,
  `especialidad_idespecialidad` INT NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(100) NULL,
  `estado_usuario_idestado_usuario` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_rol_idx` (`rol_idrol` ASC) ,
  INDEX `fk_usuario_especialidad1_idx` (`especialidad_idespecialidad` ASC) ,
  INDEX `fk_usuario_estado_usuario1_idx` (`estado_usuario_idestado_usuario` ASC) ,
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`rol_idrol`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`rol` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_especialidad1`
    FOREIGN KEY (`especialidad_idespecialidad`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`especialidad` (`idespecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_estado_usuario1`
    FOREIGN KEY (`estado_usuario_idestado_usuario`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`estado_usuario` (`idestado_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`agenda` (
  `idagenda` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idagenda`),
  INDEX `fk_agenda_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_agenda_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`estado_visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`estado_visita` (
  `idestado_visita` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestado_visita`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`genero` (
  `idgenero` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgenero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`paciente` (
  `idpaciente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `documento_identidad` INT NOT NULL,
  `seguro` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `genero_idgenero` INT NOT NULL,
  `fecha_nacimiento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpaciente`),
  INDEX `fk_paciente_genero1_idx` (`genero_idgenero` ASC),
  CONSTRAINT `fk_paciente_genero1`
    FOREIGN KEY (`genero_idgenero`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`genero` (`idgenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`historia_clinica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`historia_clinica` (
  `idhistoria_clinica` INT NOT NULL,
  `paciente_idpaciente` INT NOT NULL,
  `Tratamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`idhistoria_clinica`),
  INDEX `fk_historia_clinica_paciente1_idx` (`paciente_idpaciente` ASC),
  CONSTRAINT `fk_historia_clinica_paciente1`
    FOREIGN KEY (`paciente_idpaciente`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`paciente` (`idpaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`visita` (
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
  INDEX `fk_visita_agenda1_idx` (`agenda_idagenda` ASC) ,
  INDEX `fk_visita_historia_clinica1_idx` (`historia_clinica_idhistoria_clinica` ASC) ,
  CONSTRAINT `fk_visita_estado_visita1`
    FOREIGN KEY (`estado_visita_idestado_visita`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`estado_visita` (`idestado_visita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_agenda1`
    FOREIGN KEY (`agenda_idagenda`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`agenda` (`idagenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_historia_clinica1`
    FOREIGN KEY (`historia_clinica_idhistoria_clinica`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`historia_clinica` (`idhistoria_clinica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ClinicaAltoDeLosAlpes`.`historia_clinica_has_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ClinicaAltoDeLosAlpes`.`historia_clinica_has_usuario` (
  `historia_clinica_idhistoria_clinica` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`historia_clinica_idhistoria_clinica`, `usuario_idusuario`),
  INDEX `fk_historia_clinica_has_usuario_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_historia_clinica_has_usuario_historia_clinica1_idx` (`historia_clinica_idhistoria_clinica` ASC),
  CONSTRAINT `fk_historia_clinica_has_usuario_historia_clinica1`
    FOREIGN KEY (`historia_clinica_idhistoria_clinica`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`historia_clinica` (`idhistoria_clinica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historia_clinica_has_usuario_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `ClinicaAltoDeLosAlpes`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

