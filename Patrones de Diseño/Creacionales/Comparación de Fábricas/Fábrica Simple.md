# Patrón _Simple Factory_

El patrón **Simple Factory** (fábrica simple) describe una clase que tiene un método de creación con un gran condicional que, basándose en los parámetros del método, elige la clase de producto que instanciar y devolver.

La gente suele confundir las fábricas simples con fábricas en general, o con uno de los patrones de diseño creacionales. En la mayoría de los casos, una fábrica simple es un paso intermedio para introducir los patrones **[Factory method][fm]** o **[Abstract factory][af]**.

Las fábricas simples no suelen tener subclases. Pero, después de extraer subclases de una fábrica simple, empiezan a parecerse a un patrón factory method clásico.

Por cierto, si declaras una fábrica simple como `abstracta`, no se convierte en el patrón abstract factory por arte de magia.

Aquí tienes un ejemplo de _fábrica simple_:

```php
class UserFactory {
    public static function create($type) {
        switch ($type) {
            case 'user': return new User();
            case 'customer': return new Customer();
            case 'admin': return new Admin();
            default:
                throw new Exception('Wrong user type passed.');
        }
    }
}
```

[fm]: https://refactoring.guru/es/design-patterns/factory-method
[af]: https://refactoring.guru/es/design-patterns/abstract-factory
