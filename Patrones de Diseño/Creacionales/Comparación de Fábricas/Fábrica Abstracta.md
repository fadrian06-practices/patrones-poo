# Patrón _Abstract Factory_

El patrón **Abstract Factory** es un patrón de diseño creacional que permite la producción de familias de objetos relacionados o dependientes, sin especificar sus clases concretas.

¿Qué son las "familias de objetos"? Por ejemplo, tomemos este grupo de clases: `Transporte` + `Motor` + `Controles`. Puede haber diversas variantes de ellas:

1. `Coche` + `MotordeCombustión` + `Volante`
2. `Avión` + `Reactor` + `Horquilla`

Si tu programa no funciona con familias de productos, entonces no necesitas una fábrica abstracta.

Y, de nuevo, mucha gente confunde el patrón abstract factory con una simple clase fábrica declarada como `abstracta`. ¡No hagas tú lo mismo!
