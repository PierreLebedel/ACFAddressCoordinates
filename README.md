# ACF Address fields with GPS coordinates geocoding 

WordPress plugin that adds [ACF](https://www.advancedcustomfields.com/) Address fields. 

The GPS coordinates are geocoded on form submit with [OSM Nominatim](https://nominatim.org/release-docs/latest/api/Search/) API.

The countries list is provided by [countriesnow.space](https://countriesnow.space) API.

## Usage

```php
$address = get_field('YOUR_FIELD_NAME');

print_r($address);

/*
Array
(
    [street_1]     => 24 rue du Test
    [street_2]     => 
    [post_code]    => 07700
    [city]         => Bidon
    [state]        => 
    [country_code] => FR
    [latitude]     => 4.5342856
    [longitude]    => 44.3663529
    [country_name] => France
)
*/
```