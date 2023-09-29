# Patrón _Factory Method_

El patrón **Factory Method** es un patrón de diseño creacional que proporciona una interfaz para crear objetos pero permite a las subclases alterar el tipo de objetos que se crearán.

Si tienes un método de creación en la clase base y subclases que lo extienden, puede que se trate del método fábrica.

```php
abstract class Department {
    public abstract function createEmployee($id);

    public function fire($id) {
        $employee = $this->createEmployee($id);
        $employee->paySalary();
        $employee->dismiss();
    }
}

class ITDepartment extends Department {
    public function createEmployee($id) {
        return new Programmer($id);
    }
}

class AccountingDepartment extends Department {
    public function createEmployee($id) {
        return new Accountant($id);
    }
}
```
