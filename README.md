# Magento 2 XSD Merger

## Installing the Extension

    composer require magekey/module-xsd-merger

### Example: Add `after` attribute to link type

> app/code/{Vendor}/{Module}/etc/xsd_merger/layout_merged.xsd

    <?xml version="1.0" encoding="UTF-8"?>
    <xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">
        <xs:redefine schemaLocation="urn:magento:framework:View/Layout/etc/layout_merged.xsd">
            <xs:complexType name="linkType">
              <xs:complexContent>
                <xs:extension base="linkType">
                  <xs:attribute name="after" type="xs:string"/>
                </xs:extension>
            </xs:complexContent>
          </xs:complexType>
        </xs:redefine>
    </xs:schema>

## Versions tested
> 2.2.5
