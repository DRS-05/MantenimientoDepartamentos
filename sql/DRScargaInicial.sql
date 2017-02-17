use DAW205_DBDepartamento;
insert into Departamento values ("VEN","Ventas");
insert into Departamento values ("PRO","Produccion");
insert into Departamento values ("COM","Compras");
insert into Departamento values ("ADM","Administracion");
insert into Departamento values ("FIN","Finanzas");
insert into Departamento values ("MAR","Marketing");
insert into Departamento values ("REC","Recursos Humanos");
insert into Departamento values ("GES","Gestion");
insert into Departamento values ("DIR","Direccion");
insert into Departamento values ("ATE","Atencion al Cliente");
insert into Departamento values ("INF","Informatica");

insert into Usuario values ("ADMIN", "Administrador", SHA2('paso',256), "Administrador", "0000-00-00 00:00:00", "0");
insert into Usuario values ("VIMERTOL", "Vicente Merario Toloko", SHA2('paso',256), "Usuario", "0000-00-00 00:00:00", "0");
insert into Usuario values ("heraclio", "Heraclio Borbujo Morán", SHA2('paso',256), "Administrador", "0000-00-00 00:00:00", "0");