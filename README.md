<<<<<<< HEAD
# zhougong_dream
基于laravel系统的周公解梦数据接口
=======
# Crypto Currency for PHP

A collection of common utilities and libraries in PHP for use with Bitcoin and Zetacoin compatable crypto currencies ustilizing the secp256k1 ECDSA curve. 

The code may be messy and all over the place, but I'm still pulling things together as I merge this code base with items from the PHPECC codebase.  The current features include:

- Private Key Generation and Loading
- Public Address Print Out
- Message Signing and Verification
- Address Generation and Validation
- Address compression, de-compression, encoding, and decoding.
- Supports Arbitrary Address Prefixes

Currently, the following items are working

- Base58.php
- SECp256k1.php
- PointMathGMP.php
- AddressValidation.php
- AddressCodec.php
- PrivateKey.php
- Signature.php


## Usage

### AddressCodec

The AddressCodec class provides a simple interface for common Zetacoin/Bitcoin (and compatable) address functions.  Load the following classes in your PHP code:
```PHP
use Crypto\AddressCodec;
```

The most basic example, get the X and Y coordnates of a DER Encoded public key (old format)
```PHP
$derPublicKey = '04a34b99f22c790c4e36b2b3c2c35a36db06226e41c692fc82b8b56ac1c540c5bd5b8dec5235a0fa8722476c7709c02559e3aa73aa03918ba2d492eea75abea235';

$point = AddressCodec::Point($derPublicKey);

echo $point['x'];
echo $point['y'];
```

That will return an array with both X and Y:
```
X = a34b99f22c790c4e36b2b3c2c35a36db06226e41c692fc82b8b56ac1c540c5bd
Y = 5b8dec5235a0fa8722476c7709c02559e3aa73aa03918ba2d492eea75abea235
```

The more usefull method is with the new compressed public keys used by modern crypto currencies:
```PHP
$compressedPublicKey = '03a34b99f22c790c4e36b2b3c2c35a36db06226e41c692fc82b8b56ac1c540c5bd';

$point = AddressCodec::Decompress($compressedPublicKey);

echo $point['x'];
echo $point['y'];
```

Works the other way around too:
```PHP
$compressedPublicKey = AddressCodec::Compress($point);
$derPublicKey = AddressCodec::Hex($point);
```

On to the more usefull items, Encode a public key into a Crypto Currency address.  First Hash your public key then Encode it.
```PHP
$hash = AddressCodec::Hash($compressedPublicKey);
$address = AddressCodec::Encode($hash);

echo $address;
```

Gives you:
```
Address = 1F3sAm6ZtwLAUnj7d38pGFxtP3RVEvtsbV
```

Specify your own prefix (in HEX):
```PHP
$address = AddressCodec::Encode($hash, "50");
```

Gives you:
```
Address = ZS67wSwchNQFuTt3abnK4HjpjQ2x79YZed
```
>>>>>>> bce5046 (初始化项目)
