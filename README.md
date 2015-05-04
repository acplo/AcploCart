[![Latest Stable Version](https://poser.pugx.org/acplo/acplocart/v/stable)](https://packagist.org/packages/acplo/acplocart) [![Total Downloads](https://poser.pugx.org/acplo/acplocart/downloads)](https://packagist.org/packages/acplo/acplocart) [![Latest Unstable Version](https://poser.pugx.org/acplo/acplocart/v/unstable)](https://packagist.org/packages/acplo/acplocart) [![License](https://poser.pugx.org/acplo/acplocart/license)](https://packagist.org/packages/acplo/acplocart)

AcploCart
============================
Version 1.0

This model allows you to manage a shopping cart for e-commerce in an easy, simple and fast.

Installation
------------
For the installation uses composer [composer](http://getcomposer.org "composer - package manager").

```sh
php composer.phar require  acplocart/acplocart:dev-master
```

Add this project in your composer.json:


    "require": {
	"acplo/acplocart": "0.0.1"
    }
    

Post Installation
------------
Configuration:
- Add the module of `config/application.config.php` under the array `modules`, insert `AcploCart`
- Create a file named `acplocart.global.php` under `config/autoload/`. 
- Add the following lines to the file you just created:

```php
<?php
return array(
    'acplocart' => array(
        'vat'  => 21
    ),
);
```

Example
=====================================
Insert
------------
```php
$product = array(
    'id'      => 'cod_123abc',
    'qty'     => 1,
    'price'   => 39.95,
    'name'    => 'T-Shirt',
    'options' => array('Size' => 'M', 'Color' => 'Black')
);
$this->AcploCart()->insert($product);
```

Update
------------
```php
$product = array(
    'token' => '4b848870240fd2e976ee59831b34314f7cfbb05b',
    'qty'   => 2
);
$this->AcploCart()->update($product);
```

Remove
------------
```php
$product = array(
    'token' => '4b848870240fd2e976ee59831b34314f7cfbb05b',
);
$this->AcploCart()->remove($product);
```

Destroy
------------
```php
$this->AcploCart()->destroy();
```

Cart
------------
```php
$this->AcploCart()->cart();
```

Total
------------
```php
$this->AcploCart()->total();
```

Total Items
------------
```php
$this->AcploCart()->total_items();
```

Items Options
------------
```php
$this->AcploCart()->item_options('4b848870240fd2e976ee59831b34314f7cfbb05b');
```

Example in view
------------
Controller
```php
return new ViewModel(array(
    'items' => $this->AcploCart()->cart(),
    'total_items' => $this->AcploCart()->total_items(),
    'total' => $this->AcploCart()->total(),
));
```
View
```html
<?php if($total_items > 0): ?>
<h3>Products in cart (<?php echo $total_items; ?>):</h3>
<table style="width: 900px;" border="1">
<tr>
  <th>Qty</th>
  <th>Name</th>
  <th>Item Price</th>
  <th>Sub-Total</th>
</tr>
<?php foreach($items as $key):?>
<tr>
    <td style="text-align: center;"><?php echo $key['qty']; ?></td>
	<td style="text-align: center;">
	<?php echo $key['name']; ?>
		<?php if($key['options'] != 0):?>
			Options:
			<?php foreach($key['options'] as $options => $value):?>
				<?php echo $options.' '.$value;?>
			<?php endforeach;?>
		<?php endif;?>
	</td>
	<td style="text-align: center;"><?php echo $key['price']; ?></td>
	<td style="text-align: center;"><?php echo $key['sub_total']; ?></td>
</tr>
<?php endforeach;?>
<tr>
  <td colspan="2"></td>
  <td style="text-align: center;"><strong>Sub Total</strong></td>
  <td style="text-align: center;"> <?php echo $total['sub-total'];?></td>
</tr>
<tr>
  <td colspan="2"></td>
  <td style="text-align: center;"><strong>Vat</strong></td>
  <td style="text-align: center;"> <?php echo $total['vat'];?></td>
</tr>
<tr>
  <td colspan="2"></td>
  <td style="text-align: center;"><strong>Total</strong></td>
  <td style="text-align: center;"> <?php echo $total['total'];?></td>
</tr>

<?php else: ?>
<h4>The Shopping Cart Empty</h4>
<?php endif;?>
```

Function Reference
------------
<table>
    <tr>
    <td>Function</td>
    <td>Description</td></tr>
    <tr><td>$this->AcploCart()->insert();</td><td>Add a product to cart.</td></tr>
    <tr><td>$this->AcploCart()->update();</td><td>Update the quantity of a product.</td></tr>
    <tr><td>$this->AcploCart()->remove();</td><td>Delete the item from the cart.</td></tr>
    <tr><td>$this->AcploCart()->destroy();</td><td>Delete all items from the cart.</td></tr>
    <tr><td>$this->AcploCart()->cart();</td><td>Extracts all items from the cart.</td></tr>
    <tr><td>$this->AcploCart()->total();</td><td>Counts the total number of items in cart</td></tr>
    <tr><td>$this->AcploCart()->total_items();</td><td>Counts the total number of items in cart</td></tr>
    <tr><td>$this->AcploCart()->item_options();</td><td>Returns the an array of options, for a particular product token.</td></tr>
    <tr><td>Config Vat</td><td>Set your vat in acplocart.global.php</td></tr>
</table>

Contributors
=====================================

* Concetto Vecchio - info@cvsolutions.it
