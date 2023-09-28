```java
// La interfaz manejadora declara un método para ejecutar una
// solicitud.
interface ComponentWithContextualHelp is
    method showHelp()


// La clase base para componentes simples.
abstract class Component implements ComponentWithContextualHelp is
    field tooltipText: string

    // El contenedor del componente actúa como el siguiente
    // eslabón de la cadena de manejadores.
    protected field container: Container

    // El componente muestra una pista si tiene un texto de
    // ayuda asignado. De lo contrario, reenvía la llamada al
    // contenedor, si es que existe.
    method showHelp() is
        if (tooltipText != null)
            // Muestra la pista.
        else
            container.showHelp()


// Los contenedores pueden contener componentes simples y otros
// contenedores como hijos. Las relaciones de la cadena se
// establecen aquí. La clase hereda el comportamiento showHelp
// (mostrarAyuda) de su padre.
abstract class Container extends Component is
    protected field children: array of Component

    method add(child) is
        children.add(child)
        child.container = this


// Los componentes primitivos pueden estar bien con la
// implementación de la ayuda por defecto...
class Button extends Component is
    // ...

// Pero los componentes complejos pueden sobrescribir la
// implementación por defecto. Si no puede proporcionarse el
// texto de ayuda de una nueva forma, el componente siempre
// puede invocar la implementación base (véase la clase
// Componente).
class Panel extends Container is
    field modalHelpText: string

    method showHelp() is
        if (modalHelpText != null)
            // Muestra una ventana modal con el texto de ayuda.
        else
            super.showHelp()

// ...igual que arriba...
class Dialog extends Container is
    field wikiPageURL: string

    method showHelp() is
        if (wikiPageURL != null)
            // Abre la página de ayuda wiki.
        else
            super.showHelp()


// Código cliente.
class Application is
    // Cada aplicación configura la cadena de forma diferente.
    method createUI() is
        dialog = new Dialog("Budget Reports")
        dialog.wikiPageURL = "http://..."
        panel = new Panel(0, 0, 400, 800)
        panel.modalHelpText = "This panel does..."
        ok = new Button(250, 760, 50, 20, "OK")
        ok.tooltipText = "This is an OK button that..."
        cancel = new Button(320, 760, 50, 20, "Cancel")
        // ...
        panel.add(ok)
        panel.add(cancel)
        dialog.add(panel)

    // Imagina lo que pasa aquí.
    method onF1KeyPress() is
        component = this.getComponentAtMouseCoords()
        component.showHelp()
```
