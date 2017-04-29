# 将经纬度转为地址信息

## Install
composer require slatedfish/location

```
$test = new Saltedfish\Location\Location(123, 456);
$address = $test->transformToAddress();
```