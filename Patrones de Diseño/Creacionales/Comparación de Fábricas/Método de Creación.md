# Método de creación

El método de creación se define en el libro **[Refactoring To Patterns][ref-to-patterns]** como “un método que crea objetos”. Esto significa que todo resultado de un patrón Factory Method es un “método de creación” pero no necesariamente a la inversa. También significa que puedes sustituir el término “método de creación” allá donde Martin Fowler utiliza el término “método fábrica” en **[Refactoring][ref]** y allá donde Joshua Bloch utiliza el término “método fábrica estático” en **[Effective Java][eff]**.

En realidad, el método de creación simplemente es un envoltorio alrededor de una llamada al constructor. Puede tener un nombre que exprese mejor tus intenciones. Por otro lado, puede ayudar a aislar tu código de cambios en el constructor. Puede incluso contener una lógica particular que devuelva objetos existentes en lugar de crear unos nuevos.

Muchas personas llamarían a tales métodos “métodos fábrica” sencillamente porque producen nuevos objetos. La lógica es sencilla: el método crea objetos y, como todas las fábricas crean objetos, este método claramente debe ser un método fábrica. Naturalmente, hay mucha confusión en lo que se refiere al verdadero patrón **[Factory Method][fm]**.

En el siguiente ejemplo, `next` es un método de creación:

```php
class Number {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function next() {
        return new Number($this->value + 1);
    }
}
```

[ref-to-patterns]: https://refactoring.guru/es/ref-to-patterns-book
[ref]: https://refactoring.guru/es/ref-book
[eff]: https://refactoring.guru/es/effective-java-book
[fm]: https://refactoring.guru/es/design-patterns/factory-method
