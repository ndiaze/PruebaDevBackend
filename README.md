# PruebaDevBackend
Prueba Api Symfony

@Get
Obtener  todos los registros
http://localhost:8000/api/Usuarios

@Get 
Obtener  un registro por id
http://localhost:8000/api/Usuarios/1

@Post
Crear usuario
http://localhost:8000/api/Usuarios
{
	"usuaCorreo": "rodrigo@boiser.com",
	"usuaNombre": "Rodrigo",
	"usuaApellidopaterno":"Boiser",
	"usuaApellidomaterno": "Henriquez",
	"usuaEstado": 1,
	"TipoUsuarios":{
		"tiusId":2
	},
	"TipoClientes":{
		"ticlId":3
	}
}

@Put
Actualizar  Usuario
http://localhost:8000/api/Usuarios/6

{
	"usuaCorreo": "rodrigo@boiser.com",
	"usuaNombre": "Rodrigo",
	"usuaApellidopaterno":"Boiser",
	"usuaApellidomaterno": "Henriquez",
	"usuaEstado": 0,
	"usuaTius":{
			"tiusId":2
	},
	"usuaTicl":{
		"ticlId":3
	}
}
