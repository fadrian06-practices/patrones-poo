# Método de creación estático

El **método de creación estático** es un método de creación declarado como `estático`. En otras palabras, puede invocarse en una clase y no necesita un objeto para ser creado.

No te confundas cuando alguien llame a un método como éste un “método fábrica estático”. Es una mala costumbre. El **[Factory Method][fm]** es un patrón de diseño que se basa en la herencia. Si lo haces `estático`, ya no podrás extenderlo en subclases, lo cual contradice el propósito del patrón.

Cuando un método de creación estático devuelve nuevos objetos se convierte en un constructor alternativo.

Puede ser de utilidad cuando:

- Necesitas varios constructores diferentes con distintos propósitos pero cuyas firmas coinciden. Por ejemplo, tener `Random(int max)` y `Random(int min)` es imposible en Java, C++, C# y muchos otros lenguajes. La solución más popular es crear varios métodos estáticos que invoquen el constructor por defecto y establezcan después los valores adecuados.

- Quieras reutilizar objetos existentes, en lugar de instanciar unos nuevos (véase el patrón **[Singleton][ps]**). En la mayoría de los lenguajes de programación, los constructores deben devolver nuevas instancias de clase. El método de creación estático es una solución a esta limitación. Dentro de un método estático, tu código puede decidir si crear una nueva instancia invocando al constructor, o devolver un objeto existente a partir de una memoria caché.

En el siguiente ejemplo, el método `load` es un método de creación estático. Ofrece un modo conveniente de recuperar usuarios de una base de datos.

```php
class User {
	private $id, $name, $email, $phone;

	public function __construct($id, $name, $email, $phone) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
	}

	public static function load($id) {
		[$id, $name, $email, $phone] = DB::load_data('users', 'id', 'name', 'email', 'phone');
		$user = new User($id, $name, $email, $phone);
		return $user;
	}
}
```

[fm]: https://refactoring.guru/es/design-patterns/factory-method
[ps]: https://refactoring.guru/es/design-patterns/singleton
