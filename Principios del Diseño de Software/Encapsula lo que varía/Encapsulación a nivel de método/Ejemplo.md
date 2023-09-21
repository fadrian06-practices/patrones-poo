```
method getOrderTotal(order) is
	total = 0

	foreach item in order.lineItems
		total += item.price * item.quantity

		if (order.country == "US")
			total += total * 0.07 // Impuesto sobre la venta de EUA

		else if (order.country == "EU")
			total += total * 0.20 // IVA europeo

	return total
```
> ANTES: el código de cálculo del impuesto está mezclado con el resto del código del método.
---

```
method getOrderTotal(order) is
	total = 0

	foreach item in order.lineItems
		total += item.price * item.quantity
		total += total * getTaxRate(order.country)

	return total

method getTaxRate(country) is
	if (country == "US")
		return 0.07 // Impuesto sobre la venta de EUA

	else if (country == "EU")
		return 0.20 // IVA europeo

	else
		return 0
```
> DESPUÉS: puedes obtener la tasa impositiva invocando un método designado.
