# magento2-loginlog
Creates a customer loginlog for the customer.

## linux commands used to find the necessary pieces

`grep --include=*.php --include=*.phtml -rnw 'dispatch' web/vendor/magento/module-customer`

`grep --include=*.php --include=*.phtml -rnw 'IP address' web/vendor/magento/module-sales`

`grep --include=*.php --include=*.phtml -rnw 'RemoteAddress' web/vendor/magento/`

`grep --include=*.php --include=*.phtml -rnw 'alternativeHeaders' web/vendor/magento/`

## Used `app/etc/productionIpTest/di.xml` file for testing possible issues with Reverse proxy and load balanced servers
This will expand the usability of the module.

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">

    <type name="Magento\Framework\HTTP\PhpEnvironment\RemoteAddress">
        <arguments>
            <argument name="alternativeHeaders" xsi:type="array">
                <item name="x-forwarded-for" xsi:type="string">HTTP_X_FORWARDED_FOR</item>
            </argument>
        </arguments>
    </type>
</config>
```