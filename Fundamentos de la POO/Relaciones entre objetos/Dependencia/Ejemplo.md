```
class Profesor is
	field Estudiante estudiante
	// ...

	method enseñar(Curso curso) is
		// ...
		this.estudiante.recordar(curso.obtenerConocimientos())
```
