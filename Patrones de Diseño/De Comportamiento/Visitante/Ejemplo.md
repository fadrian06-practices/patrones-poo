```java
// La interfaz elemento declara un método `accept` (aceptar) que
// toma la interfaz visitante base como argumento.
interface Shape is
    method move(x, y)
    method draw()
    method accept(v: Visitor)

// Cada clase de elemento concreto debe implementar el método
// `accept` de tal manera que invoque el método del visitante
// que corresponde a la clase del elemento.
class Dot implements Shape is
    // ...

    // Observa que invocamos `visitDot`, que coincide con el
    // nombre de la clase actual. De esta forma, hacemos saber
    // al visitante la clase del elemento con el que trabaja.
    method accept(v: Visitor) is
        v.visitDot(this)

class Circle implements Shape is
    // ...
    method accept(v: Visitor) is
        v.visitCircle(this)

class Rectangle implements Shape is
    // ...
    method accept(v: Visitor) is
        v.visitRectangle(this)

class CompoundShape implements Shape is
    // ...
    method accept(v: Visitor) is
        v.visitCompoundShape(this)


// La interfaz Visitor declara un grupo de métodos de visita que
// se corresponden con clases de elemento. La firma de un método
// de visita permite al visitante identificar la clase exacta
// del elemento con el que trata.
interface Visitor is
    method visitDot(d: Dot)
    method visitCircle(c: Circle)
    method visitRectangle(r: Rectangle)
    method visitCompoundShape(cs: CompoundShape)

// Los visitantes concretos implementan varias versiones del
// mismo algoritmo, que puede funcionar con todas las clases de
// elementos concretos.
//
// Puedes disfrutar de la mayor ventaja del patrón Visitor si lo
// utilizas con una estructura compleja de objetos, como un
// árbol Composite. En este caso, puede ser de ayuda almacenar
// algún estado intermedio del algoritmo mientras ejecutas los
// métodos del visitante sobre varios objetos de la estructura.
class XMLExportVisitor implements Visitor is
    method visitDot(d: Dot) is
        // Exporta la ID del punto (dot) y centra las
        // coordenadas.

    method visitCircle(c: Circle) is
        // Exporta la ID del círculo y centra las coordenadas y
        // el radio.

    method visitRectangle(r: Rectangle) is
        // Exporta la ID del rectángulo, las coordenadas de
        // arriba a la izquierda, la anchura y la altura.

    method visitCompoundShape(cs: CompoundShape) is
        // Exporta la ID de la forma, así como la lista de las
        // ID de sus hijos.


// El código cliente puede ejecutar operaciones del visitante
// sobre cualquier grupo de elementos sin conocer sus clases
// concretas. La operación `accept` dirige una llamada a la
// operación adecuada del objeto visitante.
class Application is
    field allShapes: array of Shapes

    method export() is
        exportVisitor = new XMLExportVisitor()

        foreach (shape in allShapes) do
            shape.accept(exportVisitor)
```
